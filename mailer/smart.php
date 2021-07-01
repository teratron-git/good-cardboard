<?php

$name = $_POST['user_name'];
$phone = $_POST['phone'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                                 // Enable verbose debug output

$mail->isSMTP();                                        // Set mailer to use SMTP
$mail->Host = $_ENV["MAILER_HOST"];                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                 // Enable SMTP authentication
$mail->Username = $_ENV["MAILER_USERNAME"];             // Наш логин
$mail->Password = $_ENV["MAILER_PASSWORD"];             // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
$mail->Port = $_ENV["MAILER_PORT"];                     // TCP port to connect to

$mail->setFrom('rat87@mail.ru', 'Почтовый скрипт');     // От кого письмо 
$mail->addAddress('rat87@mail.ru');                     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                    // Set email format to HTML

$mail->Subject = 'Отправка формы: урок 23';
$mail->Body    = '
	Пользователь оставил свои данные: <br> 
	Телефон: ' . $phone . '';
$mail->AltBody = 'Это альтернативный текст';

// if (!$mail->send()) {
//     return false;
// } else {
//     return true;
// }

return true;