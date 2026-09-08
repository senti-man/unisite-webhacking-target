<?php
    $conn = mysqli_connect("localhost", "root", "root", "web") or die ("Can't access DB");
    return $conn;
?>