<?php
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include('../connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $admin_name= $_POST['admin_name'];
    $admin_email= $_POST['admin_email'];
    $Password = Password_hash($_POST['admin_password'], PASSWORD_BCRYPT); 

    $sql = "INSERT INTO admins(admin_name, admin_email, admin_password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $admin_name, $admin_email, $Password);
    if ($stmt->execute()) {

        echo "<script>alert('Registration validated! Welcome, $admin_name')</script>";
        header('Location: ../Admin.php');
        exit();
    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();


}

?>