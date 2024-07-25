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
    <link rel="shortcut icon" href="../assets/images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column vh-100">
    <?php include('../includes/navbar.php'); ?>
    <center>
        <h1>Welcome to the Home Page</h1>
        <p>You are logged in as <?php echo htmlspecialchars($_SESSION['user_email']); ?>.</p>
    </center>
</body>

</html>