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

// 지역 및 복지 이름 파라미터 받기
$region = isset($_GET['region']) ? $_GET['region'] : '서울특별시';

// 쿼리 조건 설정
$conditions = "aw.welfare_state = 'no'";
if ($region != '전국') {
    $conditions .= " AND asp.application_address = ?";
}


// 쿼리 실행
$sql = "SELECT asp.application_id, asp.application_name, asp.policy_benefits_detail, asp.application_address, asp.application_success_datetime, aw.welfare_name, a.photo
FROM application_success_people asp JOIN application_welfare aw
  ON asp.application_id = aw.application_id
  JOIN application a ON asp.application_id = a.application_id
WHERE $conditions ORDER BY asp.application_success_datetime DESC";

$stmt = $conn->prepare($sql);

// 파라미터 바인딩
$params = [];
if ($region != '전국') {
    $params[] = $region;
}

$types = str_repeat("s", count($params));
$stmt->bind_param($types, ...$params);

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
