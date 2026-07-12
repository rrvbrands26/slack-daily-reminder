<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize Inputs
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $subject_input = htmlspecialchars(trim($_POST['subject']));
    $message_input = htmlspecialchars(trim($_POST['message']));

     $to = "sales@anuttaradigital.com, bs@anuttaradigital.com, ss@anuttaradigital.com, ns@anuttaradigital.com, hr@anuttaradigital.com";
    $subject = "New Contact Form Submission";

    $message = "
    <html>
    <head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; border: 1px solid #ddd; }
        h2 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        p { margin-top: 20px; }
    </style>
    </head>
    <body>
        <div class='container'>
            <h2>New Contact Form Submission</h2>
            <table>
                <tr><th>Field</th><th>Details</th></tr>
                <tr><td>First Name</td><td>{$first_name}</td></tr>
                <tr><td>Last Name</td><td>{$last_name}</td></tr>
                <tr><td>Email</td><td>{$email}</td></tr>
                <tr><td>Phone</td><td>{$phone}</td></tr>
                <tr><td>Subject</td><td>{$subject_input}</td></tr>
                <tr><td>Message</td><td>{$message_input}</td></tr>
            </table>
            <p>Regards,<br>Website Form</p>
        </div>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: noreply@" . $_SERVER['SERVER_NAME'] . "\r\n";
    $headers .= "Reply-To: {$email}\r\n";

    $redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.html';

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Message Sent Successfully!'); window.location.href = '$redirect_url';</script>";
    } else {
        echo "<script>alert('Message sending failed!'); window.location.href = '$redirect_url';</script>";
    }
}
?>