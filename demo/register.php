<?php
include 'conn.php';

session_start();
$message='';
if(isset($_SESSION['email alert '])){
    $message= 'Email already exits!!';
}
?>
<!DOCTYPE html>
<html>  
<head>      
    
    <title>Register</title>  
        <style>
    h1 {
    background-color: green;
    }
    body {
    background-color: yellow;
    }
    </style>

    <link rel="stylesheet" href="style.css">   
</head>  
<body>  
    <div id = "frm">  
        <center><h1>REGISTER </h1> </center>
        <h4><?php echo $message; ?><h4> 
        <form name="f1" action = "authen.php" onsubmit = "return validation()" method = "POST" enctype = "multipart/form-data">  
            <p>  
                <label> UserName: </label>  
                <input type = "text" id ="user" name = "username" />  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="pass" name = "password" />  
            </p> 
            <p>  
                <label> Email: </label>  
                <input type = "email" id ="email" name = "email" />  
            </p> 
            <p>  
                <label> Mobile: </label>  
                <input type = "tel" maxlength = "10"  id ="mobile" name  = "mobile" />  
            </p>
            <p>
                <label for="image">Image : </label>
                <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
            </p>    
            <p>     
                <input type =  "submit" id = "btn" value = "Register" />  
            </p>  
            
        </form>  
        <p>Already have an account? <a href="index.php">Login Here</a></p>
    </div>  
    
     <?php unset($_SESSION['email alert']); ?>
   
</body>     
</html>   