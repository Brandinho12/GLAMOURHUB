<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="../CSS/bootstrap2.min.css">
    <link rel="stylesheet" href="../CSS/styledash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div>
 <div class="container" id="menu" >
    <img src="../logo.png" alt="" height="100" width="100" style="border-radius: 50px; justify-content: center;">
    <div id="scroll-container"><div id="scroll-text"><h1 style="color: white;" id="welcome">Your Personal GLAMOURHUB Dashboard
    <?php
     include('../connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['company_email'];
  $password = $_POST['company_password'];

  // Retrieve vendor from the vendors table
  $sql = "SELECT  company_name, password FROM vendors WHERE company_email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  
  if ($stmt->num_rows > 0) {
      $stmt->bind_result( $name, $hashed_password);
      $stmt->fetch();

      if (password_verify($password, $hashed_password)) {
          echo "Login successful! Welcome " . $name;
      } else {
          echo "Invalid password.";
      }
  } else {
      echo "No user found with this email.";
  }

  $stmt->close();
  $conn->close();
}?></div></div>
    </h1>
    <div style="position: fixed; display: flex; flex-direction: column; justify-content: space-between;">
    <a href="../index.html" style="color: blue;"><i class="fas fa-house" style="font-size: large;">HOME</i></a>
    <a href="../login.html" style="color: blue;"><i class="fas fa-arrow-left" style="font-size: large;">BACK</i></a>
    <label for="togg-1">
                        <h4>Dark Mode</h4>
                        
                        <input type="checkbox" id="togg-1">
                        <div class="toggle-container">
                            <span class="toggle"></span>
                            <span class="toggle-c"></span>
                        </div>
                    </label>
    </div>
 </div>
 
 
    <div style="" id="contenttt">
    
    
    
       <br>
       
       <div id="dashboard" class="section">
        <div>
            <h1>Dashboard</h1>
            <hr>
        </div>
      <div class="container">
            <ul>
            <div style="text-align: center;" class="container">
        <button onclick="scrollToSection('dashboard')" class="tabb" > <i class="fas fa-tachometer-alt"></i>    DASHBOARD</button><br>
        <button onclick="window.location.href='../booking.php'" class="tabb" > <i class="fas fa-bell"></i>    NOTIFICATIONS</button><br>
        <button onclick="window.location.href='../profile.php'" class="tabb"><i class="fas fa-edit"></i>    EDIT PROFILE</button><br>
        <button onclick="window.location.href='../profile.php'" class="tabb"><i class="fas fa-user"></i>    VIEW PROFILE</button><br>
        <button onclick="scrollToSection('help')" class="tabb"><i class="fas fa-question-circle"></i>    FAQ</button><br>
        <button onclick="scrollToSection('settings')" class="tabb"><i class="fas fa-cog"></i>    SETTINGS</button><br>
            
    </div>
            </ul>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div>  
       <div id="help" class="section">
        <div>
            <h1>GLAMOURHUB Help Center</h1>
            <hr>
        </div>
      <div class="containerr">
            <ul>
                <li>
                    
                </li>
            </ul>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
      <div id="settings" class="section">
        <div>
            <h1>Settings</h1>
            <hr>
        </div>
      <div class="containerr">
            <ul>
                <li>
                    
                </li>
            </ul>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
    </div>
    </div>
    <script src="../JS/scriptdash.js"></script>
    <script>
        document.getElementById('togg-1').addEventListener('click', function(){
            document.body.classList.toggle('dark-mode');
        });
    </script>
    
</body>
</html>