<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'connection.php';

// Fetch categories from the database
$query = "SELECT * FROM categories";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/style.css">

    <!-- Inline CSS for styling -->
    <style>
        .role-buttons {
            display: none;
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            padding: 10px;
            right: 0;
            top: 40px;
            z-index: 1000;
        }
        .role-buttons button {
            display: block;
            width: 100%;
            margin-top: 5px;
            padding: 8px;
            border: none;
            background: #b04fb0;
            color: white;
            cursor: pointer;
        }
        .role-buttons button:hover {
            background: #8d3a8d;
        }
        .center-register {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</head>

<body class="home">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" >
                <img src="logo.png" alt="GLAMOURHUB Logo" class="logo">
                <em><p class="tagline">Your Best Beauty Pal</p></em>
            </a>

            <!-- Navbar Toggler for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible Navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link text-white" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="about.html">About Us</a></li>
                    <li class="nav-item position-relative">
                        <button class="nav-link text-white" id="main-regis">Register</button>
                        <div id="rolebuttons" class="role-buttons">
                            <button onclick="window.location.href='login_signup.html'">Register as a User</button>
                            <button onclick="window.location.href='vendor_signup.html'">Register as a Vendor</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Centered Register Button -->
    <div class="center-register">
        <button class="btn btn-primary" onclick="window.location.href='login_signup.html'">Register Here</button>
    </div>

    <!-- Dynamic Categories Section -->
    <div class="container" id="cardId" style="margin-top: 20px;">
        <div class="row mt-4">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-3">
                    <div class="card">
                        <a href="search.html">
                            <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['category_name']); ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['category_name']); ?></h5>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="text-center mt-4 footer fixed-bottom custom-navbar">
        <p>&copy; GLAMOURHUB 2024</p>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle register button dropdown
        document.getElementById('main-regis').addEventListener('click', function(event) {
            event.stopPropagation();
            var rolebuttons = document.getElementById('rolebuttons');
            rolebuttons.style.display = (rolebuttons.style.display === 'block') ? 'none' : 'block';
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            var rolebuttons = document.getElementById('rolebuttons');
            if (rolebuttons.style.display === 'block' && !event.target.closest('#main-regis')) {
                rolebuttons.style.display = 'none';
            }
        });
    </script>
</body>
</html>
