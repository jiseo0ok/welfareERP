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

if (!empty($selectedNames)) {
    $query = "SELECT * FROM application as a, policy as p WHERE a.application_id IN ($placeholders) and a.policy_id = p.policy_id";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param(str_repeat('i', count($selectedNames)), ...$selectedNames);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mail->setFrom('sinship@naver.com', '빵빵이');
                $mail->addReplyTo('sinship@naver.com', '빵빵이');
                $mail->addAddress($row['application_email'], $row['application_name']);
                $mail->CharSet = 'UTF-8';
                $mail->Subject = "빵빵이 알림 : ".$row['policy_name']." 정책 심사 결과 ";
                $mail->msgHTML($row['application_name']." 귀하께서는 아쉽게도 ".$row['policy_name']." 정책이 반려되었습니다.
                <br>
                삭제 이유 : ".$reason."
                <br>
                자세한 사항은 bighero.iptime.org를 검색해주세요");
                if(isset($row['application_document'])){
                    $mail->addAttachment('../file/'.$row['application_document']);
                }else{
                    $mail->addAttachment('file/logo.png');
                }
                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message sent!';
                }
            }
        } else {
           
        }
        $stmt->close();
    } else {
       
    }
} else {
   
}

// 입력 데이터 처리 및 삭제
// if (!empty($selectedNames)) {
//     $query = "DELETE FROM `application` WHERE `application`.`application_id` IN ($placeholders)";
//     $stmt = $conn->prepare($query);
//     $stmt->bind_param(str_repeat('i', count($selectedNames)), ...$selectedNames);
//     $stmt->execute();
//     $stmt->close();
// }
if($selectedNames){
    $query = "UPDATE `application_state` SET `state` = 'no' WHERE `application_state`.`application_id` IN ($placeholders)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param(str_repeat('i', count($selectedNames)), ...$selectedNames);
    $stmt->execute();
    $stmt->close();
}

$conn->close();


exit();

?>
