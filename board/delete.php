<?php 
    include('../check_session.php');
    include('../DB_config.php');

    if(isset($_GET['idx'])){
        $idx = $_GET['idx'];
    }

    # 접근 제어
    if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == 'http://localhost/test2/board/read.php?idx='.$idx){
        $check_query = "SET foreign_key_checks = ";
        mysqli_query($conn, $check_query.'0');

        $delete_query = "DELETE FROM article WHERE idx='$idx'";
        $result = mysqli_query($conn, $delete_query) or die('!!!!!!');
        if($result){
            echo "<script>alert('게시글이 삭제되었습니다.');location.href='main_board.php';</script>";
        }
        mysqli_query($conn, $check_query.'1');
    }
?>
