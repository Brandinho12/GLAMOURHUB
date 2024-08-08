<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand's Page</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
   
</head>

<body>
<div class="container-fluid" id="profile">
        <header class="jumbotron">
    <div class="avatar">
        <div id="popo">    <img src="images/Capture.PNG" alt="default profile" id="profile-pic" width="200" height="200" style="border-radius: 200px;" >
            <input type="file" id="input-file" class="Upload_Pic" accept="image/*" onchange="previewImage(event)">
            <label for="input-file" id="didi">
                <img src="images/Camera_icon.png" alt="uploadIcon" width="25px" height="25px">
            </label>
        </div>
            <input type="text" placeholder="Brand name" class="text-center" id="brand">
        
    </div>
           </header>
           <button class='btn btn-primary' id='uploadbutton'>Upload</button>
           <div class="row">
            
            <?php 
            include('PHP/connect.php');
            $select_query = "SELECT * FROM `products` ";
            $result = mysqli_query($conn,$select_query);

            if(isset($_POST['insert_service'])){

    $service_title = $_POST['service_title'];
    $service_description = $_POST['service_description'];
    $price = $_POST['service_price'];
    $service_image = $_FILES['service_image'] ['name'];




    if($service_title == '' || $service_description == '' || $price  == '' || $service_image == ''){
        echo "<script>alert('Please fill the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($service_image, "./images/$service_image");

        //insert query
        $insert_service = "insert into products (service_title, service_description, service_image, service_price) values ('$service_title', '$service_description', '$service_image ', '$price')";
        $result = mysqli_query($conn,$insert_service);
        
    }} 
            while($row = mysqli_fetch_assoc($result)){
                $service_id=$row['id'];
                $service_title=$row['service_title'];
                $service_desc=$row['service_description'];
                $service_image=$row['service_image'];
              
                $service_price=$row['service_price'];

                

             
                echo "<div class='col-md-4 mb-3'>
                
                <div class='card'>
                    <img src='Images/service_images/$service_image' alt='$service_title' class='card-img'>
                    <div class='card-body'>
                     <h4 class='card-title'>$service_title</h4>
                     <h5>$service_price </h5>

                     <a href='#' class='btn btn-primary'>Book</a>
                     
                    </div>
                </div>
            </div>";

            }
 
         ?>
             </div>
        </div>     
        
        


        <div class="container" id="Upload_profile" style="display:none ;">
    <h2 class="text-center">Upload Services</h2>
    <form action="" method="post" enctype="multipart/form-data"><!--enctype is to insert any type of data not related to text-->
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
            <input type="file" id="service_img" name="service_image" class="form-control" required="required" autocomplete="off">
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

 <footer class="text-center">
   <p>&copy GLAMOURHUB 2024</p>
   </footer>

   <script src="JS/script.js"></script>
   <script>
    let profilePic = document.getElementById("profile-pic");
    let inputFile = document.getElementById("input-file");

    inputFile.onchange = function(){
        profilePic.src = URL.createObjectURL(inputFile.files[0]);
    }
   </script>
</body>
</html>