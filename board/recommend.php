<?php
    include_once('../check_session.php');
    include('../DB_config.php');

    
    $recommend_idx = $_POST['recommend_idx'];
    if(isset($recommend_idx)){
        
        //추천 중복 방지
        $select_query = "SELECT * FROM recommend WHERE post_id = '$recommend_idx' AND email = '$email'";
        $select_result = mysqli_query($conn, $select_query);
        $row = mysqli_fetch_array($select_result);

        if($row['likes'] == 1){
            // 게시글 추천 수 늘리기
            $update_query = "UPDATE article SET likes = likes + 1 WHERE idx = $recommend_idx";
            $result = mysqli_query($conn, $update_query);
            
            $update_query = "UPDATE recommend SET likes = likes + 1 WHERE post_id = $recommend_idx";
            $result = mysqli_query($conn, $update_query);
            }
        else if($row['likes'] == 2){
            $update_query = "UPDATE article SET likes = likes - 1 WHERE idx = $recommend_idx";
            $result = mysqli_query($conn, $update_query);
    #
            $update_query = "UPDATE recommend SET likes = likes - 1 WHERE post_id = $recommend_idx";
            $result = mysqli_query($conn, $update_query);
            }
        
        else{
            $insert_query = "INSERT INTO recommend(post_id, email, likes)"; 
            $insert_query .= "VALUE ('$recommend_idx', '$email', 2)";
            mysqli_query($conn, $insert_query);

            // 게시글 추천 수 늘리기
            $update_query = "UPDATE article SET likes = likes + 1 WHERE idx = $recommend_idx";
            $result = mysqli_query($conn, $update_query);
        }
        
        

        echo "<script>history.back();</script>";
    }

?>