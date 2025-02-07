<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'connection.php';

if (!isset($_GET['category'])) {
    die("Category not specified.");
}

$category = urldecode($_GET['category']);

// Fetch vendors based on the selected category
$query = "SELECT * FROM vendors WHERE categories = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

$vendors = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vendors[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendors - <?php echo htmlspecialchars($category); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5dc; /* Cream white */
            margin: 0;
            padding: 0;
            text-align: center;
        }

        /* Moving welcome message */
        .header {
            background-color: #ff69b4;
            color: white;
            padding: 15px;
            font-size: 20px;
            overflow: hidden;
            white-space: nowrap;
            position: relative;
        }

        .header span {
            display: inline-block;
            animation: moveText 8s linear infinite;
        }

        @keyframes moveText {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(-100%);
            }
        }

        /* Back button */
        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background: black;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .back-button:hover {
            background: #333;
        }

        /* Vendor cards */
        .vendor-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .vendor-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .vendor-card h2 {
            margin: 10px 0;
        }

        .vendor-card p {
            font-size: 14px;
            color: gray;
        }

        .vendor-card a {
            display: block;
            background: #ff69b4;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
        }

        .vendor-card a:hover {
            background: #ff1493;
        }

        @media screen and (max-width: 600px) {
            .vendor-container {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>

    <!-- Moving Welcome Header -->
    <div class="header">
        <span>WELCOME TO GLAMOURHUB</span>
    </div>

    <!-- Back Button -->
    <a href="C:\xampp\htdocs\GLAMOURHUB\index.php" class="back-button">Prev</a>

    <!-- Vendor Listing -->
    <h1 style="margin-top: 60px;">TOP NOTCH <?php echo htmlspecialchars($category); ?> </h1>

    <div class="vendor-container">
        <?php if (!empty($vendors)): ?>
            <?php foreach ($vendors as $vendor): ?>
                <div class="vendor-card">
                    <h2><?php echo htmlspecialchars($vendor['company_name']); ?></h2>
                    <p>📍 <?php echo htmlspecialchars($vendor['location']); ?></p>
                    <p>📞 <?php echo htmlspecialchars($vendor['phone_number']); ?></p>
                    <a href="vendor_profile.php?vendor_id=<?php echo $vendor['vendor_id']; ?>">View Profile</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No vendors found for this category.</p>
        <?php endif; ?>
    </div>

</body>
</html>
