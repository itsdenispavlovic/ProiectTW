<?php
/**
 * This example shows making an SMTP connection with authentication.
 */
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'denisthepavlovic@gmail.com';                     // SMTP username
    $mail->Password   = 'qsihayfkhnvanbjc';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    // password pentru proiecttw : qsihayfkhnvanbjc
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    //Recipients
    $mail->setFrom('admin@strongaim.com', 'Bookface');
    $mail->addAddress('pavlovicdenis@icloud.com', 'Denis Pavlovic');     // Add a recipient

    // Content
    $mail->Subject = 'Activation Code';
    $variables = [$randomKey];

    $message = file_get_contents('emailT.html');

    $randomKey="dasdq2qda21d";

    $message = str_replace('%activationCODE%', $randomKey, $message);

    $mail->msgHTML($message);

    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}