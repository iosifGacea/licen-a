<?php   

$statement = $_POST['statement'];
$var_a = $_POST['a'];
$var_b = $_POST['b'];
$var_c = $_POST['c'];
$var_d = $_POST['d'];
$var_e = $_POST['e'];

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

$mail->Subject = 'New Question';
$mail->Body = 'statement>'."$statement".'  '.'a>'."$var_a".'  '.'b>'."$var_b".'  '.'c>'."$var_c".'  '.'d>'."$var_d".'  '.'e>'."$var_e".'  '.$_POST['university'];

$mail->send();

header("Location: sent_question.html");