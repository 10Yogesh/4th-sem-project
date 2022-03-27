<?php
$showAlert=false;
$showError=false;
 if($_SERVER["REQUEST_METHOD"]== "POST"){   
  include './partials/dbconnect.php';
  $name= $_POST["name"];
  $email= $_POST["email"];
  $password= $_POST["password"];

  // Check whether this username exists
  $existSql = "SELECT * FROM `users` WHERE email = '$email'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);

   if($numExistRows>0){
        $showError="Email is already taken"; // email match

   }
   else{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql="insert into users(name,email,password) values ('$name','$email','$hash')";
    $result=mysqli_query($conn,$sql);
    
  if($result){
    $showAlert=true;
    // header("location:login.");   
  }
  else{
    $showError="Someting went wrong";
  }
   }
  
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css"
</head>
<body>
    <nav class="navbar">
        <div class="text"><b>Attendance Management System</b></div>
    </nav>

    <center><div class="register">User Registration
    </div></center>
    <div class="form">


    <?php
        if($showAlert){
         echo '<span class="text-green-500">sucessfully register</span>';
        }
      ?>
        <?php
       if($showError){
        echo '<span class="text-red-500">'. $showError.'</span>';
       }
      ?>


        <center>
        <form action="register.php" method="POST">
            <div class="box">
              
            <center><img src="../user.png" alt="User icon" width="60px" height="60px"></center><br>

            <input type="text" placeholder="Username" name="name"><br>
            <br>
            <input type="text" placeholder="Email" name="email"><br>
            <br>
            <input type="password" placeholder="Password" name="password"><br>
            <br>
            <br>         
            </div>
            <!-- <input class="btn" type="submit " value="Register"><br> -->
            <div class="sub"><input type="submit" value="submit"></div><br>
            <a href="login.php"><input class="gb" type="button" value="Go Back" ></a>
           
        </form>
        </center>
    </div>


    
</body>
</html>