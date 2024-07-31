<?php
// Include Composer autoload file
require '../vendor/autoload.php';

use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;
use GuzzleHttp\Client;

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        // Configure Brevo API
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
        $apiInstance = new TransactionalEmailsApi(new Client(), $config);

        $sendSmtpEmail = new SendSmtpEmail([
            'to' => [['email' => 'muntinggabay@gmail.com', 'name' => 'Admin']], // Updated recipient
            'sender' => ['email' => '7999dc001@smtp-brevo.com', 'name' => 'Web Feedback'],
            'subject' => $subject,
            'htmlContent' => "<p>Name: $name</p><p>Email: $email</p><p>Message: $message</p>"
        ]);

        try {
            $apiInstance->sendTransacEmail($sendSmtpEmail);
            $success = "Thank you for contacting us, $name. We will get back to you shortly.";
        } catch (Exception $e) {
            error_log("API Error: " . $e->getMessage()); // Log the error
            $error = "Message could not be sent. API Error: {$e->getMessage()}";
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>
<link rel="stylesheet" href="../assets/css/style.css">
<?php
include('../includes/header.php');
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-white bg-success font-weight-bold">
            Contact Us
        </div>
        <div class="card-body">
            <?php if (!empty($success)) : ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php elseif (!empty($error)) : ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="POST" action="contact.php">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>