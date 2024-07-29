<?php
session_start();
if (!isset($_SESSION['verified_user_id'])) {
    header('Location: login.php');
}

// Include the Firebase SDK initialization
include('../config/dbcon.php');

$uid = $_SESSION['verified_user_id'];
$user = $auth->getUser($uid);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword !== $confirmPassword) {
        $error = "New password and confirm password do not match!";
    } else {
        $email = $_SESSION['user_email'];

        try {
            // Sign in the user with their current password to reauthenticate
            $signInResult = $auth->signInWithEmailAndPassword($email, $currentPassword);

            // Update the user's password
            $auth->changeUserPassword($uid, $newPassword);

            $success = "Password updated successfully!";
        } catch (\Kreait\Firebase\Exception\Auth\AuthError $e) {
            $error = $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="shortcut icon" href="assets/images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column vh-100">
    <?php include('../includes/header.php'); ?>

    <div class="container mt-5 flex-grow-1">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>Profile Settings</h4>
            </div>
            <div class="card-body">
                <form action="update-profile.php" method="POST">
                    <div class="mb-3">
                        <label for="displayName" class="form-label">Display Name</label>
                        <input type="text" class="form-control" id="displayName" name="displayName" value="<?= htmlspecialchars($user->displayName, ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Update Profile</button>
                </form>
            </div>
        </div>
    </div>



    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>