<?php

if (isset($_POST['signup-submit'])) {

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    // We check for an invalid username AND invalid e-mail.
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invaliduidmail");
        exit();
    }
    // We check for an invalid username. In this case ONLY letters and numbers.
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    // We check for an invalid e-mail.
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    // We check if the repeated password is NOT the same.
    else if ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else {

        // We also need to include another error handler here that checks whether or the username is already taken. We HAVE to do this using prepared statements because it is safer!

        require_once __DIR__ . '/../functions.php';

        $username_taken = pdo_select_one( 'select 1 from users where uidUsers=:uid limit 1', array(':uid' => $username) );

        if ($username_taken) {
            header("Location: ../signup.php?error=usertaken&mail=".$email);
            exit();
        } else {
            // If we got to this point, it means the user didn't make an error! :)

            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            if ( pdo_insert( 'INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)', array($username, $email, $hashedPwd) ) ) {
                disconnect_pdo();
                header("Location: ../signup.php?signup=success");
                exit();
            } else {
                disconnect_pdo();
                header("Location: ../signup.php?error=sqlerror");
                exit();
            }
        }
    }
    // Then we close the prepared statement and the database connection!
    // you've already exitted lol
    // mysqli_stmt_close($stmt);
    // mysqli_close($conn);
}
else {
    // If the user tries to access this page an inproper way, we send them back to the signup page.
    header("Location: ../signup.php");
    exit();
}
