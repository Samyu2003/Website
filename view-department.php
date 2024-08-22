<?php
session_start();
include ('connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
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
            <a href="#">View Visitors</a>
          </li> 
        </ol>
<form method="post">
<!-- <div class="form-group row" style="padding: 20px;">
  <label class="col-lg-0 col-form-label-report" for="from">From</label>
  <div class="col-lg-3">
      <input type="text" class="form-control" id="from_date" name="from_date" placeholder="Select Date" required>
  </div>

  <label class="col-lg-0 col-form-label" for="from">To</label>
  <div class="col-lg-3">
      <input type="text" class="form-control" id="to_date" name="to_date" placeholder="Select Date" required>
  </div> -->

  <?php
// Establish database connection
// Fetch distinct department names
$fetch_department = mysqli_query($conn, "SELECT DISTINCT deptname FROM tbl_department");
?>

<div class="row">
    <div class="col-lg-5 d-flex align-items-center">
        <form method="post" action="" class="d-flex w-100">
            <select class="form-control me-2" id="deptname" name="deptname">
                <option value="">Select Department</option>
                <?php
                // Assuming $fetch_department is fetched from database as mentioned in previous code
                while($row = mysqli_fetch_array($fetch_department)) { ?>
                    <option value="<?php echo htmlspecialchars($row['deptname']); ?>">
                        <?php echo htmlspecialchars($row['deptname']); ?>
                    </option>
                <?php } ?>
            </select>
            <button type="submit" name="srh-btn" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>

</form>
  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Role Master</div>
            <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>S.No.</th>
                      <th>Name</th>
                      <!-- <th>EmailId</th> -->
                      <th>Department</th>
                      <th>Designation</th>
                      <th>Mobile</th>
                      <!-- <th>Status</th> -->
                      <!-- <th>Action</th> -->
                  </tr>  
              </thead>
              <tbody>
                <?php
                     if(isset($_REQUEST['srh-btn']))           
                     {
                      //  $from_date = $_POST['from_date'];
                      //  $to_date = $_POST['to_date'];
                       $deptname = $_POST['deptname'];
                      //  $from_date = date('Y-m-d', strtotime($from_date));
                      //  $to_date = date('Y-m-d', strtotime($to_date));

                      //  $search_query = mysqli_query($conn, "select * from tbl_department where DATE(in_time)>='$from_date'
                      //   and DATE(in_time)<='$to_date' or deptname='$deptname'");
                        $search_query = mysqli_query($conn, "select * from tbl_department where  deptname='$deptname'");
                       $sn = 1;
                       while($row = mysqli_fetch_array($search_query))
                    { ?>

  
                      
                  <tr>
                      <td><?php echo $sn; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['deptname']; ?></td>
                      <td><?php echo $row['des']; ?></td>
                      <td><?php echo $row['mobile']; ?></td>
                        
                 <!-- <?php if($row['status']==1){
                        ?><td><span class="badge badge-success">In</span></td>
              <?php } else { ?><td><span class="badge badge-danger">Out</span></td>
                 <?php } ?>     -->
                        <!-- <td>
                        <a href="edit-visitor.php?id=<?php echo $row['id'];?>"> <?php if($row['status']==1){?> <i class="fa fa-pencil m-r-5"></i> Edit <?php } else { ?> View <?php } ?></a>
                        <a href="manage-visitors.php?ids=<?php echo $row['id'];?>" onclick="return confirmDelete()"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </td> -->
                      </tr>
<?php $sn++; } }?>
                 
                 
              </tbody>
              
          </table>
      </div>
  </div>                   
  </div>
                        
    </div>
         
        </div> 
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 <?php include('include/footer.php'); ?>
 <script language="JavaScript" type="text/javascript">
function confirmDelete(){
    return confirm('Are you sure want to delete this Visitor?');
}
</script>