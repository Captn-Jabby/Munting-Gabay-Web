<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('dbcon.php');

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $clearTextPassword = $_POST['password'];
    $full_name = $_POST['full-name'];

    try {
        $user = $auth->getUserByEmail("$email");
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
                header('Location: home.php');
                exit();
            } catch (FailedToVerifyToken $e) {
                $_SESSION['status'] = 'The token is invalid: ' . $e->getMessage();
                header('Location: login.php');
                exit();
            }
        } catch (Exception $e) {
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
?>
