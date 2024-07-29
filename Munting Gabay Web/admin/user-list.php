<?php
session_start();
if (!isset($_SESSION['verified_user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!-- include('includes/authentication.php'); -->
<?php
include('../includes/header.php');
?>
<br>
<link rel="stylesheet" href="../assets/css/style.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_SESSION['status'])) {
                echo "<div class='alert alert-success'>" . $_SESSION['status'] . "</div>";
                unset($_SESSION['status']);
            }
            ?>

            <div class="card">
                <div class="card-header">
                    <h4>
                        Registered User List
                    </h4>
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
                                        <!-- <a href="user-edit.php?" class="btn btn-danger btn-sm">Delete</a> -->
                                        <form action="code.php" method="POST">
                                            <button type="submit" name="reg_user_delete_btn" value="<?= $user->uid; ?>" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
</div>