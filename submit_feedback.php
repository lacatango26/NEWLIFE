<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "lacatango26@gmail.com"; // Replace with your Gmail address
    $subject = "Customer Feedback from $name";
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    // Email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "<p>Thank you for your feedback. We will get back to you shortly.</p>";
    } else {
        echo "<p>Sorry, there was an error sending your feedback. Please try again later.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
