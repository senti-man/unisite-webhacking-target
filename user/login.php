<?php

session_start();
  include('../mail.php');

  function login($username, $password) {
    $conn = mysqli_connect("localhost", "root", "root", "web") or die ("Can't access DB");
    // Connect to the database and retrieve the user information
    $query = "SELECT * FROM user WHERE email = '$username'";
    $result = mysqli_query($conn, $query) or die('cantttt'); 
    $user = mysqli_fetch_assoc($result);

    // Check if the provided password matches the stored password
    if ($user['pw'] == $password) {
      // Store the user ID in the session
      if($user['confirm'] == 0){
        $_SESSION['email'] = $user['email'];
        // Encrypt the session ID with the user ID as an MD5 hash and store it in a cookie
        setcookie("SESSION_ID", md5(session_id() . $user['email']), time() + (86400 * 30), "/");
        echo '<script>location.href="../board/main_board.php?email"</script>';
        return true;  
      }    
      else{
        $email = $user['email'];
        $confirm_code = uniqid();  
        send_confirmation_email($email, $confirm_code);
        $insert_code = "INSERT INTO confirmation_code(code, email) VALUES ('$confirm_code', '$email')";
        mysqli_query($conn, $insert_code);
        echo "<script>alert('Please verify your email.');location.href='check_code.html';</script>";
        return false;
      }
    }
    echo "<script>alert('Invalid ID or password.');</script>";
    echo "<script>history.back();</script>";

    return false;
  }

    $ID = $_POST['email'];
    $PW = $_POST['password'];
    login($ID, $PW);
  ?>
