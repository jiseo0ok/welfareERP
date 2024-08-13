<?php
// 데이터베이스 연결 설정
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bhero";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

$sql = "SELECT * FROM bhero_user WHERE user_role = 'social'"; // 'bhero_user'는 사용자 데이터를 포함하는 테이블 이름입니다.
$result = $conn->query($sql);

header('Content-Type: application/json');
if ($result->num_rows > 0) {
    $users = array();
    while($row = $result->fetch_assoc()) {
        // 'name' 대신 실제 사용자 이름을 포함하는 컬럼 이름을 사용하세요.
        $users[] = array('user_name' => $row["user_name"]); // 예를 들어, 컬럼 이름이 'user_name'이라고 가정
    }
    echo json_encode($users);
} else {
    echo json_encode(array('error' => '사용자 데이터가 없습니다.'));
}

?>
