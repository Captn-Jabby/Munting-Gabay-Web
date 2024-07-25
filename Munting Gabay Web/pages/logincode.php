<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Adjust the path to 'dbcon.php' based on your directory structure
include('../config/dbcon.php');

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $clearTextPassword = $_POST['password'];
    $full_name = isset($_POST['full-name']) ? $_POST['full-name'] : '';

    // Check for hardcoded admin credentials
    if ($email === 'muntinggabay@gmail.com' && $clearTextPassword === 'Adminpassword') {
        $_SESSION['verified_user_id'] = 'admin_uid';
        $_SESSION['idTokenString'] = 'admin_id_token';
        $_SESSION['user_email'] = $email;
        $_SESSION['status'] = "Logged in Successfully as Admin";
        header('Location: ../admin/home.php');
        exit();
    }

    // Proceed with Firebase authentication if the hardcoded credentials do not match
    try {
        $user = $auth->getUserByEmail($email);
        try {
            $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
            $idTokenString = $signInResult->idToken();

            try {
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                $uid = $verifiedIdToken->claims()->get('sub');

                $_SESSION['verified_user_id'] = $uid;
                $_SESSION['idTokenString'] = $idTokenString;
                $_SESSION['user_email'] = $email;
                $_SESSION['status'] = "Logged in Successfully";
                header('Location: ../admin/home.php');
                exit();
            } catch (\Kreait\Firebase\Exception\Auth\FailedToVerifyToken $e) {
                $_SESSION['status'] = 'The token is invalid: ' . $e->getMessage();
                header('Location: login.php');
                exit();
            }
        } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
            $_SESSION['status'] = "Wrong Password";
            header('Location: login.php');
            exit();
        }
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        $_SESSION['status'] = "Invalid Email";
        header('Location: login.php');
        exit();
    }
} else {
    $_SESSION['status'] = "Not Allowed";
    header('Location: login.php');
}