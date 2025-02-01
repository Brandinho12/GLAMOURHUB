<?php 
session_start();

//Check if user is logged in
if(!isset($_SESSION['admin_id'])){
    header("location: loginadmin.php");
    exit();
}
//destroy all session
session_unset();
session_destroy();

//redirect to the home page
header("Location: index.php");
exit();
?>