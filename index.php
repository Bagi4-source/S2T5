<?php
require './phpMailer/PHPMailer.php';
require './phpMailer/SMTP.php';
require './phpMailer/Exception.php';

// Для более ранних версий PHPMailer
//require_once '/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer\PHPMailer\PHPMailer;
$mail->CharSet = 'UTF-8';

// Настройки SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;

$mail->Host = 'ssl://smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'serv9413@gmail.com';
$mail->Password = 'germes27';

// От кого
$mail->setFrom('mail@snipp.ru', 'Snipp.ru');

// Кому
$mail->addAddress('german.bagdasaryan@mail.ru', 'Иван Петров');

// Тема письма
$mail->Subject = "Регистрация";

// Тело письма
$body = '<p><strong>«Hello, world!» </strong></p>';
$mail->msgHTML($body);

$mail->send();
