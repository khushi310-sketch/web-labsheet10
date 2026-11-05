<?php
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "your_email@gmail.com";
$mail->Password = "your_app_password";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->setFrom("your_email@gmail.com", "Website");
$mail->addAddress("receiver@gmail.com");

$mail->Subject = "Registration Confirmation";
$mail->Body = "Registration Successful";

$mail->send();

echo "Email Sent";
?>