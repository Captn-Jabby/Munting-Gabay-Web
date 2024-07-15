<?php
include('dbcon.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo isset($_SESSION['verified_user_id']) ? 'home.php' : 'index.php'; ?>">
            <img src="assets/images/icon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-1">
            <span class="fw-bold text-light">Munting Gabay</span>
        </a>
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
                        <a class="nav-link text-light" href="user-list.php">User List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="doctor_approval.php">Pending Doctors</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['verified_user_id'])) : ?>
                    <li class="nav-item dropdown">
                        <?php 
                        $uid = $_SESSION['verified_user_id'];
                        $user = $auth->getUser($uid);
                        ?>
                        <a class="nav-link dropdown-toggle text-light d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= htmlspecialchars($user->displayName, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php">Profile Settings</a></li>
                            <li><a class="dropdown-item" href="account-settings.php">Account Settings</a></li>
                            <li><a class="dropdown-item" href="messages.php">Messages</a></li>
                            <li><a class="dropdown-item" href="notifications.php">Notifications</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="help.php">Help</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>