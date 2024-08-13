<?php

// 데이터베이스 연결 설정
$servername = "localhost";
$username = "root";
$password = ""; // 비밀번호가 수정되었습니다.
$dbname = "bhero";
// 데이터베이스 연결 설정

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

// POST 데이터 받기
$region = $_POST['region'];
$wjdcordate = $_POST['wjdcordate'];
$benefit = $_POST['benefit'];
$ageRanges = $_POST['age'] ?? [];
$policy_type = $_POST['policy_type'] ?? [];

// SQL 쿼리 생성
$sql = "SELECT DISTINCT p.policy_id, p.policy_name, p.policy_explanation FROM policy p 
JOIN policy_condition pc ON p.policy_id = pc.policy_id WHERE p.policy_start_application <= ? AND p.policy_end_application >= ?";
$params = [$wjdcordate, $wjdcordate];
$types = "ss";

if (!empty($region)) {
    $sql .= " AND pc.condition_category = '지역' AND pc.condition_detail = ?";
    $params[] = $region;
    $types .= "s";
}

if ($benefit !== "무관") {
    $sql .= " AND p.policy_benefits = ?";
    $params[] = $benefit;
    $types .= "s";
}
if (!empty($policy_type) && !in_array("무관", $policy_type)) {
    $policy_typePlaceholders = implode(',', array_fill(0, count($policy_type), '?'));
    $sql .= " AND p.policy_category IN ($policy_typePlaceholders)";
    array_push($params, ...$policy_type);
    $types .= str_repeat('s', count($policy_type));
}

if (!empty($ageRanges) && !in_array("전연령", $ageRanges)) {
    $ageRangePlaceholders = implode(',', array_fill(0, count($ageRanges), '?'));
    $sql .= " AND pc.condition_category = '연령' AND pc.condition_detail IN ($ageRangePlaceholders)";
    array_push($params, ...$ageRanges);
    $types .= str_repeat('s', count($ageRanges));
}

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    echo "SQL 문제 발생: " . $conn->error;
}
// 결과를 HTML로 출력



if ($result->num_rows > 0) {
    echo "<div class='container'><div class='row'>";
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-sm-6">';
        echo '<div class="card">';
        echo '<div class="card-header text-center">';
        echo "<h5 class='card-title'>" . $row['policy_name'] . "</h5>";
        
        echo '</div>';
        echo '<div class="card-body ">';
        echo "<p class='card-text'>" . $row['policy_explanation'] . "</p>";
        echo '</div>';

        echo '<div class="row text-center">';
        echo '<div class="d-grid gap-2 mt-2">';
       // 버튼에 data-policy-id 속성 추가
       echo '<button class="btn btn-dark btn-sm m-3" type="button" onclick="openPopup(' . $row['policy_id'] . ')">상세보기</button>';
       echo '</div>';
        echo '</div>';

        echo '</div>';
        echo '</div>';
    }
    echo "</div></div>";
} else {
    echo "결과가 없습니다.";
}
$conn->close();
?>