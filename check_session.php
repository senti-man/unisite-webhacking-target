<?php

session_start();
$email = $_SESSION['email'];
// Check if the session ID and encrypted user ID are both set
if (!isset($_SESSION['SESSION_ID'])) {
  // Check if the encrypted session ID matches the expected value
  if ($_COOKIE['SESSION_ID'] === md5(session_id() . $_SESSION['email'])) {
    // The session is authenticated
    
    return true;  

  } else {
    // The encrypted session ID does not match the expected value
    echo "<script>alert('You must login first.');</script>";
    echo "<script>location.href='../user/login.html';</script>";
    return false;
  }
} else {
    echo "<script>alert('You must login first.');</script>";
    echo "<script>location.href='../user/login.html';</script>";
  // The session ID and/or encrypted user ID are not set
  return false;
}

?>