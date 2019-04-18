<?php

function get_config( $id, $default=null )
{
    if ( ! class_exists( 'AppConfig' ) ) {
        require_once __DIR__ . '/Config.php';
    }

    if ( defined("AppConfig::{$id}") ) {
        return constant("AppConfig::{$id}");
    } else {
        return $default;
    }
}

function get_db_instance( $close=false )
{
    static $pdo_instance;

    if ( $close ) {
        $pdo_instance = null;
    } else if ( null === $pdo_instance ) {
        try {
            $pdo_instance = new PDO(
                sprintf('mysql:host=%s;dbname=%s', get_config('DB_HOST'), get_config('DB_NAME')),
                get_config('DB_USER'),
                get_config('DB_PASS')
            );
            $pdo_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch ( Exception $e ) {
            http_response_code(500);
            echo 'Internal server error: ' . $e->getMessage();
            exit;
        }
    }

    return $pdo_instance;
}

function pdo_select_one()
{
    $items = (array) call_user_func_array('pdo_select', func_get_args());
    return (array) array_shift( $items );
}

function pdo_select( $sql, $exec=array() )
{
    $pdo = get_db_instance();
    $db = $pdo->prepare( $sql );
    $items = array();
    try {
        $db->execute( (array) $exec );
        $items = $db->fetchAll( PDO::FETCH_ASSOC );
    } catch ( PDOException $e ) {
        error_log( sprintf('Select query %s ended with an error: %s', $sql, $e->getMessage()) );
    }
    return $items;
}

function pdo_insert( $sql, $exec=array() )
{
    $pdo = get_db_instance();
    $db = $pdo->prepare( $sql );
    $items = array();
    try {
        $db->execute( (array) $exec );
    } catch ( PDOException $e ) {
        error_log( sprintf('Insert query %s ended with an error: %s', $sql, $e->getMessage()) );
    }
    return $db->rowCount();
}

function pdo_update() { return call_user_func_array('pdo_insert', func_get_args()); }

function disconnect_pdo() { return get_db_instance( true ); }

function escape( $string ) {
    return htmlentities( $string, ENT_QUOTES );
}

function current_user() {
    static $current_user;

    if ( null === $current_user ) {
        @session_start();

        if ( isset( $_SESSION['user_id'] ) && (int) $_SESSION['user_id'] ) {
            $current_user = pdo_select_one( 'select * from users where idUsers = ? limit 1', array( (int) $_SESSION['user_id'] ) );
        } else {
            $current_user = array();
        }
    }

    return $current_user;
}


// Checks to see if user is an Admin, otherwise tis function returns false
function is_current_user_admin() {
    if ( $user = current_user() ) {
        return isset( $user['role'] ) && 'admin' === $user['role'];
    }

    return false;
}

