  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  //set content type to json

  header('Content-Type: application/json');
  //get the input data
  $data = json_decode(file_get_contents("php://input"));

  //getting booing details
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $full_name = $_POST["full_name"];
    $email_address = $_POST["email_address"];
    $phone_number = $_POST["phone_number"];
    $location = $_POST["location"];
    $service = $_POST["service"];
    $date = $_POST["date"];
    $time = $_POST["time"];

  
//database connection
  $servername= "localhost";
  $username="root";
  $password="";
  $dbname="myproject2";

  //create conection
  $conn = new mysqli($servername, $username, $password, $dbname);

   
  //check connection
  if(!$conn->connect_error){
    die(json_encode(['message => "Connection Failed:" ']));

  }
 
    //prepare and execute the db insertion
    $stmt = $conn->prepare("INSERT INTO `booking`(`full_name`, `email_address`, `phone_number`, `location`, `service`, `date`, `time`) VALUES ('?','?','?','?','?','?','?')");

    if(!$stmt) {
      die(json_encode((['message' => 'statement preparation failed:'. mysqli_error($conn)])));

      $full_name = "varchar";
      $email_address ="varchar";
      $phone_number = "int";
      $location ="varchar";
      $service ="varchar";
      $data ="date";
      $time ="time";
    }
    $stmt-> bind_param('ss','$full_name','$email_address','$phone_number','$location','$service','$date','$time');

    if ($stmt -> execute()) {
      //send notification to the vendors
      $vendor_dashboard = ['vendor1@erfghjhg.com','vendor2@example.com']; //can replace with actual vendor emails

      //prepare for notification
      $subject = 'New Appointment Booking';
      $message = "New appiontment booked by this $full_name , for this'$email_address', and this'$phone_number', with this'$location',for this service'$service', on this'$date', and this'$time')";


      //send notification to vendors
      foreach ($vendor_dashboards as $vendor_dashboard) {
        mail($vendor_dashboard, $subject, $message);
      }
      echo json_encode(['message' => 'Appointment Booked Successfully']);
    } else{
      echo json_encode(['message' => 'Failed To Book Appointment']);
    }
    $stmt->close();
    $conn->close();

    }
  ?>