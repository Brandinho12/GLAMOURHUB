<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_email = $_POST['company_email'];
    $password = $_POST['company_password'];

    // Retrieve user from the users table
  
    $stmt->bind_param("s", $company_email);
    $stmt->execute();
    $sql = "SELECT * FROM vendors WHERE company_email = $company_email";
    $stmt = $conn->prepare($sql);
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result( $company_email, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            echo "Login validated! Welcome " . $company_name;
            header('Location: Php/dashboardvendors.php');
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