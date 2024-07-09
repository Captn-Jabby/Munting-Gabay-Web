<?php
session_start();
include('dbcon.php');

if (isset($_POST['register_btn'])) {
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'phoneNumber' => '+91' . $phone,
        'password' => $password,
        'displayName' => $full_name,
    ];

    try {
        $createdUser = $auth->createUser($userProperties);
        $_SESSION['status'] = "User Registered Successfully";
    } catch (\Kreait\Firebase\Exception\Auth\PhoneNumberExists $e) {
        $_SESSION['status'] = "Phone number already exists: " . $e->getMessage();
    } catch (\Kreait\Firebase\Exception\Auth\EmailExists $e) {
        $_SESSION['status'] = "Email already exists: " . $e->getMessage();
    } catch (Exception $e) {
        $_SESSION['status'] = "Error: " . $e->getMessage();
    }

    header('Location: register.php');
    exit();
}
?>
