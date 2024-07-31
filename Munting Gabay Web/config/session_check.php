<?php
// config/session_check.php
session_start();

// Check if the user is not logged in or is not an admin
if (!isset($_SESSION['verified_user_id']) || $_SESSION['verified_user_id'] !== 'p09Ad1S0MWTj1IBjT9ezrnt4rPt1') {
    session_unset(); // Unset session variables
    session_destroy(); // Destroy the session
    header('Location: login.php'); // Redirect to the login page
    exit();
}
