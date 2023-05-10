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

$mail->Host = 'smtp.rambler.ru';
$mail->Port = 465;
$mail->Username = 'keitzaharova36757@rambler.ru';
$mail->Password = 'adUZ742Qpfgu';

// От кого
$mail->setFrom('keitzaharova36757@rambler.ru', 'Snipp.ru');

// Кому
$mail->addAddress('german.bagdasaryan@mail.ru', 'Иван Петров');

// Тема письма
$mail->Subject = "тестовое письмо";

// Тело письма
$body = '<p><strong>«Hello, world!» </strong></p>';
$mail->msgHTML($body);

$mail->send();
