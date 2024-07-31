<?php
session_start();
include('../config/dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form data
    $username = $_POST['username'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $clinic_name = $_POST['clinic_name'];
    $clinic_address = $_POST['clinic_address'];
    $phone_number = $_POST['phone_number'];
    $specialty = $_POST['specialty'];

    // File upload paths
    $identification = $_FILES['identification']['name'];
    $licensure = $_FILES['licensure']['name'];
    $profile_picture = $_FILES['profile_picture']['name'];

    $target_dir = "../uploads/";
    $identification_target = $target_dir . basename($identification);
    $licensure_target = $target_dir . basename($licensure);
    $profile_picture_target = $target_dir . basename($profile_picture);

    try {
        // Check if user already exists
        $user = $auth->getUserByEmail($email);

        if ($user) {
            $_SESSION['error'] = 'Error: The email address is already in use by another account.';
            header('Location: register.php');
            exit();
        }
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        // User not found, proceed with registration
    } catch (\Exception $e) {
        $_SESSION['error'] = 'Error: ' . $e->getMessage();
        header('Location: register.php');
        exit();
    }

    try {
        // Upload files
        if (is_uploaded_file($_FILES["identification"]["tmp_name"])) {
            move_uploaded_file($_FILES["identification"]["tmp_name"], $identification_target);
        } else {
            throw new Exception('Error uploading identification file.');
        }

        if (is_uploaded_file($_FILES["licensure"]["tmp_name"])) {
            move_uploaded_file($_FILES["licensure"]["tmp_name"], $licensure_target);
        } else {
            throw new Exception('Error uploading licensure file.');
        }

        if (is_uploaded_file($_FILES["profile_picture"]["tmp_name"])) {
            move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profile_picture_target);
        } else {
            throw new Exception('Error uploading profile picture.');
        }

        // Create user in Firebase Authentication
        $userProperties = [
            'email' => $email,
            'emailVerified' => false,
            'password' => $password,
            'displayName' => $name,
            'disabled' => false,
        ];

        $createdUser = $auth->createUser($userProperties);

        // Save user data to Firestore
        $database->collection('users')->document($createdUser->uid)->set([
            'username' => $username,
            'name' => $name,
            'address' => $address,
            'birthdate' => new \DateTime($birthdate), // Convert to DateTime object
            'email' => $email,
            'clinic_name' => $clinic_name,
            'clinic_address' => $clinic_address,
            'phone_number' => $phone_number,
            'specialty' => $specialty,
            'uid' => $createdUser->uid,
            'status' => 'pending',
            'identification' => $identification_target,
            'licensure' => $licensure_target,
            'profile_picture' => $profile_picture_target,
        ]);

        $_SESSION['success'] = "Doctor registered successfully";
        header('Location: register.php');
        exit();
    } catch (\Kreait\Firebase\Exception\Auth\AuthError $e) {
        $_SESSION['error'] = 'Error creating user: ' . $e->getMessage();
        header('Location: register.php');
        exit();
    } catch (\Google\Cloud\Core\ExponentialBackoff $e) {
        $_SESSION['error'] = 'Error saving data to Firestore: ';
        header('Location: register.php');
        exit();
    } catch (\Exception $e) {
        $_SESSION['error'] = 'General error: ' . $e->getMessage();
        header('Location: register.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column vh-100">
    <?php include('../includes/header.php'); ?>

    <div class="container mt-5">
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <div class="card mx-auto card-register">
            <div class="card-header bg-success text-white text-center">
                <h4>Register Doctor</h4>
            </div>
            <div class="card-body">
                <form action="register.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="clinic_name" class="form-label">Clinic Name</label>
                        <input type="text" class="form-control" id="clinic_name" name="clinic_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="clinic_address" class="form-label">Clinic Address</label>
                        <input type="text" class="form-control" id="clinic_address" name="clinic_address" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="specialty" class="form-label">Specialty</label>
                        <input type="text" class="form-control" id="specialty" name="specialty" required>
                    </div>
                    <div class="mb-3">
                        <label for="identification" class="form-label">Identification</label>
                        <input type="file" class="form-control" id="identification" name="identification" required>
                    </div>
                    <div class="mb-3">
                        <label for="licensure" class="form-label">Licensure</label>
                        <input type="file" class="form-control" id="licensure" name="licensure" required>
                    </div>
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>