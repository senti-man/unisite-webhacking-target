<?php
// 세션 체크 및 DB 설정 파일 include
include('../check_session.php');
include('../DB_config.php');

// 사용자가 입력한 데이터 가져오기
$title = $_POST["title"];
$password = $_POST["password"];
$content = $_POST["content"];
$today = date("Y-m-d"); // 오늘 날짜 가져오기
$board = $_POST["board"];

// 파일 업로드 처리
$file = $_FILES["file"];
$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
$file_extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

if ($file["error"] == 0) {
    // 파일 확장자 검사
    if (in_array($file_extension, $allowed_extensions)) {
        // 파일 내용 검사
        $file_content = file_get_contents($file["tmp_name"]);
        if (preg_match('/<\?php/', $file_content)) {
            // PHP 코드가 포함된 경우
            echo '<script>alert("파일에 PHP 코드가 포함되어 있어 업로드할 수 없습니다.");history.back();</script>';
            exit;
        } else {
            // 파일 저장
            $file_name = $file["name"];
            $file_tmp = $file["tmp_name"];
            $file_destination = "../uploads/" . $file_name;
            move_uploaded_file($file_tmp, $file_destination);
        }
    } else {
        // 오류 메시지 출력
        echo '<script>alert("이미지 파일만 업로드할 수 있습니다.");history.back();</script>';
        exit;
    }
}

// SQL 쿼리 생성
$insert_query = "INSERT INTO article(board, title, content, file, article_pw, date, email, hit, likes) VALUE";
$insert_query .= "('$board', '$title', '$content', '$file_destination', '$password', '$today', '$email', 0, 0)";

// SQL 쿼리 실행
$result = mysqli_query($conn, $insert_query) or die('ca');

// 성공 메시지 출력 및 메인 게시판 페이지로 이동
echo '<script>alert("success!");location.href="../board/main_board.php";</script>';
?>
