<?php 
include('../connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    $target_dir = "../Uploads/";
    if(!is_dir($target_dir)){
        mkdir($target_dir, 0777, true);
    }
    $target_file =  $target_dir . basename($_FILES['profile_image']['name']);
    $check = getimagesize($_FILES['profile_image']['tmp_name']);

    if($check !== false){
       $imagefiletype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
       $allowed_types = ["jpg", "png", "jpeg", "gif"];
       if(!in_array($imagefiletype, $allowed_types)){
        echo "Sorry, only JPG,JPEG, PNG, and GIF files are allowed.";
        exit;
       }
       if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)){
        echo "<script>alert('The file ". htmlspecialchars(basename($_FILES['profile_image']['name'])). "has been uploaded.')</script>";
        header("Location: ../profile.php");
        exit();
       }else{
        echo "Sorry, there was an error uploading your file.";
       }
    }else{
        echo "File is not an image.";
    }
}


?>

