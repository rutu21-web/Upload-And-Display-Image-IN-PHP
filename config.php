<?php

$servername="localhost";
$username="root";
$password="";
$dbname="uploadimage";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
 {
     echo "Failed to connect to database ".mysqli_connect_error();
 }

?>