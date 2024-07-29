<?php
include('conn.php');

    $name = $_GET['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];   
    $mobile = $_POST['mobile'];

    $sql = mysqli_query ($con, " UPDATE reg SET username = '$username' , password ='$password' , 
    email = '$email', mobile = '$mobile' where username='$name'");
    
//    echo "UPDATE reg SET username = '$username' , password ='$password' , email = '$email', 
//     mobile = '$mobile' where username='$name'";
    
    if($sql){
        echo  "<script> alert('Data Updated')</script>";
        echo "<script> type='text/javscript'>Document.location='retrive.php'; </script>";
    }else{
        echo  "<script> alert('error')</script>";
    }
?>
