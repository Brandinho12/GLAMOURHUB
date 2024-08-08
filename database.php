<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "myproject2";

$conn = new mysqli($hostName, $userName, $password, $databaseName);

//check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>