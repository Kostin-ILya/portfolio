<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$text = $_POST['text'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.mrkostin.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@mrkostin.ru';                 // Наш логин
$mail->Password = 'BonesN230992';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
$mail->SMTPOptions = array(
	'ssl' => array(                                  //Настройки для доменной почты ( с хостинга), без них ошибка
			'verify_peer' => false,
			'verify_peer_name' => false,  
			'allow_self_signed' => true
	)
	);
// $mail->SMTPAutoTLS = false;                  // Настройки без шифрования 
// $mail->SMTPSecure = false;
// $mail->Port = 25;
 
$mail->setFrom('info@mrkostin.ru', 'Pulse');   // От кого письмо 
$mail->addAddress('lord-ilja@yandex.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Данные клиента';
$mail->Body    = '
		Клиент оставил данные <br> <br>
	Имя: ' . $name . ' <br>
	Номер телефона: ' . $phone . '<br>
	E-mail: ' . $email . '  <br>
	Сообщение: ' . $text . '';
	

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>