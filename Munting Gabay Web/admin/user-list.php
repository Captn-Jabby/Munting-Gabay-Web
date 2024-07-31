<?php
session_start();
if (!isset($_SESSION['verified_user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<?php
include('../includes/header.php');
?>
<link rel="stylesheet" href="../assets/css/style.css">

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-2 d-flex flex-column bg-success p-3">
            <h4 class="p-3 mb-1 bg-success text-white">Admin Panel</h4>
            <ul class="nav flex-column mt-4">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="user-list.php">User List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback-list.php">Feedbacks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="settings.php">Settings</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-md-10 offset-md-2" style="padding-top: 60px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-light p-3 mt-3">
                            <div class="card-header">
                                <h4>Registered User List</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Full Name</th>
                                            <th>Phone No.</th>
                                            <th>Email</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('../config/dbcon.php');
                                        $users = $auth->listUsers();

                                        $i = 1;
                                        foreach ($users as $user) {
                                        ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $user->displayName ?></td>
                                                <td><?= $user->phoneNumber ?></td>
                                                <td><?= $user->email ?></td>
                                                <td>
                                                    <a href="user-edit.php?id=<?= $user->uid; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <button type="submit" name="reg_user_delete_btn" value="<?= $user->uid; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>