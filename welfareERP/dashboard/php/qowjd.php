<?php
// 데이터베이스 연결 설정
$host = "localhost"; // 데이터베이스 서버 주소
$username = "root"; // 데이터베이스 사용자 이름
$password = ""; // 데이터베이스 비밀번호
$dbname = "bhero"; // 데이터베이스 이름

// MySQLi 객체 생성 및 연결
$conn = new mysqli($host, $username, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// JSON 데이터를 PHP에서 사용할 수 있도록 변환
$data = json_decode(file_get_contents("php://input"), true);

$selectedNames = isset($data['selectedNames']) ? $data['selectedNames'] : [];
$selectedNames = array_map('intval', $selectedNames);
$placeholders = implode(',', array_fill(0, count($selectedNames), '?'));

if (!empty($selectedNames)) {
    // 지역 파라미터 받기
    $welfareName = isset($data['welfareName']) ? $data['welfareName'] : '';

    // Update welfare_worker to welfareName in application_welfare where id matches
    $updateQuery = "UPDATE `application_welfare` SET `user_id` = ? , `welfare_state` = 'yes' WHERE `application_id` IN ($placeholders)";
    $updateStmt = $conn->prepare($updateQuery);
    if ($updateStmt) {
        $updateStmt->bind_param("s" . str_repeat('i', count($selectedNames)), $welfareName, ...$selectedNames);
        $updateStmt->execute();
        $updateStmt->close();
    } else {
        echo "Failed to update welfare worker.";
    }
}
