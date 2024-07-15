<link rel="shortcut icon" href="includes/icon.png" type="image/x-icon">

<?php
session_start();
if (!isset($_SESSION['verified_user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body class="d-flex flex-column vh-100">
<?php 
include('includes/header.php');
?>
<center> 
       <h1>Welcome to the Home Page</h1>
    <p>You are logged in as <?php echo htmlspecialchars($_SESSION['user_email']); ?>.</p>
    </center>

</body>
</html>
