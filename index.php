<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'connection.php';

// Fetch categories from the database
$query = "SELECT category_name, image_path FROM categories";
$result = $conn->query($query);

$categories = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLAMOURHUB</title>
    <style>
        /* General styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1e1e1e;
            color: white;
            transition: background 0.5s ease, color 0.5s ease;
        }

        /* Navbar */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: #fceded;
            padding: 10px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background 0.5s ease;
        }

        .navbar img {
            width: 80px;
            border-radius: 50%;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a, .register-btn {
            color: black;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .nav-links a:hover, .register-btn:hover {
            color: #ff69b4;
            transform: scale(1.1);
        }

        .register-btn {
            background-color: #ff69b4;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
        }

        /* Mobile Menu */
        .mobile-menu {
            display: none;
            flex-direction: column;
            background: #fceded;
            position: absolute;
            top: 60px;
            right: 10px;
            width: 200px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .mobile-menu a {
            padding: 10px;
            text-align: center;
            color: black;
            font-weight: bold;
            text-decoration: none;
            display: block;
        }

        .menu-icon {
            display: none;
            font-size: 24px;
            cursor: pointer;
        }

        /* Dark Mode Styles */
        .dark-mode {
            background-color: #121212;
            color: white;
        }

        .dark-mode .navbar {
            background-color: #333;
        }

        .dark-mode .mobile-menu {
            background-color: #333;
        }

        .dark-mode .nav-links a, .dark-mode .register-btn {
            color: white;
        }

        /* Category Section */
        .category-container {
            display: flex;
            overflow-x: auto;
            padding: 20px;
            gap: 20px;
            background-color: white;
        }

        .category-card {
            min-width: 250px;
            background-color: #3a3a3a;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1s ease-in-out forwards;
        }

        .category-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Dark Mode Button */
        .dark-mode-btn {
            cursor: pointer;
            padding: 10px 15px;
            background: #ff69b4;
            border: none;
            color: white;
            border-radius: 20px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .dark-mode-btn:hover {
            background: #ff1493;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .menu-icon {
                display: block;
            }

            .category-container {
                flex-direction: column;
                align-items: center;
            }

            .category-card {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <img src="logo.png" alt="GLAMOURHUB Logo">
        
        <nav class="nav-links">
            <a href="#">Home</a>
            <a href="#">About Us</a>
            <a href="#">Services</a>
        </nav>

        <button class="dark-mode-btn" onclick="toggleDarkMode()">🌙 Dark Mode</button>

        <a href="#" class="register-btn">Register</a>

        <!-- Mobile Menu Icon -->
        <span class="menu-icon" onclick="toggleMenu()">☰</span>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="#">Home</a>
        <a href="#">About Us</a>
        <a href="#">Services</a>
        <a href="#" class="register-btn">Register</a>
    </div>

    <!-- Main Content -->
    <div style="background: url('back.webp') no-repeat center center; background-size: cover; padding: 70px 40px; text-align: center;">
        <h1 style="font-size: 48px; color: #ff69b4;">YOUR BEST BEAUTY PAL</h1>
        <p style="font-size: 16px; color: #ccc;">Find and book beauty services with ease.</p>
    </div>

    <!-- Scrollable Categories -->
    <div class="category-container">
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <div class="category-card">
                    <img src="<?php echo htmlspecialchars($category['image_path']); ?>" alt="<?php echo htmlspecialchars($category['category_name']); ?>">
                    <h2 style="margin: 10px 0; color: white;"><?php echo htmlspecialchars($category['category_name']); ?></h2>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="color: #ccc;">No categories found.</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer style="text-align: center; padding: 20px; background-color: #2c2c2c; color: #ccc;">
        &copy; <?php echo date("Y"); ?> GLAMOURHUB. All rights reserved.
    </footer>

    <script>
        // Toggle Mobile Menu
        function toggleMenu() {
            var menu = document.getElementById("mobileMenu");
            menu.style.display = menu.style.display === "flex" ? "none" : "flex";
        }

        // Toggle Dark Mode
        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");
            localStorage.setItem("darkMode", document.body.classList.contains("dark-mode"));
        }

        // Check Dark Mode on Page Load
        window.onload = function() {
            if (localStorage.getItem("darkMode") === "true") {
                document.body.classList.add("dark-mode");
            }
        };
    </script>

</body>
