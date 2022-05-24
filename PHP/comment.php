<?php

require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';
require '../phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$message = $_POST['message'];

$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
$mail->Port = 465;
$mail->Username = 'kdzumela@gmail.com';
$mail->Password = 'beatyboom';

$mail->setFrom('kdzumela@gmail.com');
$mail->addAddress('beatyboomm@gmail.com');
//$mail->isHTML(true);

$mail->Subject = 'Коментар';
$mail->Body    = $name . ' з контактною адресою: ' . $email . " залишив(ла) коментар: \n" . $message;

if(!$mail->Send()) {
    echo 'Error <br>';
    echo $mail->ErrorInfo;
} else {
    header('location: ../index.html');
}
$mail->smtpClose();
?>