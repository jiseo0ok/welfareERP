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

// 쿼리 실행
$sql = "SELECT * FROM application"; // your_table_name은 데이터를 가져올 테이블 이름
$result = $conn->query($sql);


    // 데이터베이스에서 가져온 데이터를 행으로 출력
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='chkRow'></td>";
            echo "<td>" . htmlspecialchars($row['application_id']) . "</td>"; // 'name'은 열 이름
            echo "<td>" . htmlspecialchars($row['policy_id']) . "</td>"; // 'policy_name'은 열 이름
            echo "<td>" . htmlspecialchars($row['application_name']) . "</td>"; // 'registration_number'은 열 이름
            echo "<td>" . htmlspecialchars($row['application_email']) . "</td>"; // 'email'은 열 이름
            echo "<td>" . htmlspecialchars($row['application_phone']) . "</td>"; // 'phone_number'은 열 이름
            echo "<td>" . htmlspecialchars($row['application_document']) . "</td>"; // 'documents'은 열 이름
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No data found</td></tr>";
    }

    ?>
