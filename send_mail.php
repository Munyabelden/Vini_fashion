<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Compose the email message
    $to = 'munyaradzi045@gmail.com';
    $subject = 'New Contact Form Submission';
    $body = "Full Name: $fullname\nEmail: $email\nPhone Number: $phone\nMessage: $message";

    // Send the email
    if (mail($to, $subject, $body)) {
        echo '<script>alert("Message sent successfully. We will contact you shortly.");</script>';
    } else {
        echo '<script>alert("Oops! Something went wrong. Please try again later.");</script>';
    }
    }
?>
