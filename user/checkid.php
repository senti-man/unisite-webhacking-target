<?php
    include('../DB_config.php');

    $id = $_GET['userid'];
    $sql = "SELECT email FROM user WHERE email='$id'";
    $result = mysqli_query($conn, $sql) or die ("can't");
    $row = mysqli_fetch_array($result);
 
    if($row){
        echo "X";
    }
    else{
        echo "O";
    }

?>