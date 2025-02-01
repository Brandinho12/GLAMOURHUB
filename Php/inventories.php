<?php 
require('../connection.php');
$query = "select * from services";
$result = mysqli_query($conn,$query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Clients</title>
</head>
<style>
    .col1{
        background-color: black;
        color: white;
    }
</style>

<body>

<a href="../Admin.php" class="btn btn-secondary mb-4">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
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
                                <td>Vendor</td>
                                <td>Service Title</td>
                                <td>Service Price</td>
                               
                                <td>DELETE</td>
                               
                            </tr>
                            <tr>
                               <?php   
                               while($row = mysqli_fetch_assoc($result))
                               {
                        ?>
                            <td><?php echo $row['vendor_id'];?> </td>
                            <td><?php echo $row['service_title'];?> </td>
                            <td><?php echo $row['service_price'];?> </td>
                            
                            
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