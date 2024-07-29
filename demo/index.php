<?php
    include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="style.css">
    <!-- <style>
    body {
    background-image: url("cat.jpg");
    }
</style> -->
<style>
h1 {
  background-color: green;
}
body {
  background-color: yellow;
}
</style>
</head>
<body>
    <div id="frm">
        <center><h1>LOGIN</h1></center>
        <form name="f1" action="retrive.php" onsubmit="return validation()" method="POST">
            <p>
                <label>UserName:</label>
                <input type="text" id="user" name="username" />
            </p>
            <p>
                <label>Password:</label>
                <input type="password" id="pass" name="password" />
            </p>
            <p>
                <input type="submit" id="btn" value="Login" />
            </p>
           
            <p>New Register? <a href="register.php">Register Here</a></p>
        </form>
    </div>
</body>
</html>
