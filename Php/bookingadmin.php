<?php 
require_once('connect.php');
$query = "select * from clients";
$result = mysqli_query($conn,$query);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Bookings</title>
</head>
<style>
    .col1{
        background-color: black;
        color: white;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">GLAMOURHUB</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="col1">
                                <td>Full Name</td>
                                <td> Email Address</td>
                                <td>Phone Number</td>
                                <td>Location</td>
                                <td>Service</td>
                                <td>Time</td>
                                <td>Date</td>
                                <td>DELETE</td>
                               
                            </tr>
                            <tr>
                               <?php   
                               while($row = mysqli_fetch_assoc($result))
                               {
                        ?>
                            <td><?php echo $row['full_name'];?> </td>
                            <td><?php echo $row['email_address'];?> </td>
                            <td><?php echo $row['phone_number'];?> </td>
                            <td><?php echo $row['location'];?> </td>
                            <td><?php echo $row['service'];?> </td>
                            <td><?php echo $row['time'];?> </td>
                            <td><?php echo $row['date'];?> </td>
                            <td><a href="#" class="btn btn-danger">DELETE</a></td>
                            </tr>

                               <?php
                               }
                               ?>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>