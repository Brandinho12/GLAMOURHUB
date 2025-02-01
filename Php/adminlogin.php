<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_email = $_POST['admin_email'];
    $password = $_POST['admin_password'];

    // Retrieve user from the users table
   
    $sql = "SELECT  admin_name, admin_password FROM admins WHERE admin_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $admin_email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($admin_email, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            header('Location: ../Admin.php');

                } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this email.";
    }

    $stmt->close();
    $conn->close();
}
?>