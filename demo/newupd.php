<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
<div id = "frm">  
        <h1>UPDATE </h1>  
        <?php
            include('conn.php');

            $name = $_GET['username'];
            $result = mysqli_query($con,"SELECT * FROM reg WHERE username='$name'");
          
            $row = mysqli_fetch_array($result);
       ?>
        <form name="f1" action = "edit.php?name=<?php echo $row["username"]?>" onsubmit = "return validation()" method = "POST" enctype = "multipart/form-data">  
            <p>  
                <label> UserName: </label>  
                <input type = "text" id ="username" value="<?php echo $row["username"]?>" name  = "username" />  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" value="<?php echo $row["password"]?>" id ="password" name  = "password" />  
            </p> 
            <p>  
                <label> Email: </label>  
                <input type = "email" value="<?php echo $row["email"]?>" id ="email" name  = "email" />  
            </p> 
            <p>  
                <label> Mobile: </label>  
                <input type = "tel" maxlength = "10" value="<?php echo $row["mobile"]?>" id ="mobile" name  = "mobile" />  
            </p>
          
            <p>     
                <input type =  "submit" id = "btn" value = "Update" />  
            </p>  
        </form>  
</body>
</html>