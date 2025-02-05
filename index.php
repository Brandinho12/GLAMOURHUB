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
</head>
<body style="margin: 0; font-family: Arial, sans-serif; background-color: #1e1e1e; color: white;">

    <!-- Header -->
    <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px 20px; background-color: #2c2c2c;">
        <img src="logo.png" alt="GLAMOURHUB Logo" style="height: 50px;">
        <h1 style="marquee">WELCOME TO GLAMOURHUB</h1>
        <nav style="display: flex; gap: 20px;">
            <a href="#" style="color: white; text-decoration: none; font-size: 18px;">Home</a>
            <a href="#" style="color: white; text-decoration: none; font-size: 18px;">About Us</a>
            <a href="#" style="color: #ff69b4; text-decoration: none; font-size: 18px; border: 1px solid #ff69b4; padding: 5px 15px; border-radius: 20px;">Register</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div style="background: url('back.webp') no-repeat center center; background-size: cover; padding: 40px 20px; text-align: center;">
    <h1 style="font-size: 48px; color: #ff69b4;">YOUR BEST BEAUTY PAL</h1>
    <p style="font-size: 16px; color: #ccc;">Find and book beauty services with ease.</p>
</div>

<!--<div style="display: inline-block; width: 400px; overflow: hidden; white-space: nowrap; position: relative;">>
        <h1 style="font-size: 48px; color: #ff69b4;">YOUR BEST BEAUTY PAL</h1>
        <p style="font-size: 16px; color: #ccc;">Find and book beauty services with ease.</p>
    </div>-->

    <!-- Scrollable Categories -->
    <div style="display: flex; overflow-x: auto; padding: 20px; gap: 20px; background-color: #2c2c2c;">
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <div style="min-width: 250px; background-color: #3a3a3a; border-radius: 10px; overflow: hidden; text-align: center;">
                    <img src="<?php echo htmlspecialchars($category['image_path']); ?>" alt="<?php echo htmlspecialchars($category['category_name']); ?>" style="width: 100%; height: 200px; object-fit: cover;">
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

</body>
</html>
