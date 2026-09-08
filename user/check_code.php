<?php
  include('../DB_config.php');
  $code = $_POST['code'];

  $select_query = "SELECT * FROM confirmation_code WHERE code='$code'";
  $select_result = mysqli_query($conn, $select_query);
  $row = mysqli_fetch_assoc($select_result);
  $code_db = $row['code'];
  $email = $row['email'];
  if($code == $code_db){
    
    $delete_query = "DELETE FROM confirmation_code WHERE code='$code'";
    $delete_result = mysqli_query($conn, $delete_query);

    $update_query = "UPDATE user SET confirm = 1 WHERE email = '$email'";
    $update_result = mysqli_query($conn, $update_query) or die("Can't"); 
    echo "<script>alert('You have successfully authenticated.');location.href='../board/main_board.php';</script>";
  }

  else{
    echo "<script>alert('The verification code is different.');history.back();</script>";
  }

  mysqli_close($conn);
?>