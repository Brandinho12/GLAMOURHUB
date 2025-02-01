<?php
session_start();
require ('../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action === 'login') {
        // Login process
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT client_id, full_name, password FROM clients WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($client_id, $full_name, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['client_id'] = $client_id;
                $_SESSION['full_name'] = $full_name;
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: login_signup.html?error=Incorrect%20password");
                exit();
            }
        } else {
            header("Location: login_signup.html?error=Client%20not%20found");
            exit();
        }

        $stmt->close();
    } elseif ($action === 'signup') {
        // Signup process
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO clients (full_name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $full_name, $email, $password);

        if ($stmt->execute()) {
            $client_id = $stmt->insert_id;
            $_SESSION['client_id'] = $client_id;
            $_SESSION['full_name'] = $full_name;
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: login_signup.html?error=Signup%20failed");
            exit();
        }

        $stmt->close();
    }
}

$conn->close();
?>
