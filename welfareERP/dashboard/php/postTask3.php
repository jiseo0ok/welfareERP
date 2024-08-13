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
$task_id = $_GET['task_id'];
// 입력값 검증

// 쿼리 실행
$sqlDelete = "DELETE FROM tasks WHERE id = ?";

$stmt = $conn->prepare($sqlDelete);
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

// 파라미터 바인딩
$stmt->bind_param("i", $task_id);

if ($stmt->execute()) {
    echo "Task deleted successfully";
} else {
    echo "Error: " . $stmt->error;
}
