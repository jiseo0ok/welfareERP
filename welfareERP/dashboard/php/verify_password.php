<?php
session_start();

// 비밀번호 검증 로직 (예시)
$correctPassword = '123'; // 실제 구현에서는 데이터베이스에서 가져온 값을 사용
$userPassword = $_POST['password'];

if ($userPassword === $correctPassword) {
    // 비밀번호가 맞으면 쿠키 설정
    setcookie('userAuthenticated', 'true', time() + 1800, '/'); // 30분 동안 유효
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>