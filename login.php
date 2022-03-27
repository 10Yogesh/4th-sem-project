
<?php
$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]== "POST"){
 include 'partials/dbconnect.php';
 $email= $_POST["email"];
 $password= $_POST["password"];

  //  $sql="Select * from users where email='$email' AND password='$password'";
  $sql = "Select * from users where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
 if($num==1){
  while($row=mysqli_fetch_assoc($result)){
    if (password_verify($password, $row['password'])){
       $login=true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['email']=$email;
        header("location:home.php");
    }
    else{
      $showError = "Username or password not match";
  }
  }
 }
 else{
  $showError="not register with this emil";
 }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management System</title>
    <link rel="stylesheet" href="./login.css">
</head>
<body>
        <nav class="navbar">
            <div class="text"><b>Assignment Management System</b></div>
        </nav>
        <div class="container">
                <div class="img">
                    <img src="../image1.png" alt="College Image" width="900px" height="600px">
                </div>
                
            <form class="login" action="login.php" method="POST">

               
               
        <?php
        if($login){
         echo '<span class="text-green-500">login</span>';
        }
        ?>

        <?php
        if($showError){
         echo '<span class="text-red-500">'. $showError.'</span>';
        }
        ?>



                <center><img src="../user.png" alt="User icon" width="60px" height="60px"></center><br>

                <input type="email" placeholder="Username" name="email"><br>
                <br>
                <input type="password" placeholder="Password" name="password"><br>
                <br>
                <input type="submit" value="Log In">
                <br>
                <br>               
                Don't have a account?
                <div class="dha"><a href="register.php">Register here!</a></div>

            </form>

        </div>
        
        <div class="std"><a href="home.php">View as student</a></div>
        

</body>
</html>