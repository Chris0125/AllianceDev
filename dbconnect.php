<?php
//php file to connect to the database

  $DB_host = "localhost";
  $DB_user = "alliance";
  $DB_pass = "alliance";
  $DB_name = "alliance";
  
  $conn = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
    
     if($conn->connect_errno)
     {
         die("ERROR : -> ".$conn->connect_error);
     }

?>