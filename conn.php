<?php
// Database connection
$servername="localhost";
$username="root";
$password="";

$conn= new mysqli($servername, $username, $password);
if($conn->connect_error){
    die("Connection failed!".$conn->connect_error);
}

//Creating a Database
$sql="CREATE DATABASE student";
if($conn->query($sql)===TRUE){
    echo "Database created Sucessfully!";
}
else{
    die("Database could not be created!".$conn->error);
}
$conn->close();
?>