<?php



include "PHPMailer.php";

include "SMTP.php";
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

$mail->SMTPDebug = SMTP::DEBUG_SERVER;


$mail->Host = 'smtp.naver.com';

$mail->Port = 465;

$mail->SMTPSecure = "ssl";

$mail->SMTPAuth = true;

$mail->Username = 'sinship';

$mail->Password = '3SYCP5EPUVW5';

$mail->setFrom('sinship@naver.com', '빵빵이');

$mail->addReplyTo('sinship@naver.com', '빵빵이');

//Set who the message is to be sent to
$mail->addAddress('maship1306@gmail.com', '테스트');
$mail->CharSet = 'UTF-8';
//Set the subject line
$mail->Subject = '빵빵이 테스트destroy222';


$mail->msgHTML("테스트zzz");


//Attach an image file
$mail->addAttachment('file/logo.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}