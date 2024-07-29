<?php
session_start();
include('../includes/header.php');

if (!isset($_SESSION['verified_user_id'])) {
    header('Location: login.php');
}

$uid = $_SESSION['verified_user_id'];
$user = $auth->getUser($uid);
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h4>Account Settings</h4>
        </div>
        <div class="card-body">
            <form action="update-account-settings.php" method="POST">
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                </div>
                <button type="submit" class="btn btn-success">Update Settings</button>
            </form>
        </div>
    </div>
</div>