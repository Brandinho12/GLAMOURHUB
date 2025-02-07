<?php
session_start();
require ('connection.php');

if (!isset($_SESSION['client_id'])) {
    header("Location: login_signup.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="booking">
        <div class="row justify-content-center">
            <div class="col-sm-6">
        <form action="booking.php" method="post">
            <h1 class="text-primary-text-center">BOOkING</h1>
            <div class="input-box">
                <input type="text" name="full_name" placeholder="Full Name" id="full_name">
            </div>
            <div class="col-sm-5">
            <div class="input-box">
                
                <input type="text" id="email_address" placeholder="Email Address" name="email_address" required>
            </div>
            <div class="input-box">
                <input type="" id="phone_number" placeholder="Phone Number"  name="phone_number" required>
            </div>
            <div class="input-box">
                <input type="location" id="location" placeholder="location" name="location" required>
            </div>
            <div class="input-box">
                <input type="text" id="service" placeholder="service" name="service" required>
            </div>
            <div class="input-box">
                <input type="date" class="checkbox" name="date" placeholder="" required>
            </div>
            <div class="input-box">
                <input type="time" class="checkbox" name="time" placeholder=""  required>
            </div><br>
            <div class="wrapper">
                 <button class="btn btn-primary" button type="submit" name="summit" class="btn">Book Now</button>
                 <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service_id = $_POST['service_id'];
    $client_id = $_SESSION['client_id'];

    // Insert booking into database
    $query = "INSERT INTO bookings (service_id, client_id) VALUES ($service_id, $client_id)";
    if (mysqli_query($conn, $query)) {
        echo "Booking successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>   
            </div><br><br>
            <div>
                <footer class="jumbotron text-center"> &copy; GLAMOURHUB 2024
                </footer>
            </div>
            
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
<?php
$conn->close();
?>