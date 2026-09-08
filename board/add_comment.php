<?php 
      include('../check_session.php');
      include('../DB_config.php');

      
      $comment = $_POST['comment'];
      $idx = $_POST['idx'];
      $today = date("Y-m-d");
      
      $insert_query = "INSERT INTO comments(comment, post_id, email, date) VALUE('$comment', '$idx', '$email', '$today')";
      $result = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));
      
      echo "<script>history.back();</script>";
      echo "$idx, $today";
?>