<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="includes/icon.png" type="image/x-icon">
    <title>Login</title>
</head>

<body>
    <?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ?>
    <main class="main-content">
        <div class="content-wrapper">
            <?php
            include('includes/header.php');
            ?>


            <?php
            if (isset($_SESSION['status'])) {
                echo "<h5 class='alert alert-success'>" . $_SESSION['status'] . "</h5>";
                unset($_SESSION['status']);
            }
            ?>

            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    Login
                                    <a href="index.php" class="btn btn-danger float-end">BACK</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="logincode.php" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="email">Email Address</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>

                                    <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>

</html>