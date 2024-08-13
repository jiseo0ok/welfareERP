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

// POST 데이터 가져오기
$name = $_POST['name'] ?? '';
$resident_registration_number = $_POST['resident_registration_number'] ?? '';
$email = $_POST['email'] ?? '';
$tel = $_POST['tel'] ?? '';
$region = $_POST['region'] ?? '';
$new_filename = ''; // 초기 파일 이름은 빈 문자열로 설정
$policy_id = $_POST['policy_id'] ?? '';
$inserted_id = 0; // 초기화

// 파일이 제출되었는지 확인
if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
    $tmpfile = $_FILES['file']['tmp_name'];
    $o_name = $_FILES['file']['name'];
    $filename = iconv("UTF-8", "EUC-KR", $_FILES['file']['name']);

    // 데이터베이스에 데이터 삽입
    $sql = "INSERT INTO application (policy_id, application_name, application_resident_registration_number, application_email, application_phone, application_document, application_address) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssss", $policy_id, $name, $resident_registration_number, $email, $tel, $o_name, $region);
    $stmt->execute();

    // 삽입된 ID 가져오기
    $inserted_id = $stmt->insert_id;

    // 파일 이름을 기본키 ID와 유니크한 식별자로 변경
    $unique_suffix = substr(uniqid(), 0, 8);  // 8자이내 유니크한 식별자 생성
    $file_extension = pathinfo($o_name, PATHINFO_EXTENSION);
    $new_filename = $inserted_id . '_' . $unique_suffix . '.' . $file_extension;
    $folder = "../file/" . $new_filename;
    move_uploaded_file($tmpfile, $folder);

    // 파일 이름 업데이트
    $update_sql = "UPDATE application SET application_document = ? WHERE application_id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("si", $new_filename, $inserted_id);
    $update_stmt->execute();
} else {
    // 파일이 없을 경우 데이터베이스에 파일 정보 없이 데이터 삽입
    $sql = "INSERT INTO application (policy_id, application_name, application_resident_registration_number, application_email, application_phone, application_address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $policy_id, $name, $resident_registration_number, $email, $tel, $region);
    $stmt->execute();
    $inserted_id = $stmt->insert_id; // 삽입된 ID 가져오기
}
if (isset($_FILES['photo']['tmp_name']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
    $photofile = $_FILES['photo']['tmp_name'];
    $photo_name = $_FILES['photo']['name'];
    $file_extension1 = pathinfo($photo_name, PATHINFO_EXTENSION);
    $unique_id = substr(uniqid(), 0, 8); // 제한된 길이의 유니크 ID 생성
    $new_filename1 = $inserted_id . '_photo_' . $unique_id . '.' . $file_extension1;
    $folder1 = "../file/" . $new_filename1;
    
    // 파일 업로드
    move_uploaded_file($photofile, $folder1);
    
    $photoupdate_sql = "UPDATE application SET photo = ? WHERE application_id = ?";
    $photoupdate_stmt = $conn->prepare($photoupdate_sql);
    $photoupdate_stmt->bind_param("si", $new_filename1, $inserted_id);
    $photoupdate_stmt->execute();
}

// application_state에 데이터 삽입
$application_state = 'ready'; 
$insert_state_sql = "INSERT INTO application_state (application_id, state) VALUES (?, ?)";
$state_stmt = $conn->prepare($insert_state_sql);
$state_stmt->bind_param("is", $inserted_id, $application_state);
$state_stmt->execute();
$state_stmt->close();


$stmt->close();
if (isset($update_stmt)) {
    $update_stmt->close();
}
$conn->close();
// 데이터 처리가 완료되었음을 알리는 팝업을 띄우고, 지원대상 탭이 활성화된 이전 페이지로 리다이렉트
echo "<script>alert('처리가 완료되었습니다.'); window.location.href='../index2.html?policyId=".$policy_id."#support';</script>";
exit();
?>
