<?php

include "PHPMailer.php";
include "SMTP.php";

//Create a new PHPMailer instance
$mail = new PHPMailer();
$reason = isset($_POST['reason']) ? $_POST['reason'] : '';
//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
$mail->Host = 'smtp.naver.com';

//Set the SMTP port number
$mail->Port = 465;

//Set the encryption mechanism to use
$mail->SMTPSecure = "ssl";

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication
$mail->Username = 'sinship';

//Password to use for SMTP authentication
$mail->Password = '3SYCP5EPUVW5';

$host = "localhost";
$username = "root";
$password = "";
$dbname = "bhero";

// MySQLi 객체 생성 및 연결
$conn = new mysqli($host, $username, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedNames = isset($_POST['selectedNames']) ? $_POST['selectedNames'] : [];
$selectedNames = array_map('intval', $selectedNames);
$placeholders = implode(',', array_fill(0, count($selectedNames), '?'));


if($selectedNames){
    $query = "DELETE FROM `application_state` WHERE `application_state`.`application_id` IN ($placeholders)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param(str_repeat('i', count($selectedNames)), ...$selectedNames);
    $stmt->execute();
    $stmt->close();
}
$conn->close();


exit();

?>
