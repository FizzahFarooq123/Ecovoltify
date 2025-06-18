<?php
     $db_host = "localhost";
     $db_username = "root";
     $db_password = "";
     $db_name = "EcoVoltify2";
 
     // create connection
     $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
      //if($conn){echo "success";}
     if(!$conn)
     {
        die("Failed to connect");
     }
?>