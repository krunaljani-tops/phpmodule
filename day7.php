
<?php
// Include PHPMailer files (make sure PHPMailer is installed)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure this path is correct

// Create instance of PHPMailer
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                           // Set the SMTP server to Gmail
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = 'krunaljani.tops@gmail.com';                 // SMTP username (your Gmail address)
    $mail->Password = 'dxyt plcq rfqa aeys';                    // SMTP password (use your Gmail App Password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       // Enable STARTTLS encryption
    $mail->Port = 587;                                       // TCP port to connect to (587 for TLS, 465 for SSL)

    //Recipients
    $mail->setFrom('krunaljani.tops@gmail.com', 'Krunal');         // From email address
    $mail->addAddress('krunal939@gmail.com', 'Krunal Jani');   // Add a recipient (recipient's email)

    // Content
    $mail->isHTML(true);                                      // Set email format to HTML
    $mail->Subject = 'Test Email via Gmail SMTP with STARTTLS';
    $mail->Body    = 'This is a <b>test</b> email sent via Gmail SMTP using PHPMailer with STARTTLS encryption.';
    $mail->AltBody = 'This is a test email sent via Gmail SMTP using PHPMailer with STARTTLS encryption.';

    // Send email
    $mail->send();

/// log entry
// $log_entry = "Date: " . date('Y-m-d H:i:s') . "\n";
 $log_entry = "To: krunal939@gmail.com\n";
 $log_entry .= "Subject: Test Email via Gmail SMTP\n";
// $log_entry .= "Message: $message\n";

    echo 'Message has been sent';
    $file = fopen("log.txt", "a"); // Open file in append mode
    if ($file) {
    fwrite($file, "Email sent at: " . date('Y-m-d H:i:s').$log_entry . "\n");
    fclose($file);
} else {
    echo "Unable to open file!";
}
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

