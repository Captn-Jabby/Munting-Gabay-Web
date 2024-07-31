<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Adjust the path to 'dbcon.php' based on your directory structure
include('../config/dbcon.php');

// Add the correct use statements
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Kreait\Firebase\Exception\Auth\InvalidPassword;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Kreait\Firebase\Exception\Auth\AuthError;

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $clearTextPassword = $_POST['password'];

    try {
        // Sign in the user
        $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
        $idTokenString = $signInResult->idToken();

        // Verify the ID token
        $verifiedIdToken = $auth->verifyIdToken($idTokenString);
        $uid = $verifiedIdToken->claims()->get('sub');

        // Check if the user is the admin
        if ($uid === 'p09Ad1S0MWTj1IBjT9ezrnt4rPt1') {
            // Set session variables for admin users
            $_SESSION['verified_user_id'] = $uid;
            $_SESSION['idTokenString'] = $idTokenString;
            $_SESSION['user_email'] = $email;
            $_SESSION['status'] = "Logged in Successfully as Admin";
            header('Location: ../admin/home.php');
        } else {
            // For non-admin users, do not set session variables
            $_SESSION['status'] = "Not Allowed";
            header('Location: login.php');
        }
        exit();
    } catch (InvalidPassword $e) {
        $_SESSION['status'] = "Wrong Password";
        header('Location: login.php');
        exit();
    } catch (UserNotFound $e) {
        $_SESSION['status'] = "Invalid Email";
        header('Location: login.php');
        exit();
    } catch (FailedToVerifyToken $e) {
        $_SESSION['status'] = 'The token is invalid: ' . $e->getMessage();
        header('Location: login.php');
        exit();
    } catch (AuthError $e) {
        $_SESSION['status'] = 'Authentication Error: ' . $e->getMessage();
        header('Location: login.php');
        exit();
    } catch (\Exception $e) {
        $_SESSION['status'] = 'An error occurred: ' . $e->getMessage();
        header('Location: login.php');
        exit();
    }
} else {
    $_SESSION['status'] = "Not Allowed";
    header('Location: login.php');
}
