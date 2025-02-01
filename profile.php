<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand's Page</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
   
</head>

<body class="home">
<nav class="navbar navbar-expand-lg navbar-light fixed-top custom-navbar justify-content-center">
            <div class="container-fluid">
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <div class="navbar-brand">
                        <img src="logo.png" alt="GLAMOURHUB Logo" class="logo">
                        <em><p class="tagline">Your Best Beauty Pal</p></em>
                    </div>
                    <h1 class="heading">WELCOME TO GLAMOURHUB</h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link text-white" href="index.html">Home</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link text-white" href="register.html">Register</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link text-white" href="About.html">About Us</a>
                            </li>
                        </ul>
                    </div>
                  
                </div>
                <!--<h1>WELCOME TO GLAMOURHUB</h1>-->
   
            </div>   
        </nav>
<div class="container-fluid" id="profile">
<?php 

include ('connection.php');
/*
  if(isset($_POST['insert_service'])){
    $profile = $_FILES['profile_image'] ['name'];
    $tmpname = $_FILES['profile_image'] ['tmp_name'];

    $target_dir = "Uploads/";
    $target_file = $target_dir . basename($profile );
    /*move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file);
    move_uploaded_file($tmpname,"./Uploads/$profile");

    $insert_pic = "insert into images(image_path) values('$profile')";
    $result_pic = mysqli_query($conn,$insert_pic);
    if($result_pic){
        echo "<script>alert('profile uploaded successfully')</script>";
    }else{
        echo "file not uploaded";
    }
    if(move_uploaded_file($tmpname, $target_file)){
        echo " <div class='avatar'>
        <img src='Uploads/$profile' alt='default profile' id='profile_img' width='200' height='200' style='border-radius: 200px;' >
        <img src='images/Camera_icon.png' alt='uploadIcon' width='25px' height='25px' name='profile_icon'>  
        </div>";
    }

   /* $select_pic = "select * from images";
$select_pic_query = mysqli_query($conn,$select_pic);
$row = mysqli_fetch_assoc($select_pic_query);

  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST['company_name'];
$sql = "select company_name from vendors where vendor_id = ?";
$sql_query = mysqli_query($conn, $sql);
if($sql_query){
    echo "<input type='text' placeholder='Brand name' class='text-center' id='brand' value='$company_name'>";
}

  }

$vendor_id = $_SESSION['vendor_id'];
$profile_image = basename($_FILES["profile_image"]["name"]);
$query_img = "UPDATE vendors SET profile_image = '$profile_image' WHERE id = $vendor_id";
mysqli_query($conn, $query_img);
$profile_image = 'Uploads/' . $filename_from_db;
echo '<img id="profile-image" src="' . $profile_image . '" alt="Profile Image">';*/
?>
      <div class='avatar'>
        <img src='logo.png' alt='default profile' id='profile_img' width='200' height='200' style='border-radius: 200px;' >
        <img src='images/Camera_icon.png' alt='uploadIcon' width='25px' height='25px' name='profile_icon' onclick="document.getElementById('file-input').click();">  
       <form action="Php/upload.php" id="upload-form" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_image" id="file-input" accept="Uploads/*" onchange="document.getElementById('upload-form').submit();">
       </form>
    </div>
           <button class='btn btn-primary' id='uploadbutton'>Upload</button>
           <div class="row">
            
            <?php 
            include('connection.php');
            $select_query = "SELECT * FROM `services` ";
            $select_result = mysqli_query($conn,$select_query);
            if(!$select_result){
                die("Query Error: " . mysqli_error($conn));
            }

            if(isset($_POST['insert_service'])){

    $service_title = $_POST['service_title'];
    $service_description = $_POST['service_description'];
    $price = $_POST['service_price'];
    $service_image = $_FILES['service_image'] ['name'];

    //accessing image tmp name
    $temp_name = $_FILES['service_image']['tmp_name'];

     $target_dir = "Uploads/";
        $target_file = $target_dir . basename($service_image);
        move_uploaded_file($_FILES['service_image']['tmp_name'], $target_file);
        move_uploaded_file($temp_name,"./Uploads/$service_image");

        //insert query
        $insert_service = "INSERT into services (service_title, service_description, service_image, service_price) values ('$service_title', '$service_description', '$service_image ', '$price')";
        $result = mysqli_query($conn,  $insert_service);
        if($result){
            echo "<script>alert('services inserted successfully')</script>";
        }

      
    } 
            while($row = mysqli_fetch_assoc( $select_result)){
                
                $service_title=$row['service_title'];
                $service_desc=$row['service_description'];
                $service_image=$row['service_image'];
              
                $service_price=$row['service_price'];

                

             
                echo "<div class='col-md-4 mb-3'>
                
                <div class='card'>
                    <img src='Uploads/$service_image' alt='$service_title' class='card-img'>
                    <div class='card-body'>
                     <h4 class='card-title'>$service_title</h4>
                     <h5>$service_price </h5>

                     <a href='booking.html' class='btn btn-primary'>Book</a>
                     
                    </div>
                </div>
            </div>";

            }
        mysqli_close($conn);
         ?>

             </div>
        </div>     
 </div>      
        <div class="container" id="Upload_profile" style="display:none ; margin-top:180px;" >
    <h2 class="text-center">Upload Services</h2>
    <form action="profile.php" method="post" enctype="multipart/form-data"><!--enctype is to insert any type of data not related to text-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="service_title" class="form-label">Service title</label>
            <input type="text" id="service_title" name="service_title" class="form-control" placeholder="Enter service title" required autocomplete="off">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="service_description" class="form-label">Service description</label>
            <input type="text" id="service_descript" name="service_description" class="form-control" placeholder="Enter service description" required autocomplete="off">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="service_Image" class="form-label">Service Image</label>
            <input type="file" id="service_img" name="service_image" class="form-control" required="required" autocomplete="off" accept="Uploads/jpg, Uploads/jpeg, Uploads/png">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="profile_Image" class="form-label">Profile Image</label>
            <input type="file" id="profile_image" name="profile_image" class="form-control"  autocomplete="off" accept="Uploads/jpg, Uploads/jpeg, Uploads/png">
        </div>
        
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="service_price" class="form-label">Service Price</label>
            <input type="text" id="service_price" name="service_price" class="form-control" required="required" autocomplete="off" placeholder="Enter Product price">
        </div>
        <div class="form-outline my-4 w-50 mx-4">
           <button type="submit" name="insert_service" id="insertbutton" value="Insert Service" class="btn btn-primary text-white ">Insert services</button>
        </div>
    </form>
         </div> 

 <div class="text-center footer fixed-bottom custom-navbar">
   <p>&copy GLAMOURHUB 2024</p>
        </div>

   <script src="JS/login.js"></script>
   <script>
    
    /*let profilePic = document.getElementById("profile-pic");
    let inputFile = document.getElementById("input-file");

    inputFile.onchange = function(){
        profilePic.src = URL.createObjectURL(inputFile.files[0]);
    }*/
   </script>
</body>
</html>