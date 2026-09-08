<?php
    
    session_start();

    // Unset the SESSION_ID session variable
    unset($_SESSION['SESSION_ID']);

    // Destroy the session
    session_destroy();

    // Delete the session ID cookie
    setcookie("SESSION_ID", "", time() - (86400 * 30), "/");

    // Redirect the user to the login page
    header("Location: ../index.html");
    exit;
?>