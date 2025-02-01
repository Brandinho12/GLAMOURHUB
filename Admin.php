


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/admin.css">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/admin.css">
</head>
<body class="bg-light">
   
    <div class="sidenav " id="mySidenav">
        <p class="logo"><span>GH</span>-GLAMOURHUB</p>
     <a href="category_admin.php" class="icon-a"><i class="fa fa-dashboard icons"></i>&nbsp;&nbsp;Categories</a>
     <a href="Php/company.php" class="icon-a"><i class="fa fa-user icons"></i>&nbsp;&nbsp;Companies</a>
     <a href="Php/clients.php" class="icon-a"><i class="fa fa-users icons"></i>&nbsp;&nbsp;Clients</a>
     <a href="Php/bookingadmin.php" class="icon-a"><i class="fa fa-shopping-bag icons"></i>&nbsp;&nbsp;Bookings</a>
     <a href="Php/inventories.php" class="icon-a"><i class="fa fa-tasks icons"></i>&nbsp;&nbsp;Inventory</a>
     
  


    </div>
    <div id="main">
        <div class="head">
        <div class="col-div-6">
            <span style="font-size: 30px; cursor: pointer;color: white;" class="nav">&#9776; Dashboard</span>
            <span style="font-size: 30px; cursor: pointer;color: white;" class="nav2">&#9776; Dashboard</span>
            
        </div>
        <div class="navigation">
            <button class="hamburger" onclick="show()">
                <div class="bar" id="bar1"></div>
                <div class="bar" id="bar2"></div>
                <div class="bar" id="bar3"></div>
            </button>
            <nav>
                <ul>
                    <li><a href="index.html" class="icon-a"><i class="fa fa-home icons"></i>&nbsp;&nbsp;Home</a></li>
                    <li><a href="about.html" class="icon-a><i class="fa fa-info icons"></i>&nbsp;&nbsp;About Us</a></li>
                    <li><a href="register.html" class="icon-a ><i class="fa fa-Add icons"></i>&nbsp;&nbsp;Register</a></li>
                    <li><a href="logoutadmin.php"class="icon-a ><i  class="fa fa-Admin icons"></i>&nbsp;&nbsp;Logout</a></li>
                    
                </ul>
            </nav>
        </div>
        <script src="JS/scriptadmin.js"></script>
      
        <div class="clearfix"></div>
        </div>
        <?php 

function getCount($table) {
    $host = "localhost";
$username= "root";
$password = "";
$dbname = "glamourhub";

$mysql = new mysqli($host, $username, $password, $dbname);
    $query = "SELECT COUNT(*) FROM $table";
    $result = mysqli_query($mysql, $query);

    if (!$result) {
        die('Query Error: ' . mysqli_error($mysql));
    }

    $row = mysqli_fetch_array($result);
    return $row[0];
}

?>
        <div class="col-div-3">
        
            <div class="box">
                <p> <?php $vendorCount = getCount('vendors');
                echo  $vendorCount;
             ?><br><span>Companies</span></p>
                <i class="fa fa-user box-icon"></i>
                <h5 class="font-weight-bolder mb-0">
              
                </h5>
            </div>
        </div>
        <?php 


?>
        <div class="col-div-3">
            <div class="box">
                <p>                <?php $clientCount = getCount('clients');
                echo  $clientCount;
             ?><br><span>Clients</span></p>
                <i class="fa fa-users box-icon"></i>
               
            </div>
        </div>
        <?php 


?>
        <div class="col-div-3">
            <div class="box">
                
                <p><?php $bookingCount = getCount('orders');
                echo  $bookingCount;
             ?><br><span>Bookings</span></p>

                <i class="fa fa-shopping-bag box-icon"></i>
               
            </div>
        </div>
        
        <div class="clearfix"></div>
        <br/><br/>

      <div class="col-div-8">
        <div class="box-8">
            <div class="content-box">
            <p>Most Booked Companies <span>View All</span></p>
            <br/>
            <table>
                <tr>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Location</th>
                </tr>
            </table>
            </div>
        </div>
      </div>
      <div class="col-div-4">
      <div class="box-4">
        <div class="content-box">
            <p>Total Bookings <span>View All</span></p>
              
        <div class="clearfix"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(".nav").click(function(){
    $("#mySidenav").css('width','70px');
            $("#main").css('margin-left','70px');
            $(".logo").css('visibility','hidden');
            $(".logo span").css('visibility','visible');
            $(".logo span").css('margin-left','-10px');
            $(".icon-a").css('visibility','hidden');
            $(".icons").css('visibility','visible');
            $(".icons").css('margin-left','-8px');
            $(".nav").css('display','none');
            $(".nav2").css('display','block');
        });
        $(".nav2").click(function(){
    $("#mySidenav").css('width','300px');
            $("#main").css('margin-left','300px');
            $(".logo").css('visibility','visible');
            $(".logo span").css('visibility','visible');
            $(".icon-a").css('visibility','visible');
            $(".icons").css('visibility','visible');
            $(".nav").css('display','block');
            $(".nav2").css('display','none');
        });




      
    </script>
  
</body>
</html>