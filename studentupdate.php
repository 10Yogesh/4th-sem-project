
<?php
     error_reporting(0);
     $showError=false;
   $showAlert=false;
   if($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'partials/dbconnect.php';
   $cid=$_GET['sid'];
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $faculty=$_POST['faculty'];
    $semester=$_POST['semester'];
    $subject=$_POST['subject'];
    $sql="UPDATE students SET name=' $name ',roll=' $roll',faculty='$faculty',semester=' $semester',subject='$subject' WHERE sid='$sid'";
    $result = mysqli_query($conn, $sql);
     if($result){
          $showAlert="sucessfully update";
          header("location:students.php");
     }
     else{
       $showError="Something went wrong";
     }
    }
?>

<?php
     error_reporting(0);
     $_GET['sid'];
     $_GET['name'];
     $_GET['roll'];
     $_GET['faculty'];
     $_GET['semester'];
     $_GET['subject'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./students.css">
</head>
<body>
    <nav class="navbar">
            <div class="text"><b>Assignment Management System</b></div>
    </nav>
    <div class="container">
           <div class="container1">
             <div class="menu">
                 <a href="home.php">Home</a>
                 <a href="faculty.php">Faculties</a>
                 <a href="students.php">Students</a>
                 <a href="#">Profile</a>    
                 <a href="login.php">Logout</a>
             </div> 
           </div>  
           
           <div style="display: flex; justify-content: space-between; margin-bottom: 100px;" class = "container2">

               <div>
                 <form action="studentupdate.php" method="post">

                    <?php
                    if($showAlert){
                     echo '<span >'.$showAlert.'</span>';
                    }
                  ?>
                  <?php
                   if($showError){
                    echo '<span>'. $showError.'</span>';
                   }
                  ?>


                     <div>
                         <label for="name">Student Name</label> <br>
                         <input type="text" name="name" placeholder="Student name" value="<?php echo  $_GET['sid'];  ?>"> <br>
                     </div>
                
                     <div>
                        <label for="roll">Student Roll no</label> <br>
                        <input type="text" name="roll" placeholder="Student Roll no" value="<?php echo  $_GET['roll'];  ?>"> <br>
                    </div>
                    <div>
                        <label for="faculty">Faculty</label> <br>
                        <select style="padding: 4px 100px;" name="faculty" id="" value="<?php echo  $_GET['faculty'];  ?>">
                            <option value="bca">BCA</option>
                            <option value="bim">BIM</option>
                            <option value="csit">CSIT</option>
                            <option value="bbs">BBS</option>
                        </select>
                    </div>
                    <div>
                        <label for="name">Semester</label> <br> 
                        <select name="semester" id="" value="<?php echo  $_GET['semester'];  ?>">
                            <option value="first">First Semester</option>
                            <option value="second">Second Semester</option>
                            <option value="third">Third Semester</option>
                            <option value="forth">Forth Semester</option>
                            <option value="fifth">Fifth Semester</option>
                            <option value="sixth">Sixth Semester</option>
                            <option value="seventh">Seventh Semester</option>
                            <option value="eighth">Eighth Semester</option>
                            
                        </select>
                    </div>
                    <div>
                        <label for="subject">Branch</label> <br> 
                        <select name="subject" id="" value="<?php echo  $_GET['subject'];  ?>">
                            <option value="dl">Digital logic</option>
                            <option value="society">Society and technology</option>
                            <option value="math">Math</option>
                            <option value="english">English</option>
                            <option value="cfa">CFA</option>

                        </select>
                    </div>
                    <div>
                        <button type="submit">update Now</button>
                    </div>
                 </form>
               </div>

               <div>
                


           </div>
    </div>           
</body>
</html>