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
$userId = $_POST['userId'];

   // 쿼리 실행 for 전국
$sql = "SELECT * FROM bhero_user WHERE user_id = '$userId' and user_role = 'social'";
$stmt = $conn->prepare($sql);

$stmt->execute();
$result = $stmt->get_result();

// 데이터를 JSON 형식으로 변환
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row); // 단일 객체 반환
} else {
    echo json_encode(array()); // 빈 객체 반환
}
