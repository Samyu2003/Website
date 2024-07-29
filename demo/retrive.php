<?php
require 'conn.php';
$result = mysqli_query($con,"SELECT * FROM reg");
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>Retrive data</title>
  </head>
  <body>
    <?php
    if(mysqli_num_rows($result)>0){
    ?>
    <table border = 1 cellspacing = 0 cellpadding = 10 >
      <tr>
        <td>#</td>
        <td>UserName</td>
        <td>Password</td>
        <td>Email</td>
        <td>Mobile</td>
        <td>Image</td>
        <td>Action</td>
      </tr>
      <?php
      $i=0;
      while($row = mysqli_fetch_array($result)){
    ?> 
    <tr>
        <td><?php echo $i++; ?></td>  
        <td><?php echo $row["username"]; ?></td>
        <td><?php echo $row["password"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["mobile"]; ?></td>
        <td> <img  src="picture/<?php echo $row["image"]; ?>" width="300" title="<?php echo $row['image']; ?>"> </td>
        <td><a  href='newupd.php?username=<?php echo $row["username"];?> ' >Edit</a></td>
      </tr>
      <?php
      }
      }
      ?>
    </table>
    <!-- yoho ....8925916901  ....depti... -->
</body>
</html>
    