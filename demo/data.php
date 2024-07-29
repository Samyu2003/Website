<?php
   include 'conn.php';
       
    $search = isset($_POST['search']);

    $sql = "SELECT * FROM reg WHERE username LIKE '%$search%'";
    $result = $con->query($sql);
       
    if(mysqli_num_rows($result)>0){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; 
        }
        table, td {
            border: 1px solid black;
            padding: 8px;
        }
        td {
            background-color:lightblue;
        }
    </style>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="search">Search </label>
        <input type="text" id="search" name="search">
        <button type="submit">Search</button>
    </form>
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
        <td><a  href='newupd.php?username=<?php echo $row["username"];?>'>Edit</a></td>
      </tr>
      <?php
      }
    }
      ?>
    </table>
</body>
</html>