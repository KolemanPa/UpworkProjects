<?php
/**
 * Created by PhpStorm.
 * User: paperboy221
 * Date: 10/21/18
 * Time: 2:52 PM
 */


$user_login = isset( $_POST['mailuid'] ) ? $_POST['mailuid'] : null;
$user_pass = isset( $_POST['pwd'] ) ? $_POST['pwd'] : null;

if ( ! trim($user_login) || ! $user_pass ) {
    header( 'Location: ./../index.php?error=xyz' ); # error: missing username or password
    exit;
}

require_once __DIR__ . '/../functions.php';

if ( filter_var($user_login, FILTER_VALIDATE_EMAIL) ) {
    // select by email
    $user = pdo_select_one( 'select * from users where emailUsers=? limit 1', array( $user_login ) );
} else {
    // select by username
    $user = pdo_select_one( 'select * from users where uidUsers=? limit 1', array( $user_login ) );
}

disconnect_pdo();

if ( ! $user ) {
    header( 'Location: ./../index.php?error=xyz' ); # error: invalid credentials
    exit;
}

if ( password_verify( $user_pass, $user['pwdUsers'] ) ) {
    // success

    session_start();
    $_SESSION['user_id'] = (int) $user['idUsers'];

    header( 'Location: ./../index.php?success=true' ); # success: login
    exit;
} else {
    // wrong password
    header( 'Location: ./../index.php?error=xyz' ); # error: invalid credentials
    exit;
}
