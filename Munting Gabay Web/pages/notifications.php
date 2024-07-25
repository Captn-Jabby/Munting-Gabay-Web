<?php
session_start();
include('includes/header.php');

if (!isset($_SESSION['verified_user_id'])) {
    header('Location: login.php');
}

// Fetch user notifications from the database
// $notifications = fetchNotificationsFromDatabase($uid); // Assume this function fetches notifications

$notifications = [
    ["message" => "Your profile was updated successfully.", "timestamp" => "2024-07-15 10:00:00"],
    ["message" => "New event: Autism Awareness Workshop.", "timestamp" => "2024-07-14 14:30:00"]
];
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h4>Notifications</h4>
        </div>
        <div class="card-body">
            <?php if (empty($notifications)) : ?>
                <p>No notifications found.</p>
            <?php else : ?>
                <ul class="list-group">
                    <?php foreach ($notifications as $notification) : ?>
                        <li class="list-group-item">
                            <?= htmlspecialchars($notification['message'], ENT_QUOTES, 'UTF-8'); ?>
                            <span class="text-muted float-end"><?= htmlspecialchars($notification['timestamp'], ENT_QUOTES, 'UTF-8'); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
