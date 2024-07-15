<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <?php if (isset($_SESSION['verified_user_id'])) : ?>
            <a class="navbar-brand" href="home.php">
                <img src="assets/images/icon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-1">
                <span class="fw-bold text-light">Munting Gabay</span>
            </a>
        <?php else : ?>
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/icon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-1">
                <span class="fw-bold text-light">Munting Gabay</span>
            </a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['verified_user_id'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="user-list.php">User List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="doctor_approval.php">Pending Doctors</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-light" href="../login.php">Logout</a>
<?php
$_SESSION['status'] = "<span style='color: red;'>Logout Successfully as Admin</span>";
?>
</li>
                <?php endif; ?>
            </ul>
         
        </div>
    </div>
</nav>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Munting Gabay</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
<h1>This is the admin page</h1>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
