<?php
include('PHP/connect.php');
session_start();
if(!isset($_SESSION['vendor_id'])){
    echo json_encode(['registered' => false]);
    exit();
}

$vendor_id = $_SESSION['vendor_id'];
$select= "SELECT * FROM vendors WHERE id =?";
$stmt = $conn->prepare($select);
$stmt->bind_param("i", $vendor_id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    echo json_encode(['registered' => true]);
}
else{
   echo json_encode(['registered' => false]);
}
$stmt->close();
$conn->close();
?>