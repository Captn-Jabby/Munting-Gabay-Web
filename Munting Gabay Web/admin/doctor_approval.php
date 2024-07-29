<?php
session_start();
if (!isset($_SESSION['verified_user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<?php
include('includes/header.php');
?>
<h3>Pending For Approval</h3>