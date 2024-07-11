<link rel="shortcut icon" href="assets/images/icon.png" type="image/x-icon">
<?php
session_start();
if (!isset($_SESSION['verified_user_id'])) {
    header('Location: login.php');
    exit();
}

// Include the Firebase SDK initialization
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    
    if ($newPassword !== $confirmPassword) {
        $error = "New password and confirm password do not match!";
    } else {
        $verifiedUserId = $_SESSION['verified_user_id'];
        $email = $_SESSION['user_email'];
        
        try {
            // Sign in the user with their current password to reauthenticate
            $signInResult = $auth->signInWithEmailAndPassword($email, $currentPassword);
            
            // Update the user's password
            $auth->changeUserPassword($verifiedUserId, $newPassword);
            
            $success = "Password updated successfully!";
        } catch (\Kreait\Firebase\Exception\Auth\AuthError $e) {
            $error = $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
<?php 
include('includes/header.php');
?>
<center> 
       <h1>Welcome to the Home Page</h1>
    <p>You are logged in as <?php echo htmlspecialchars($_SESSION['user_email']); ?>.</p>
    
    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    } elseif (isset($success)) {
        echo "<p style='color: green;'>$success</p>";
    }
    ?>
    
    <form method="post" action="">
        <h2>Change Password</h2>
        <label for="current_password">Current Password:</label><br>
        <input type="password" id="current_password" name="current_password" required><br><br>
        
        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>
        
        <label for="confirm_password">Confirm New Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        
        <input type="submit" value="Change Password">
    </form>
</center>

</body>
</html>
