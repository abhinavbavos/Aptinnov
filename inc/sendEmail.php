<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these variables with your SMTP details
    $toEmail = "agrowteinlabs@gmail.com";
    $subject = $_POST['contactSubject'];
    $message = $_POST['contactMessage'];
    $fromEmail = $_POST['contactEmail'];
    $fromName = $_POST['contactName'];
    
    // SMTP configuration
    $smtpHost = 'smtp.gmail.com';
    $smtpUsername = 'agrowteinlabs@gmail.com';
    $smtpPassword = 'Agrowtein@2023';
    $smtpPort = 465; // Change it according to your SMTP configuration

    // Prepare email headers
    $headers = "From: $fromName <$fromEmail>\r\n";
    $headers .= "Reply-To: $fromEmail\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Attempt to send the email
    if (mail($toEmail, $subject, $message, $headers)) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to send email'));
    }
}
?>
