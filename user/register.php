<?php
  include('../DB_config.php');


  $first_name = $_POST['FirstName'];
  $last_name = $_POST['LastName'];
  $email = $_POST['Email'];
  $password = $_POST['Password'];
  $confirm_password = $_POST['Confirm_Password'];
  $nickname = $_POST['Nickname'];
  $address = $_POST['Address'];
  
  $insert_query = "INSERT INTO user(email, pw, nick_name, first_name, last_name, address, confirm) 
  VALUE ('$email', '$password', '$nickname', '$first_name','$last_name', '$address', 0)";
  $result = mysqli_query($conn, $insert_query);
  echo "<script>alert('A verification code has been sent to the email. Please check.')</script>";
  
  echo '<script src="../js/send_mail.js"></script>';
  echo '<input type="hidden" name="Email" id="email2" value="<?php echo $email;?>">';
  echo '<button type="button" onload="sendmail()"></button>';


  mysqli_close($conn);
  echo "<script>location.href='check_code.html'</script>";
?>




