<?php      
    include('conn.php');  

    if(isset($_POST["submit"])){
        $username = $_POST['user'];  
        $password = $_POST['pass'];

        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  

        $sql = "select * from reg where username = '$username' and password = '$password'";
     
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 

        if($_FILES["image"]["error"] == 4){
          echo
"<script> alert('Image Does Not Exist'); </script>" ;
        }
        else{
          $fileName = $_FILES["image"]["name"];
          $fileSize = $_FILES["image"]["size"];
          $tmpName = $_FILES["image"]["tmp_name"];
      
          $validImageExtension = ['jpg', 'jpeg', 'png'];
          $imageExtension = explode('.', $fileName);
          $imageExtension = strtolower(end($imageExtension));
          if ( !in_array($imageExtension, $validImageExtension) ){
            echo "<script>alert('Invalid Image Extension');</script>";
          }
          else if($fileSize > 1000000){
            echo "<script>alert('Image Size Is Too Large');</script>";
          }
          else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
      
            move_uploaded_file($tmpName, 'picture/' . $newImageName);
            $query = "INSERT INTO reg VALUES('', '$username','$password' '$newImageName')";
            mysqli_query($conn, $query);
            echo "<script> alert('Successfully Added');document.location.href = 'data.php'; </script>";
          }
        }
      }
  
        // if($count == 1){  
        //     echo '<img src="cat.jpg" alt="Your Image" width="1500">';
        //     // echo "<h1><center> Login successful </center></h1>";  

        // }  
        // else{  
        //     echo "<h1> Login failed </h1>";  
        // }     
?>  
