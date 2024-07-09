<?php
session_start();
if (!isset($_SESSION['verified_user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<?php
include('includes/header.php');
?>



<div class="card-body">
    <div class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S1.No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Id</th>
                <th>Phone No.</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr>

            </tr>
        </tbody>
    </div>
</div>