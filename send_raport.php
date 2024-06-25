<?php   
session_start();
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);


$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "iosifgacea0@gmail.com";
$mail->Password = "qfym uhsd pnjt vpge";

$mail->addAddress('iosifgacea10@gmail.com', 'Iosif');

$mail->Subject = 'RAPORT';
$mail->Body = $message.'   '.$_SESSION['email'];

$mail->send();

header("Location: sent_raport.html");