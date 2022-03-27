<?php
error_reporting(0);
$showError=false;
$showAlert=false;

if($_SERVER["REQUEST_METHOD"]== "POST"){
include 'partials/dbconnect.php';
$name=$_POST['name'];
$roll=$_POST['roll'];
$faculty=$_POST['faculty'];
$semester=$_POST['semester'];
$subject=$_POST['subject'];

$sql="insert into students (name,roll,faculty,semester,subject) values ('$name','$roll','$faculty','$semester','$subject')";
$result = mysqli_query($conn, $sql);
if($result){
     $showAlert="Added sucessfully";
}
else{
  $showError="Something went wrong";
}
}
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

        <div style="display: flex; justify-content: space-between; margin-bottom: 100px;" class="container2">

            <div>
                <form action="students.php" method="post">

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
                        <input type="text" name="name" placeholder="Student name"> <br>
                    </div>

                    <div>
                        <label for="roll">Student Roll no</label> <br>
                        <input type="text" name="roll" placeholder="Student Roll no"> <br>
                    </div>
                    <div>
                        <label for="faculty">Faculty</label> <br>
                        <select style="padding: 4px 100px;" name="faculty" id="">
                            <option value="bca">BCA</option>
                            <option value="bim">BIM</option>
                            <option value="csit">CSIT</option>
                            <option value="bbs">BBS</option>
                        </select>
                    </div>
                    <div>
                        <label for="name">Semester</label> <br>
                        <select name="semester" id="">
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
                        <select name="subject" id="">
                            <option value="dl">Digital logic</option>
                            <option value="society">Society and technology</option>
                            <option value="math">Math</option>
                            <option value="english">English</option>
                            <option value="cfa">CFA</option>

                        </select>
                    </div>
                    <div>
                        <button type="submit">Add Now</button>
                    </div>
                </form>
            </div>

            <div>
                <?php

                include 'partials/dbconnect.php';
                $query="SELECT * FROM  students";
                    $data=mysqli_query($conn,$query);
                    $total=mysqli_num_rows($data);
                
                ?>

                <?php if($total!=0){     ?>
                <table border="1" cellspacing="0" width="660px">
                    <thead>
                        <tr>
                            <th>Students Name</th>
                            <th>Roll No</th>
                            <th>Faculty</th>
                            <th>Semister</th>
                            <th>Subject</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
while($result=mysqli_fetch_assoc($data)){
   echo " <tr>
      <td >".$result['name']."</td>
      <td >".$result['roll']."</td>
      <td >".$result['faculty']."</td>
      <td >".$result['semester']."</td>
      <td >".$result['subject']."</td>
      <td style='color: blue;'><a href='studentdelete.php ? sid=$result[sid]' onclick='return show()'> delete </a> </td>
      <td style='color: blue;'> <a href='./studentupdate.php ?sid=$result[sid] && name=$result[name] && roll= $result[roll] && faculty= $result[faculty] && semester= $result[semester] && subject= $result[subject]' </a> Edit </td>
    </tr>";
    }
}
else{
    echo "Not found";
}
    ?>
                    </tbody>
                </table>
            </div>



        </div>
    </div>
</body>
<script>
    function show() {
        var a;
        a = confirm('Are you sure want to delete this data??');
        return a;
    }
</script>

</html>