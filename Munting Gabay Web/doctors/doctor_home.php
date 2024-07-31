<?php
session_start();
require_once '../config/dbcon.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get the logged-in user ID from the session
$userId = $_SESSION['user_id'];

try {
    // Fetch user data from Firestore
    $userDoc = $db->collection('doctors')->document($userId)->snapshot();

    if (!$userDoc->exists()) {
        $_SESSION['error'] = 'User data not found.';
        header('Location: login.php');
        exit();
    }

    // Check if the user is a doctor
    $userData = $userDoc->data();
    if (isset($userData['role']) && $userData['role'] === 'doctor') {
        // User is a doctor, show the content
        $name = htmlspecialchars($userData['name']);
    } else {
        $_SESSION['error'] = 'Unauthorized access.';
        header('Location: login.php');
        exit();
    }
} catch (Exception $e) {
    $_SESSION['error'] = 'Error: ' . $e->getMessage();
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column vh-100">
    <?php include('../includes/header.php'); ?>

    <div class="container mt-5">
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <div class="card mx-auto card-register">
            <div class="card-header bg-success text-white text-center">
                <h4>Welcome, Dr. <?php echo $name; ?></h4>
            </div>
            <div class="card-body">
                <p>This is the doctor home page. Only users with the doctor role can access this page.</p>
                <!-- Add additional doctor-specific content here -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>