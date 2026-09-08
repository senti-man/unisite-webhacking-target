<?php
    include('../DB_config.php');

    $id = $_GET['userid'];    
    $first = $_GET['first'];    
    $last = $_GET['last'];    

    $sql = "SELECT email FROM user WHERE email='$id' AND first_name='$first' AND last_name='$last'";
    $result = mysqli_query($conn, $sql) or die ("can't");
    $row = mysqli_fetch_array($result);
 
    if($row){
        echo "O";
    }
    else{
        echo "X";
    }

?>