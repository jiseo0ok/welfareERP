
<?php
$region = $_POST['region'];
// 데이터베이스 연결 설정
$servername = "localhost";
$username = "hero";
$password = "hero";
$dbname = "welfare";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

// qhrwlrjator 테이블에서 qhrwldlfma, tjqltmsodyd 선택, region1 조건 사용
$sql = "SELECT qhrwldlfma, tjqltmsodyd FROM qhrwlrjator";
$result = $conn->query($sql);

// 결과를 HTML로 출력
if ($result->num_rows > 0) {
    echo "<div class='container'><div class='row'>";
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-sm-6">';
        echo '<div class="card">';
        echo '<div class="card-header text-center">';
        echo "<h5 class='card-title'>" . $row['qhrwldlfma'] . "</h5>";
        echo "<p>" . $region . "</p>";
        echo '</div>';
        echo '<div class="card-body ">';
        echo "<p class='card-text'>" . $row['tjqltmsodyd'] . "</p>";
        echo '</div>';

        echo '<div class="row text-center">';
        echo '<div class="d-grid gap-2 mt-2">';
        echo '<button class="btn btn-dark btn-sm m-3" type="button" onclick="openPopup()">상세보기</button>';
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


