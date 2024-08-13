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

// POST 데이터 가져오기 및 검증
$policyName = $_POST['policyName'] ?? null;
$policyCategory = $_POST['policyCategory'] ?? null;
$policyBenefits = $_POST['policyBenefits'] ?? null;
$policyBenefitsDetail = $_POST['policyBenefitsDetail'] ?? null;
$policyStartline = $_POST['policyStartline'] ?? null;
$policyDeadline = $_POST['policyDeadline'] ?? null;
//$policyAgeRange = $_POST['policyAgeRange'] ?? null;
$policyAge = $_POST['policyAge'] ?? null;
$policyRegion = $_POST['policyRegion'] ?? null;
$policyDetail = $_POST['policyDetail'] ?? null;
$policyAnswer = $_POST['policyAnswer'] ?? null;
$document = $_POST['document'] ?? null;
$new_filename = ''; // 초기 파일 이름은 빈 문자열로 설정
$inserted_id = 0; // 초기 삽입된 ID는 0으로 설정

// 파일 업로드 및 데이터베이스 삽입 처리
if (isset($_FILES['policyFile']['tmp_name']) && is_uploaded_file($_FILES['policyFile']['tmp_name'])) {
    $tmpfile = $_FILES['policyFile']['tmp_name'];
    $o_name = $_FILES['policyFile']['name'];
    $filename = iconv("UTF-8", "EUC-KR", $_FILES['policyFile']['name']);
    
    $sql = "INSERT INTO policy (policy_name, policy_category, policy_benefits,policy_benefits_detail, policy_start_application, policy_end_application, policy_document, policy_phone, policy_explanation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $policyName, $policyCategory, $policyBenefits, $policyBenefitsDetail,$policyStartline, $policyDeadline, $o_name, $policyAnswer, $policyDetail);
    $stmt->execute();
    $inserted_id = $stmt->insert_id;
    
    $unique_suffix = uniqid() . time();
    $new_filename = $inserted_id . '_' . $unique_suffix;
    $folder = "../policy_file/" . $new_filename;
    move_uploaded_file($tmpfile, $folder);

    $update_sql = "UPDATE policy SET policy_document = ? WHERE policy_id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("si", $new_filename, $inserted_id);
    $update_stmt->execute();
} else {
    $sql = "INSERT INTO policy (policy_name, policy_category, policy_benefits,policy_benefits_detail, policy_start_application, policy_end_application, policy_phone, policy_explanation) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $policyName, $policyCategory, $policyBenefits, $policyBenefitsDetail, $policyStartline, $policyDeadline, $policyAnswer, $policyDetail);
    $stmt->execute();
    $inserted_id = $stmt->insert_id;
}


if (!empty($_POST['policyAge'])) {
    $condition_sql = "INSERT INTO policy_condition (policy_id, condition_category, condition_detail) VALUES (?, ?, ?)";
    $condition_stmt = $conn->prepare($condition_sql);
    $condition_category = "연령";
    $condition_detail = $_POST['policyAge'];
    $condition_stmt->bind_param("iss", $inserted_id, $condition_category, $condition_detail);
    $condition_stmt->execute();
    $condition_stmt->close();
}
// 지역 조건 삽입

if (!empty($_POST['policyRegion'])) {
    $region_sql = "INSERT INTO policy_condition (policy_id, condition_category, condition_detail) VALUES (?, ?, ?)";
    $region_stmt = $conn->prepare($region_sql);
    $condition_category = "지역";
    $region_value = $_POST['policyRegion'];
    $region_stmt->bind_param("iss", $inserted_id, $condition_category, $region_value);
    $region_stmt->execute();
    $region_stmt->close();
}
// 필요 문서 조건 삽입
if (!empty($_POST['policyDocument'])) {
    $document_sql = "INSERT INTO policy_condition (policy_id, condition_category, condition_detail) VALUES (?, ?, ?)";
    
        $document_stmt = $conn->prepare($document_sql);
        $condition_category = "필요 문서";
        $document_stmt->bind_param("iss", $inserted_id, $condition_category, $document);
        $document_stmt->execute();
        $document_stmt->close();
}


// Close prepared statements if they exist
if (isset($stmt)) {
    $stmt->close();
}
if (isset($update_stmt)) {
    $update_stmt->close();
}

// Close database connection
$conn->close();

// 데이터 처리 완료 후 리다이렉트
echo "<script>alert('처리가 완료되었습니다.'); window.location.href='../../forms/form_elements.html';</script>";
exit();
?>