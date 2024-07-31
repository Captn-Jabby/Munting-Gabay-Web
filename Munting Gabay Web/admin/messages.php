<?php
session_start();
include('../includes/header.php');

if (!isset($_SESSION['verified_user_id'])) {
    header('Location: login.php');
}

// Fetch user messages from the database
// $messages = fetchMessagesFromDatabase($uid); // Assume this function fetches messages

$messages = [
    ["sender" => "John Doe", "message" => "Hello! How are you?", "timestamp" => "2024-07-15 10:00:00"],
    ["sender" => "Jane Smith", "message" => "Don't forget our meeting.", "timestamp" => "2024-07-14 14:30:00"]
];
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h4>Messages</h4>
        </div>
        <div class="card-body">
            <?php if (empty($messages)) : ?>
                <p>No messages found.</p>
            <?php else : ?>
                <ul class="list-group">
                    <?php foreach ($messages as $message) : ?>
                        <li class="list-group-item">
                            <strong><?= htmlspecialchars($message['sender'], ENT_QUOTES, 'UTF-8'); ?></strong>:
                            <?= htmlspecialchars($message['message'], ENT_QUOTES, 'UTF-8'); ?>
                            <span class="text-muted float-end"><?= htmlspecialchars($message['timestamp'], ENT_QUOTES, 'UTF-8'); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>