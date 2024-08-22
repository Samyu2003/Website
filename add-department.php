<?php
session_start();
include ('connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
if(isset($_REQUEST['sbt-dpt']))
{
  $name = $_POST['name'];
  $deptname = $_POST['deptname'];
  $des = $_POST['des'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $hod = $_POST['hod'];
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];
  $role = isset($_POST['role']) ? $_POST['role'] : '';


  $insert_department = mysqli_query($conn,"insert into tbl_department set name ='$name', deptname='$deptname',
  des='$des', mobile='$mobile', email='$email', hod='$hod', username='$username', pwd='$pwd', role='$role' ");

if($insert_department > 0)
{
  ?>
<script type="text/javascript">
    alert("Added successfully.")
</script>
<?php
}
}
?>
<?php include('include/header.php'); ?>
<div id="wrapper">
<?php include('include/side-bar.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">User Department</a>
          </li>
        </ol>

  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Submit Details</div>       
      <form method="post" class="form-valide">
      <div class="card-body">
      <div class="form-group row">
      <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span></label>
       <div class="col-lg-6">
      <input type="text" name="name" id="name" class="form-control" placeholder="Enter  Name" required>
       </div>
      </div> 
      <div class="form-group row">
      <label class="col-lg-4 col-form-label" for="deptname">Department <span class="text-danger">*</span></label>
       <div class="col-lg-6">
      <input type="text" name="deptname" id="deptname" class="form-control" placeholder="Enter Department Name" required>
       </div>
      </div> <div class="form-group row">
      <label class="col-lg-4 col-form-label" for="des">Designation <span class="text-danger">*</span></label>
       <div class="col-lg-6">
      <input type="text" name="des" id="des" class="form-control" placeholder="Enter designation" required>
       </div>
      </div> <div class="form-group row">
      <label class="col-lg-4 col-form-label" for="mobile">Mobile Number <span class="text-danger">*</span></label>
       <div class="col-lg-6">
      <input type="text" name="mobile" maxlength = "10"  id="mobile" class="form-control" placeholder="Enter mobile Number" required>
       </div>
      </div> <div class="form-group row">
      <label class="col-lg-4 col-form-label" for="email">Email  <span class="text-danger">*</span></label>
       <div class="col-lg-6">
      <input type="text" name="email" id="email" class="form-control" placeholder="Enter email" required>
       </div>
      </div> <div class="form-group row">
      <label class="col-lg-4 col-form-label" for="hod">HOD<span class="text-danger">*</span></label>
       <div class="col-lg-6">
       <input type="radio" id="hod" name="hod" value="YES">
       <label for="hod">Yes</label>
       <input type="radio" id="hod" name="hod" value="NO">
       <label for="hod">No</label>
       </div>
      </div> <div class="form-group row">
      <label class="col-lg-4 col-form-label" for="username">User Name <span class="text-danger">*</span></label>
       <div class="col-lg-6">
      <input type="text" name="username" id="username" class="form-control" placeholder="Enter UserName" required>
       </div>
      </div> 
      <div class="form-group row">
      <label class="col-lg-4 col-form-label" for="pwd">Password<span class="text-danger">*</span></label>
       <div class="col-lg-6">
      <input type="text" name="pwd" id="pwd" class="form-control" placeholder="Enter Password" required>
       </div>
      </div> 
      <div class="form-group row">
  <label class="col-lg-4 col-form-label" for="role">Role<span class="text-danger">*</span></label>
  <div class="col-lg-6">
    <select class="form-control" id="role" name="role" required>
      <option value="">Select Role</option>
      <option value="HR">HR</option>
      <option value="IT">IT</option>
      <option value="HOD">HOD</option>
      <option value="Time Office">Time Office</option>
      <option value="General staff">General staff</option>
    </select>
  </div>    
</div>

<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="status">Status<span class="text-danger">*</span></label>
    <div class="col-lg-6">
        <select name="status" id="status" class="form-control" required>
            <option value="" disabled selected>Select Status</option>
            <option value="1">In</option>
            <option value="0">Out</option>
        </select>
    </div>
</div>

      <!-- <div class="form-group row">
      <label class="col-lg-4 col-form-label" for="role">  Role<span class="text-danger"></span></label>
      <div class="col-lg-6">
      <select class="form-control" id="role" name="role" >
      <option value="">Select Role</option>
      <option value="">HR</option>
      <option value="">IT</option>
      <option value="">HOD</option>
      <option value="">Time Office</option>
      <option value="">General staff</option>
      </select>
      </div>    
      </div>                                                  -->
      <div class="form-group row">
      <div class="col-lg-8 ml-auto">
      <button type="submit" name="sbt-dpt" class="btn btn-primary">Submit</button>
      </div>
      </div>
      </div>
      </form>
      </div>                  
    </div>
  </div>  
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 <?php include('include/footer.php'); ?>