<?php
$conn= new mysqli("localhost","root","","student");
if($conn->connect_error){
    die("connection failed!".$conn->connect_error);
}

//creating a table student_info
$sql1="CREATE TABLE student_info(
    std_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Firstname varchar(20), Lastname varchar(20)
)";
if($conn->query($sql1)===TRUE){
    echo "Table created Sucessfully!";
}
else{
    die("Error creating table".$conn->error);
}
$conn->close();
?>