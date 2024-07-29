<?php
// Determine the base URL based on the current script's directory
$currentDir = basename(dirname($_SERVER['SCRIPT_FILENAME']));
$basePath = ($currentDir === 'pages') ? '../' : '';

// Get the current page name
$currentPage = basename($_SERVER['SCRIPT_FILENAME'], ".php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <?php if (isset($_SESSION['verified_user_id'])) : ?>
            <a class="navbar-brand" href="<?= $basePath ?>home.php">Admin Dashboard</a>
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
                    <li class="nav-item <?= ($currentPage == 'home') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= $basePath ?>home.php">Home</a>
                    </li>
                    <li class="nav-item <?= ($currentPage == 'user-list') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= $basePath ?>user-list.php">User List</a>
                    </li>

                    <li class="nav-item dropdown <?= in_array($currentPage, ['profile', 'account-settings', 'messages', 'notifications', 'help']) ? 'active' : '' ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item <?= ($currentPage == 'profile') ? 'active' : '' ?>" href="<?= $basePath ?>profile.php">Profile Settings</a>
                            <a class="dropdown-item <?= ($currentPage == 'account-settings') ? 'active' : '' ?>" href="<?= $basePath ?>account-settings.php">Account Settings</a>
                            <a class="dropdown-item <?= ($currentPage == 'messages') ? 'active' : '' ?>" href="<?= $basePath ?>messages.php">Messages</a>
                            <a class="dropdown-item <?= ($currentPage == 'notifications') ? 'active' : '' ?>" href="<?= $basePath ?>notifications.php">Notifications</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?= ($currentPage == 'help') ? 'active' : '' ?>" href="<?= $basePath ?>help.php">Help</a>
                            <a class="dropdown-item <?= ($currentPage == 'logout') ? 'active' : '' ?>" href="<?= $basePath ?>logout.php">Logout</a>
                        </div>
                    </li>
                <?php else : ?>
                    <!-- Links for guests or logged-out users -->
                    <form class="d-flex">
                        <button class="btn btn-outline-success me-2 border-white m-1" type="button">
                            <a class="text-decoration-none text-light " href="<?= $basePath ?>pages/login.php">Login</a>
                        </button>
                        <button class="btn btn-outline-success border-white bg-light m-1" type="button">
                            <a class="text-decoration-none text-dark" href="<?= $basePath ?>pages/register.php">Register</a>
                        </button>
                    </form>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- jQuery and Popper.js (for Bootstrap 4) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>