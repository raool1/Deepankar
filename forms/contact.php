<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(strip_tags($_POST['subject']));
    $message = htmlspecialchars(strip_tags($_POST['message']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    $to = "info@snichein.com"; // Replace with your desired email
    $mailSubject = "Contact Form Message: $subject";
    $mailMessage = "You have received a new message from your website contact form.\n\n" .
                   "Name: $name\n" .
                   "Email: $email\n" .
                   "Message:\n$message";
    $headers = "From: noreply@snichein.com\r\nReply-To: $email";

    if (mail($to, $mailSubject, $mailMessage, $headers)) {
        echo "success";
    } else {
        echo "There was an error sending your message. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
