<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = '';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@notify.sieu.vn', 'Mailer');
    $mail->addAddress('nguyentuansieu@gmail.com', 'Nguyen Tuan Sieu');
    $mail->addAddress('tuannda@vnext.com.vn', 'Nguyen Tuan Sieu');
	$mail->addAddress('iam@sieu.vn', 'Nguyen Tuan Sieu');
    $mail->addReplyTo('no-reply@sieu.vn', 'Nguyen Tuan Sieu');



    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject ' . date('Y-m-d H:i:s');
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}