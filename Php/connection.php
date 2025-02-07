<?php
$servername="localhost";
$username="root";
$password="";
$dbname="glamourhub";
//creating connection
$conn= new mysqli($servername,$username,$password,$dbname);
//checking connection
if ($conn->connect_error){
    die("connection failed: ". $conn->connect_error);

}

?>