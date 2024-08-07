  <?php

  $servername= "localhost";
  $username="root";
  $password="";
  $dbname="myproject2";
  $conn= new mysqli($servername,$username,$password,$dbname);

  if($conn->connect_error){
    die("Connection Failed:" .$conn->connect_error);

  }
  //handle form submission
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $full_name = $_POST["full_name"];
    $email_address = $_POST["email_address"];
    $phone_number = $_POST["phone_number"];
    $location = $_POST["location"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    //prepare and execute the db insertion
    $sql = "INSERT INTO `page`(`full_name`, `email_address`, `phone_number`, `location`, `date`, `time`) VALUES ('$full_name','$email_address','$phone_number','$location','$date','$time')";

    if($conn->query($sql) == TRUE){
      echo "Booking Successfully";
    }else{
      echo "Error:" .$sql . "<br>" .$conn->error;
    }
  }
  $conn->close();
  ?>