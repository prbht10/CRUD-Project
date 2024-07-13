<?php
$conn= new mysqli("localhost","root","","student");
if($conn->connect_error){
    die("error connecting to database".$conn->connect_error);
}
$id=$_GET['id'];
//Delete query
$sql="delete from student_info where std_id=$id";
if($conn->query($sql)===TRUE){
    header('location: insert.php');
    echo "<script> alert('record deleted sucessfully')</script>";
}
    else{
        die('Error deleting the record!'.$conn->error);
    }

?>