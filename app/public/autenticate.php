<?php

include 'db.php';
session_start();

if (!empty($_POST['email']) && (!empty($_POST['password']))) {

    $stmt = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($_POST['email'] == $results['email']) {
        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['user_id'] = $results['id'];
            $_SESSION['user_email'] = $results['email'];
            header('Location: loggedin.php');
        } else {
            $_SESSION['message'] = 'Email or password are invalid';
            header('Location: login.php');
        }
    } else {
        $_SESSION['message'] = 'Email or password are invalid';
        header('Location: login.php');
    }
} else {
    $_SESSION['message'] = 'Email or password are invalid';
}
