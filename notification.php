<?php
include("database.php");

$sql = "SELECT full_name, email_address, phone_number, location, service, date, time";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styledash.css">
</head>
<body>
    <header class="jumbotron text-center">
        <img src="images/20240717_145057_0000.png" alt="" height="100" width="100" style="align-items: center; border-radius: 50px;">
        <div style="display: flexbox; flex-direction: row; justify-content: center; text-align: center; justify-content: space-evenly;">
            <button id="notetab" onclick="location.href='notification.html'">NOTIFICATIONS</button>
            <button id="edittab" onclick="location.href='edit.html'">EDIT PROFILE</button>
        </div>
    </header>
    <br>
    <?php
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<p><strong>Service Name: </strong>" . $row["Service"] . "<br>";
            echo "<strong>Client's Name: </strong> " . $row["full_name"] . "<br>";
            echo "<strong>Client's Address: </strong> " . $row["location"] . "<br>";
            echo "<strong>Client's Telephone: </strong> " . $row["phone_number"] . "<br>";
            echo "<strong>Client's Email: </strong> " . $row["email_address"] . "<br>";
            echo "<strong>Date of Order: </strong> " . $row["date"] . "<br>";
            echo "<strong>Time of Order: </strong> " . $row["time"] . "</p>";
        }}
        else{
            echo "<p>You have no notifications</p>";
        }
        $conn ->close();
    
    ?>
    <br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br>
    <footer class="jumbotron text-center" style="padding: 40px;">&copy; GLAMOURHUB 2024</footer>
</body>
</html>