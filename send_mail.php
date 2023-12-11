<?php

// Add your information here
$to = "munyaradzi045@gmail.com";

// Don't edit anything below this line

// Import form information
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

$message = "Name: $name, Phone: $phone\n\nMessage: $message";

$errors = [];

// Simple form validation
if (empty($message)) {
    $errors[] = "No message was entered. Please include a message.";
}

if (empty($email)) {
    $errors[] = "No email address was entered. Please include your email.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format. Please enter a valid email address.";
}

// Mail the form contents
if (empty($errors)) {
    $headers = "From: $email";

    if (mail($to, $phone, $message, $headers)) {
        echo '<div class="alert alert-success alert-dismissable fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>Email Sent Successfully! We will get back to you shortly.</p>
        </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissable fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>There was an error sending the email. Please try again later.</p>
        </div>';
    }
} else {
    foreach ($errors as $error) {
        echo '<div class="alert alert-danger alert-dismissable fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>' . $error . '</p>
        </div>';
    }
}
?>
