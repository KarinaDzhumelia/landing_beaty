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
$phone = $_POST['user_phone'];

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

$mail->Subject = 'Заявка на запис';
$mail->Body    = $name . ' з контактним телефоном: ' . $phone . ' надіслав(ла) заявку про запис';

if(!$mail->Send()) {
    $message = 'Error <br>' . $mail->ErrorInfo;
    echo $message;
} else {
    $message = 'Заявку відправлено';
    header('location: ../index.html');
}
//$response = ['massage' => $message];
//header('Content-type: application/json');
//echo json_encode($response);
$mail->smtpClose();
?>