<?php
session_start();
include('../config/dbcon.php'); // Make sure to include the database connection

if (!isset($_SESSION['verified_user_id'])) {
    header('Location: login.php');
    exit();
}

$uid = $_SESSION['verified_user_id'];
$user = $auth->getUser($uid);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword !== $confirmPassword) {
        $error = "New password and confirm password do not match!";
    } else {
        $email = $user->email;

        try {
            // Reauthenticate the user
            $auth->signInWithEmailAndPassword($email, $currentPassword);

            // Update the user's password
            $auth->changeUserPassword($uid, $newPassword);
            $success = "Password updated successfully!";
        } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
            $error = "Current password is incorrect.";
        } catch (\Kreait\Firebase\Exception\Auth\AuthError $e) {
            $error = "Error updating password: " . $e->getMessage();
        } catch (\Exception $e) {
            $error = "An unexpected error occurred: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="shortcut icon" href="assets/images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column vh-100">
    <?php include('../includes/header.php'); ?>

    <div class="container mt-5 flex-grow-1">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>Account Settings</h4>
            </div>
            <div class="card-body">
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endif; ?>
                <?php if (isset($success)) : ?>
                    <div class="alert alert-success"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endif; ?>
                <form action="account-settings.php" method="POST">
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-success">Update Password</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>