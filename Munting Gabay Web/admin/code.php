<?php
session_start();
include('../config/dbcon.php');


if (isset($_POST['reg_user_delete_btn'])) {
    $uid = $_POST['reg_user_delete_btn'];

    try {
        $auth->deleteUser($uid);
        $_SESSION['status'] = "User Deleted Successfully";
        header('Location: user-list.php');
        exit();
    } catch (Exception $e) {
        $_SESSION['status'] = "User ID Found";
        header('Location: user-list.php');
        exit();
    }
}



if (isset($_POST['update_user_btn'])) {
    $displayName = $_POST['full_name'];
    $phone = $_POST['phone'];

    $uid = $_POST['user_id'];
    $properties = [
        'displayName' => $displayName,
        'phoneNumber' => $phone,
    ];

    $updateUser = $auth->updateUser($uid, $properties);

    if ($updateUser) {
        $_SESSION['status'] = "User Updated Successfully";
        header('Location: user-list.php');
        exit();
    } else {
        $_SESSION['status'] = "User not Updated Successfully";
        header('Location: user-list.php');
        exit();
    }
}

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
