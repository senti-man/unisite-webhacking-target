<?php
  include('DB_config.php');
// Function to send an email with a confirmation link
  $email = $_POST['email'];
  $confirm_code = uniqid();
  $subject = "Email Confirmation";
  $message = "Please click the following link to confirm your email: ";
  $message .= "$confirm_code";
  $headers = 'From: webmaster<Unisite_Board@gmail.com>\r\n';
  
  // Send the email
  $result = mail($email, $subject, $message, $headers);
  $insert_code = "INSERT INTO confirmation_code(code, email) VALUES ('$confirm_code', '$email')";
  $result = mysqli_query($conn, $insert_code);
  if($result){
    echo "O";
  }
  else{
    echo "X";
  }
?>
