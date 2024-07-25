<?php
session_start();
if (!isset($_SESSION['verified_user_id'])) {
    header('Location: ../login.php'); // Redirect to login if not authenticated
    exit();
}

// Include necessary files and set up Firebase authentication
include(__DIR__ . '/../includes/header.php'); // Corrected path
include(__DIR__ . '/../config/dbcon.php'); // Corrected path

use Kreait\Firebase\Exception\Auth\UserNotFound;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>User List - Munting Gabay</title>
</head>

<body>
    <main class="main-content">
        <div class="content-wrapper">
            <?php include(__DIR__ . '/../includes/navbar.php'); // Corrected path 
            ?>

            <?php
            if (isset($_SESSION['status'])) {
                echo "<div class='alert alert-success'>" . htmlspecialchars($_SESSION['status']) . "</div>";
                unset($_SESSION['status']);
            }
            ?>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header bg-success text-white">
                                <h4>Registered User List</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($auth)) {
                                    try {
                                        // Fetch the list of users
                                        $users = $auth->listUsers();

                                        echo "<table class='table'>";
                                        echo "<thead><tr><th>S1.No</th><th>Full Name</th><th>Phone No.</th><th>Email</th><th>Edit</th><th>Delete</th></tr></thead>";
                                        echo "<tbody>";
                                        foreach ($users as $user) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($user->displayName) . "</td>";
                                            echo "<td>" . htmlspecialchars($user->phoneNumber) . "</td>";
                                            echo "<td>" . htmlspecialchars($user->email) . "</td>";
                                            echo "<td><a href='edit-user.php?id={$user->uid}' class='btn btn-warning'>Edit</a></td>";
                                            echo "<td><a href='delete-user.php?id={$user->uid}' class='btn btn-danger'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody></table>";
                                    } catch (Exception $e) {
                                        echo "Error: " . htmlspecialchars($e->getMessage());
                                    }
                                } else {
                                    echo "Firebase authentication object not available.";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>