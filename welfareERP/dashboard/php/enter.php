<?php

include "PHPMailer.php";
include "SMTP.php";

//Create a new PHPMailer instance
$mail = new PHPMailer();

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
                $mail->msgHTML($row['application_name']." 귀하께서는  ".$row['policy_name']." 정책이 신청되었습니다.<br> 자세한 사항은 bighero.iptime.org를 검색해주세요");
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
            echo "No records found.";
        }
        $stmt->close();
    } else {
        echo "Failed to prepare the SQL statement.";
    }
} else {
    echo "No names selected.";
}

if($selectedNames){
    $query = "UPDATE `application_state` SET `state` = 'yes' WHERE `application_state`.`application_id` IN ($placeholders)";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param(str_repeat('i', count($selectedNames)), ...$selectedNames);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Failed to update application state.";
    }
}
if($selectedNames){
    $query = "INSERT INTO `application_success_people` (`application_id`, `application_name`, `application_resident_registration_number`, `application_email`, `application_phone`, `application_address`, `policy_benefits`, `policy_benefits_detail`) 
    SELECT a.`application_id`, a.`application_name`, a.`application_resident_registration_number`, a.`application_email`, a.`application_phone`, a.`application_address`, p.`policy_benefits`, p.`policy_benefits_detail` 
    FROM `application` a JOIN `policy` p ON a.`policy_id` = p.`policy_id` WHERE a.`application_id` IN ($placeholders)";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param(str_repeat('i', count($selectedNames)), ...$selectedNames);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Failed to insert into application success people.";
    }

    // Update region_cash table based on policy_benefits
    $updateQuery = "UPDATE `region_cash` rc JOIN `application_success_people` asp ON rc.`region` = asp.`application_address`
    SET 
    rc.`region_allow_cash` = rc.`region_allow_cash` + asp.`policy_benefits_detail`,
    rc.`region_total_cash` = rc.`region_total_cash` - asp.`policy_benefits_detail`
    WHERE asp.`application_id` IN ($placeholders)";
    $updateStmt = $conn->prepare($updateQuery);
    if ($updateStmt) {
        $updateStmt->bind_param(str_repeat('i', count($selectedNames)), ...$selectedNames);
        $updateStmt->execute();
        $updateStmt->close();
    } else {
        echo "Failed to update region cash.";
    }
// Inserting application welfare details into the database
    
        $benefitsQuery = "SELECT `policy_benefits` FROM `application_success_people` WHERE `application_id` IN ($placeholders)";
        $benefitsStmt = $conn->prepare($benefitsQuery);
        if ($benefitsStmt) {
            $benefitsStmt->bind_param(str_repeat('i', count($selectedNames)), ...$selectedNames);
            $benefitsStmt->execute();
            $benefitsResult = $benefitsStmt->get_result();
            $isWelfareWorker = false;
            while ($row = $benefitsResult->fetch_assoc()) {
                if ($row['policy_benefits'] === '복지사') {
                    $isWelfareWorker = true;
                    break;
                }
            }
            $benefitsStmt->close();

            if ($isWelfareWorker) {
                $insertWelfareQuery = "INSERT INTO `application_welfare` (`application_id`,  `welfare_region`, `welfare_name`, `welfare_state`) 
    SELECT a.`application_id`, asp.`application_address`, p.`policy_name`, 'no' 
    FROM `application` a 
    JOIN `policy` p ON a.`policy_id` = p.`policy_id`
    JOIN `application_success_people` asp ON a.`application_id` = asp.`application_id`
    WHERE a.`application_id` IN ($placeholders) AND p.`policy_benefits` = '복지사'";
    $insertWelfareStmt = $conn->prepare($insertWelfareQuery);
    if ($insertWelfareStmt) {
        $insertWelfareStmt->bind_param(str_repeat('i', count($selectedNames)), ...$selectedNames);
        $insertWelfareStmt->execute();
        $insertWelfareStmt->close();
    } else {
            echo "Failed to insert into application welfare.";
        }
            }
        } 
    

    

}


$conn->close();

exit();

?>
