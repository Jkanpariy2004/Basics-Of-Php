<?php

require "smtp/PHPMailerAutoload.php";
require "smtp/class.smtp.php";
require "smtp/class.phpmailer.php";

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'jainishkanpariya@gmail.com';
$mail->Password = 'ayunatmgbhuflobg';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('jainishkanpariya@gmail.com', 'Blue Mountain Resort & Hospitality');
$mail->addReplyTo('jainishkanpariya@gmail.com', 'Blue Mountain Resort & Hospitality');
$mail->addAddress('jainishkanpariya@gmail.com');

$mail->isHTML(true);
$mail->Subject = 'Test Mail';
$mail->Body = "Hii, This is Test Mail.";

if (!$mail->send()) {
    echo 'Message could not be sent.<br>';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>
