<?php
$conn= new mysqli("localhost","root","","student");
if($conn->connect_error){
    die("error connecting to database".$conn->connect_error);

}else{

    $id=$_GET['id'];
    $sql= "select * from student_info where std_id=$id";
    $result= $conn->query($sql);
    if($result->num_rows > 0){
       while($row=$result->fetch_assoc()){
        $stdfname= $row['Firstname'];
        $stdlname= $row['Lastname'];
}
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page </title>
</head>
<body>
 <form method="post">
        <label> Firstname: </label>
        <input type="text" name="firstname" value="<?php echo $stdfname;?>"> <br> <br>
        <label> Lastname: </label>
        <input type="text" name="lastname" value="<?php echo $stdlname;?>"> <br> <br>
        <input type="submit" value="Update" name="update" >
    </form>
    </body>
</html>

    <?php
    if(isset($_POST['update'])){
        $fname= $_POST['firstname'];
        $lname=$_POST['lastname'];
        $sql= "update student_info set Firstname='$fname', Lastname='$lname'
        where std_id=$id";
        if($conn->query($sql)){
            header('location: insert.php');
        }
        else{
            die("Error updating Data!".$conn->error);
        }
    }
    ?>