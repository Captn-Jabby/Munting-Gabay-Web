<?php
// Determine the base URL based on the current script's directory
$currentDir = basename(dirname($_SERVER['SCRIPT_FILENAME']));
$basePath = ($currentDir === 'pages') ? '../' : '';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">

    <?php if (isset($_SESSION['verified_user_id'])) : ?>
        <a class="navbar-brand" href="<?= $basePath ?>home.php">Munting Gabay</a>
    <?php else : ?>
        <a class="navbar-brand" href="<?= $basePath ?>index.php">Munting Gabay</a>
    <?php endif; ?>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['verified_user_id'])) : ?>
                <!-- Links for logged-in users -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= $basePath ?>home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $basePath ?>user-list.php">User List</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= $basePath ?>profile.php">Profile Settings</a>
                        <a class="dropdown-item" href="<?= $basePath ?>account-settings.php">Account Settings</a>
                        <a class="dropdown-item" href="<?= $basePath ?>messages.php">Messages</a>
                        <a class="dropdown-item" href="<?= $basePath ?>notifications.php">Notifications</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= $basePath ?>help.php">Help</a>
                        <a class="dropdown-item" href="<?= $basePath ?>logout.php">Logout</a>
                    </div>
                </li>
            <?php else : ?>
                <!-- Links for guests or logged-out users -->
                <form class="d-flex">
                    <button class="btn btn-outline-success me-2 border-white" type="button">
                        <a class="text-decoration-none text-light" href="<?= $basePath ?>pages/login.php">Login</a>
                    </button>
                    <button class="btn btn-outline-success border-white" type="button">
                        <a class="text-decoration-none text-light" href="<?= $basePath ?>pages/register.php">Register</a>
                    </button>
                </form>
            <?php endif; ?>
        </ul>
    </div>
</nav>