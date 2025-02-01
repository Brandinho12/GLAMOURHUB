<?php 
require ('../connection.php');
$query = "select * from vendors";
$result = mysqli_query($conn,$query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
   
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Companies</title>
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
                                <td>Company Name</td>
                                <td>Company Email</td>
                                <td>phone_number</td>
                                <td>Location</td>
                                <td>DELETE</td>
                               
                            </tr>
                            <tr>
                               <?php   
                               while($row = mysqli_fetch_assoc($result))
                               {
                        ?>
                            <td><?php echo $row['company_name'];?> </td>
                            <td><?php echo $row['company_email'];?> </td>
                            <td><?php echo $row['phone_number'];?> </td>
                            <td><?php echo $row['location'];?> </td>
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