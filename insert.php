<?php $conn= new mysqli('localhost','root','','student');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CRUD Operations </title>
</head>
<body>
    <h2> CRUD Operations </h2>
    <form method="post">
        <label> Firstname: </label>
        <input type="text" name="firstname"> <br> <br>
        <label> Lastname: </label>
        <input type="text" name="lastname"> <br> <br>
        <input type="submit" value="Add" name="add" >
    </form>
    <br>
    <!-- Table to show the data stored in the database in the webpage -->
    <table style="width=80%" border="1">
    <tr>
        <td> S.N </td>
        <td> Firstname </td>
        <td> Lastname </td>
        <td> Actions </td>
    </tr>
     <?php
     $i=1;
     $sql= "select * from student_info";
     $result= $conn->query($sql);
     if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            $id= $row['std_id'];
     ?>
     <tr>
     <td> <?php echo $i++; ?> </td>
        <td> <?php echo $row['Firstname']; ?> </td>
        <td> <?php echo $row['Lastname']; ?> </td>
        <td>
            <a href="update.php?id=<?php echo $id;?>"> Edit </a>
            <a href="delete.php?id=<?php echo $id;?>" 
            onclick="return confirm('Are you Sure?')"> Delete </a>
        </td>
     </tr>
     <?php
       }
    }
     ?>
    </table>
</body>
</html>

<?php
// To add new names in the database through form data. we will use POST method
if(isset($_POST['add'])){

    $firstname= $_POST['firstname'];
    $lastname= $_POST['lastname'];
    $sql= "insert into student_info VALUES(null,'$firstname', '$lastname')";
    if($conn->query($sql)===TRUE){
        echo '<script> alert("student registered Sucessfully");</script>';
        header('location: insert.php');
    }
    else{
        die("Error inserting new record!".$conn->error);
    }
}

?>