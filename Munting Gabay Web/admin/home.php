<?php
include('../config/session_check.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="../assets/images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('../includes/navbar.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row">
            <nav id="sidebar" class="col-md-2 d-flex flex-column bg-success">
                <h4 class="p-3 mb-1 mr-5 bg-success">Admin Panel</h4>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="home.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user-list.php">User List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback-list.php">Feedbacks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">Settings</a>
                    </li>
                </ul>
            </nav>
            <main class="col-md-10 offset-md-2 main-content">
                <div class="container mt-4">
                    <h1 class="text-center">Welcome to the Admin Dashboard</h1>
                    <p class="text-center">Logged in as <?php echo htmlspecialchars($_SESSION['user_email']); ?>.</p>

                    <!-- Dashboard Overview -->
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Site Statistics</h5>
                                </div>
                                <div class="card-body">
                                    <p>Total Users: 123</p>
                                    <p>Total Feedbacks: 456</p>
                                    <p>Pending Approvals: 7</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h5 class="card-title">Recent Activity</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li>User John Doe registered.</li>
                                        <li>Feedback from Jane Smith received.</li>
                                        <li>New comment on post "How to secure your website".</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-header bg-warning">
                                    <h5 class="card-title">Pending Actions</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li>Approve new user registrations.</li>
                                        <li>Review recent feedbacks.</li>
                                        <li>Update website content.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Health Status -->
                    <div class="card mt-4">
                        <div class="card-header bg-secondary">
                            <h5 class="card-title">System Health Status</h5>
                        </div>
                        <div class="card-body">
                            <p>Database Connection: <span class="text-success">OK</span></p>
                            <p>API Status: <span class="text-warning">Minor Issues</span></p>
                            <p>Server Load: <span class="text-success">Stable</span></p>
                        </div>
                    </div>

                    <!-- Alerts and Notifications -->
                    <div class="card mt-4">
                        <div class="card-header bg-danger">
                            <h5 class="card-title">Alerts and Notifications</h5>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning" role="alert">
                                A new security update is available. Please update the system.
                            </div>
                            <div class="alert alert-info" role="alert">
                                Scheduled maintenance will occur on 01-Aug-2024 from 01:00 to 03:00 UTC.
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>