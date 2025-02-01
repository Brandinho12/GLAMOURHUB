<?php
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require('../connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $company_name= $_POST['company_name'];
    $company_email= $_POST['company_email'];
    $category = $_POST['category'];
    $phone_number= $_POST['phone_number'];
    $Password = Password_hash($_POST['company_password'], PASSWORD_BCRYPT); 
    $location = $_POST['company_location'];

    $sql = "INSERT INTO vendors(company_name, company_email, categories, phone_number, password, location) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $company_name, $company_email, $category, $phone_number, $Password, $location);
    if ($stmt->execute()) {

        echo "<script>alert('Registration validated! Welcome, $company_name')</script>";
        header('Location:dashboardvendors.php');
        exit();
    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();


}

?>