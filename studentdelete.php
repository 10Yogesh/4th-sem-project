<?php
include 'partials/dbconnect.php';
error_reporting(0);
  $sid=$_GET['sid'];
  $query="DELETE FROM students WHERE sid='$sid'";
  $data=mysqli_query($conn,$query);
  if($data){
    echo "<script>alert('deleted')</script>";
    header("location:students.php");
  }
  else{
      echo 'Detele process fail';
  }
?>