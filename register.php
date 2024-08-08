
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
<link rel="stylesheet" href="CSS/bootstrap.min.css">
`<link rel="stylesheet" href="CSS/style.css">

</head>
<body >

    <div class="container-fluid" id="SignUp">
        <div class="row justify-content-center col-lg-12">
        <form action="" method="post"  role="form">
            <h1 class="text-primary text-center">SignUp</h1>
            <div class="inputs">
                <input type="text" name="company_name" class="form-control width-30rem" id="name" placeholder="Company's name" required><br>
            </div>
             <div class="inputs">
                <input type="email" name="company_email" class="form-control" id="email" placeholder="Company's email" required><br> 
            </div>
            
         
            <select id="Categories" name="category">
                <option value="">Select Categories</option>
                <option value="Hair Salon">HAIR STYLING</option>
                <option value="Barbing">BARBING</option>
                <option value="Spa">SPA</option>
                <option value="Gym">GYM HOUSES</option>
                
            </select> <br><br><br>
                
            
            <div class="inputs">
                <input type="password" name="company_password" class="form-control" name="" id="password" autocomplete="off" placeholder="Password" required><br>
            </div>
            <div class="inputs">
                 <input type="password" name="confirm_password" class="form-control" id="Confirm password" placeholder="Confirm Password" required><br>  
            </div>
            <div class="inputs">
                <input type="text" name="company_location" class="form-control" id="location" placeholder="Location" required><br>   
            </div>
            <div class="inputs">
                <input type="text" name="company_payment" class="form-control" id="fees" placeholder="Registration fees" required>
            </div>
            <div class="btn">
              <a href="login.php" class="btn btn-primary ">SignUp </a>
            </div>
            <p>Already have an account? <span><a href="login.php" id="loginbutton" class="text-primary">Login</a></span> </p><br>
        </form>
         </div>
    </div>
    
    <footer class="jumbotron text-center text-dark height-6rem mt-5"><em>&copy </em>GLAMOURHUB 2024</footer>

    <script src="script.js"></script> 
   
                 
<?php
    include('PHP/connect.php');
if(isset($_POST['vendor_register'])){
    $name = $_POST['company_name'];
    $email = $_POST['company_email'];
    $company_services = $_POST['company_services'];
    $password = $_POST['company_password'];
    $confirm_pass= $_POST['confirm_password'];
    $address = $_POST['company_location'];
    $payment = $_POST['company_payment'];

    //insert_query
$query ="INSERT INTO `vendors`(Company_name, Company_email, Services_offered, password, confirm_password, Location, Registration_fees) VALUES ('$name', '$email', '$company_services', '$password', '$confirm_pass', '$address', '$payment')";

$sql_execute=mysqli_query($conn, $query);

if($sql_execute){
    echo "<script>alert('You have register successfully')</script>";
}
else{
    die(mysqli_error($conn));
}

}


?>

</body>
</html>