<?php
session_start();
include('../includes/header.php');
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h4>Help</h4>
        </div>
        <div class="card-body">
            <h5>Frequently Asked Questions</h5>
            <p>Q: How do I update my profile?<br>A: You can update your profile by going to the Profile Settings page.</p>
            <p>Q: How do I change my password?<br>A: You can change your password by going to the Account Settings page.</p>
            <p>Q: Who can I contact for support?<br>A: You can contact our support team at support@muntinggabay.com.</p>

            <h5>Contact Support</h5>
            <form action="submit-help-request.php" method="POST">
                <div class="mb-3">
                    <label for="issue" class="form-label">Describe your issue</label>
                    <textarea class="form-control" id="issue" name="issue" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit Request</button>
            </form>
        </div>
    </div>
</div>