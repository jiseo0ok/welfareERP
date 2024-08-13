<?php
// 데이터베이스 연결 설정
$host = "localhost"; // 데이터베이스 서버 주소
$username = "root"; // 데이터베이스 사용자 이름
$password = ""; // 데이터베이스 비밀번호
$dbname = "bhero"; // 데이터베이스 이름

// MySQLi 객체 생성 및 연결
$conn = new mysqli($host, $username, $password, $dbname);

// 데이터베이스 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// POST 데이터 가져오기
$region = $_POST['region-select'];
$adjustFunds = $_POST['adjust-funds'];

// 지역별 총 지원금 업데이트
$sql = "UPDATE `region_cash` SET `region_total_cash` = `region_total_cash` + ? WHERE `region_cash`.`region` = ? AND (`region_cash`.`region_id` = 18 OR `region_total_cash` >= ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isi", $adjustFunds, $region, $adjustFunds);
$stmt->execute();

if ($stmt->error) {
    echo "sql 실패 " . $stmt->error;
} else {
    echo "Record updated successfully";
}

// Additional SQL update statement as requested
$sql2 = "UPDATE `region_cash` SET `region_total_cash` = `region_total_cash` - ? WHERE `region_cash`.`region_id` = 18 AND `region_total_cash` >= ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("ii", $adjustFunds, $adjustFunds);
$stmt2->execute();

if ($stmt2->error) {
    echo "Error updating second record: " . $stmt2->error;
} else {
    echo "Second record updated successfully";
}

$stmt->close();
$stmt2->close();
$conn->close();

// Redirect to a new page after operations
header("Location: ../../forms/form2_datepicker.html");
exit();

