<?php      
    include('conn.php');  
   
    $username = $_POST['username'];  
    $password = $_POST['password'];  
    $email = $_POST['email'];
    $mobile  =$_POST['mobile'];
    $img = $_FILES['image']['name'];

        $username = stripcslashes($username);  
        $password = stripcslashes($password);
        $email = stripcslashes($email);
        $mobile = stripcslashes($mobile);
        $img = stripcslashes($img);  
        
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);
        $email = mysqli_real_escape_string($con, $email);
        $mobile = mysqli_real_escape_string($con, $mobile); 
        $img = mysqli_real_escape_string($con, $img); 

        // $select_qry = "SELECT * FROM 'reg' WHERE 'email'= '$email'";

        $select_qry = "SELECT * FROM reg WHERE email= '$email'";
        
        $result = mysqli_query($con, $select_qry);

        $present = mysqli_num_rows($result);
        if($present>0){

          echo "<script type= 'text/javascript'>alert('Email already exists')</script>";
        
        }else{
          
        $sql = "INSERT INTO reg ( username,password,email,mobile,image) 
        VALUES ('$username', '$password','$email','$mobile','$img')"; 
        $insert = mysqli_query($con,$sql);
        // $insert = "insert into reg ('NULL','$img')";
        if($insert>0)
        {
          move_uploaded_file($_FILES['image']['tmp_name'],"picture/$img");
          echo"<script>alert ('image has been uploaded to folder')</script>";
        }
          else{
          echo "<script> alert('Image does not uploaded to folder')</script>";
        }
        {
        // mysqli_query($con, $sql);
        echo "<script type= 'text/javascript'>alert('Successfully Register')</script>";
}

}
?>  