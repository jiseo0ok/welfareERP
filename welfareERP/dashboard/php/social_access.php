<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bhero";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

$socialPassword = $_POST['socialPassword'];

// Prepared statement 사용
$stmt = $conn->prepare("SELECT user_name,user_id FROM bhero_user WHERE user_pw = ? AND user_role = 'social'");
$stmt->bind_param("s", $socialPassword);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['status' => 'success', 'userName' => $row['user_name'],'userId' => $row['user_id']]);
} else {
    echo json_encode(['status' => 'failed']);
}

$stmt->close();
$conn->close();
?>


