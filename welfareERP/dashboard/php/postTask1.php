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

// Get the date from the query string
$date = $_POST['date'];
$userId = $_POST['userId'];

// Prepare SQL statement to prevent SQL injection
$stmt = $conn->prepare("SELECT a.photo, a.application_name,t.id, t.description FROM application a, tasks t WHERE a.application_id = t.application_id AND t.date = ? AND t.user_id = ?");
$stmt->bind_param("ss", $date, $userId);
$stmt->execute();
$result = $stmt->get_result();

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = [
        'photoUrl' => "http://bighero.iptime.org/dashboard/file/" . $row['photo'],
        'applicationName' => $row['application_name'],
        'description' => $row['description'],
        'task_id' => $row['id']
    ];
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Return the task details as JSON
header('Content-Type: application/json');
echo json_encode(array('tasks' => $tasks));
?>

