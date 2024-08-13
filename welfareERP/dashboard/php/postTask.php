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

// 입력값 검증
$userId = isset($_POST['userId']) ? $_POST['userId'] : null;
$applicationId = isset($_POST['applicationId']) ? $_POST['applicationId'] : null;
$taskDescription = isset($_POST['taskDescription']) ? $_POST['taskDescription'] : null;
$taskDate = isset($_POST['date']) ? $_POST['date'] : die("Error: Date parameter is missing in the POST data."); // POST에서 date 파라미터 가져오기, 없으면 에러 발생
if (!$userId || !$taskDescription || !$applicationId || !$taskDate) {
    die("Error: Missing data.");
}

// 쿼리 실행
$sqlInsert = "INSERT INTO tasks (user_id, application_id, date, description) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sqlInsert);
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

// 파라미터 바인딩
$stmt->bind_param("iiss", $userId, $applicationId, $taskDate, $taskDescription);

if ($stmt->execute()) {
    echo "New task added successfully";
} else {
    echo "Error: " . $stmt->error;
}

