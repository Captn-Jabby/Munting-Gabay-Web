<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Register - Munting Gabay</title>
</head>
<?php

use Kreait\Firebase\Exception\Auth\UserNotFound;

session_start();
if (!isset($_SESSION['verified_user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<main class="main-content">
    <div class="content-wrapper">
        <?php include('includes/navbar.php'); ?>

        <?php
        if (isset($_SESSION['status'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['status'] . "</div>";
            unset($_SESSION['status']);
        }
        ?>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h4>
                                Edit User Data
                                <a href="user-list.php" class="btn btn-light float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST">
                                <?php
                                include('dbcon.php');

                                if(isset($_GET['id']))
                                {
                                    $uid = $_GET['id'];
                                    try {
                                    $user = $auth->getUser($uid);
                                    ?>
                                    <input type="hidden" name="user_id" value="<?=$uid;?>">
                                    <div class="form-group mb-3">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" name="full_name" value="<?=$user->displayName;?>" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phone"value="<?=$user->phoneNumber;?>" class="form-control" required>
                                    </div>
                                    <button type="submit" name="update_user_btn" class="btn btn-success btn-block">Update User</button>

                                    <?php
                                } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e){
                                    echo $e->getMessage();
                                }
                                }
                                
                                ?>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>