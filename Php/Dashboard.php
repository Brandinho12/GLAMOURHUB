<?php
session_start();
require ('../connection.php'); // This should connect to your MySQL database

// Check if the client is logged in
if (!isset($_SESSION['client_id'])) { // Updated from user_id to client_id
    header("Location: login_signup.php");
    exit();
}

// Fetch the logged-in client's ID
$client_id = $_SESSION['client_id'];

// Fetch the client's profile information
$query = "SELECT full_name FROM clients WHERE client_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $client_id);
$stmt->execute();
$stmt->bind_result($full_name);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Light gray background */
        }
        .card-title {
            font-weight: 700;
        }
        .card-text {
            color: #6c757d; /* Bootstrap's secondary text color */
        }
        .btn-primary {
            background-color: #007bff;
            border: 1px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: scale(1.02);
        }
        .btn-violet {
            background-color: #b04fb0;
            background: linear-gradient(
            to right,
            #b04fb0,
            #4f80b0,
            pink
            );
          }

    .btn-violet:hover {
        background-color: #7A1CC7; /* Darker shade of violet for hover */
        border-color: #7A1CC7;
    }
    .logo{
        border-radius:50%;
    }
    </style>
</head>
<body class="bg-light">

    <!-- Header Section -->
    <header class="btn-violet text-white p-3 mb-4">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light b shadow-sm">
        <div class="container">
            <a href="home.php" class="navbar-brand">
                <img src="../logo.png" alt="GLAMOURHUB Logo" style="height: 90px;" class="logo">
            </a>
            <div class="ml-auto">
                <a href="about.php" class="nav-link">About Us</a>
                <a href="../index.html" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Home
                </a>
            </div>
        </div>
    </nav>
            <h3>Welcome To GLAMOURHUB, <?php echo htmlspecialchars($full_name); ?>!</h3>
            <p>Your Number One Bueaty Pal</p>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row">
            <!-- User Profile Section -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="rounded-circle img-thumbnail" style="width: 100px; height: 100px; line-height: 100px; font-size: 24px; background-color: violet; color: white;">
                            <?php echo substr($full_name, 0, 1); ?>
                        </div>
                        <h4 class="card-title mt-3"><?php echo htmlspecialchars($full_name); ?></h4>
                        <a href="edit.php" class="btn btn-violet btn-sm">Edit Profile</a>
                    </div>
                </div>
            </div>
            
            <!-- Orders Card -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                        <h5 class="card-title">Orders</h5>
                        <p class="card-text">View and manage your orders.</p>
                        <a href="orders.php" class="btn btn-violet">Go to Orders</a>
                    </div>
                </div>
            </div>

            <!-- Notifications Card -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-bell fa-3x mb-3"></i>
                        <h5 class="card-title">Notifications</h5>
                        <p class="card-text">Stay updated with notifications.</p>
                        <a href="notifications.php" class="btn btn-violet">Go to Notifications</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Logout Section -->
        <div class="row mt-4">
            <div class="col-md-4 mx-auto">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-sign-out-alt fa-3x mb-3"></i>
                        <h5 class="card-title">Logout</h5>
                        <p class="card-text">Sign out of your account.</p>
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>

