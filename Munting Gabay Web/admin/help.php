<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include Composer autoload file if using an external service like Brevo
require '../vendor/autoload.php';

use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;
use GuzzleHttp\Client;

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $issue = htmlspecialchars($_POST['issue']);

    if (!empty($issue)) {
        // Configure Brevo API with the correct API key and other settings
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
        $apiInstance = new TransactionalEmailsApi(new Client(), $config);

        $sendSmtpEmail = new SendSmtpEmail([
            'to' => [['email' => 'muntinggabay@gmail.com', 'name' => 'Admin']],
            'sender' => ['email' => '7999dc001@smtp-brevo.com', 'name' => 'Support Team'],
            'subject' => 'Support Request from Help Page',
            'htmlContent' => "<p><strong>Support Request:</strong></p><p>{$issue}</p>"
        ]);

        try {
            $apiInstance->sendTransacEmail($sendSmtpEmail);
            $_SESSION['status'] = 'Your request has been sent successfully.';
        } catch (Exception $e) {
            $_SESSION['status'] = 'Failed to send your request. Please try again. API Error: ' . $e->getMessage();
        }

        header('Location: help.php');
        exit();
    } else {
        $_SESSION['status'] = 'Please describe your issue before submitting.';
        header('Location: help.php');
        exit();
    }
}

// Include header
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
            <form action="help.php" method="POST">
                <div class="mb-3">
                    <label for="issue" class="form-label">Describe your issue</label>
                    <textarea class="form-control" id="issue" name="issue" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit Request</button>
            </form>

            <?php if (isset($_SESSION['status'])) : ?>
                <div class="alert <?php echo strpos($_SESSION['status'], 'Failed') === false ? 'alert-success' : 'alert-danger'; ?>">
                    <?php echo $_SESSION['status']; ?>
                </div>
                <?php unset($_SESSION['status']); ?>
            <?php endif; ?>
        </div>
    </div>
</div>