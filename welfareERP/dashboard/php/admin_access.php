<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bhero";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

$adminPassword = $_POST['adminPassword'];

// Prepared statement 사용
$stmt = $conn->prepare("SELECT user_name FROM bhero_user WHERE user_pw = ? AND user_role = 'admin'");
$stmt->bind_param("s", $adminPassword);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['status' => 'success', 'userName' => $row['user_name']]);
} else {
    echo json_encode(['status' => 'failed']);
}

$stmt->close();
$conn->close();
?>


