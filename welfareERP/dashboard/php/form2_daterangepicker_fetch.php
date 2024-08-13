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

// 지역 파라미터 받기
$region = isset($_GET['region']) ? $_GET['region'] : '서울특별시';

if ($region == '전국') {
    // 쿼리 실행 for 전국
    
} else {
    // 쿼리 실행 for specific region
    $sql = "SELECT user_id,user_name FROM bhero_user WHERE user_address = ? and user_role='social'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $region);
}

$stmt->execute();
$result = $stmt->get_result();

// 데이터를 JSON 형식으로 변환
if ($result->num_rows > 0) {
    $data = array();
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(array());
}
