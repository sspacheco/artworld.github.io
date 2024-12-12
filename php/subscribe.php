<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Optional: Save the email to a file or database
    // For simplicity, we'll save it to a text file (emails.txt)
    $file = 'emails.txt';

    // Open the file for appending
    if (file_put_contents($file, $email . PHP_EOL, FILE_APPEND)) {
        echo "Thank you for subscribing!";
    } else {
        echo "An error occurred. Please try again.";
    }
}
?>
