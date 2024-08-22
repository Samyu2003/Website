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
<div class="form-group row" style="padding: 20px;">
  <label class="col-lg-0 col-form-label-report" for="from">From</label>
  <div class="col-lg-3">
      <input type="text" class="form-control" id="from_date" name="from_date" placeholder="Select Date" required>
  </div>

  <label class="col-lg-0 col-form-label" for="from">To</label>
  <div class="col-lg-3">
      <input type="text" class="form-control" id="to_date" name="to_date" placeholder="Select Date" required>
  </div>

  <div class="col-lg-3">
    <button type="submit" name="srh-btn" class="btn btn-primary search-button">Search</button>
  </div> <br></br>

</form>
  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            View Visitors</div>
            <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>S.No.</th>
                      <th>Name</th>
                      <th>Organization</th>
                      <th>Mobile</th>
                      <th>Purpose to meet</th>
                      <th>Person to meet</th>
                      <th>In Time</th>
                      <!-- <th>Status</th> -->
                      <th>Status Update</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                     if(isset($_REQUEST['srh-btn']))
                     {
                       $from_date = $_POST['from_date'];
                       $to_date = $_POST['to_date'];
                       $dept = $_POST['department'];
                       $from_date = date('Y-m-d', strtotime($from_date));
                       $to_date = date('Y-m-d', strtotime($to_date));

                       $search_query = mysqli_query($conn, "SELECT * from tbl_visitors where DATE(in_time)>='$from_date' 
                       and DATE(in_time)<='$to_date' or department='$dept'");
                       $sn = 1;
                       while($row = mysqli_fetch_array($search_query))
                    { ?>
                     
                      <?php $sn++; } 
                     } else {
                    if(isset($_GET['ids'])){
                      $id = $_GET['ids'];
                      $delete_query = mysqli_query($conn, "delete from tbl_visitors where id='$id'");
                      }
										$select_query = mysqli_query($conn, "select * from tbl_visitors");
										$sn = 1;
										while($row = mysqli_fetch_array($select_query))
										{ 
										    
										?>
                  <tr>
                      <td><?php echo $sn; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['organization']; ?></td>
                      <td><?php echo $row['cno']; ?></td>
                      <td><?php echo $row['meet']; ?></td>
                      <td><?php echo $row['visit']; ?></td>
                      <td><?php echo $row['in_time']; ?></td>
                        <td>
                          <body>
                              <form action="process.php" method="post">
                                  <button type="submit" class="btn btn-success" name="action" value="approve">Approve</button>  
                                  
                                  <button type="button" class="btn btn-warning" onclick="showRejectModal()">Reject </button>
                              </form>

                              <!-- Reject Modal -->
                              <div id="rejectModal" style="display:none;">
                                  <form action="process.php" method="post">
                                      <input type="hidden" name="item_id" value="123"> <!-- Replace with actual item ID -->
                                      <input type="hidden" name="action" value="reject">
                                      <label for="remarks">Remarks:</label>
                                      <textarea id="remarks" name="remarks" required></textarea>
                                      <button type="submit">Submit</button>
                                      <button type="button" onclick="hideRejectModal()">Cancel</button>
                                  </form>
                              </div>

                              <script>
                                  function showRejectModal() {
                                      document.getElementById('rejectModal').style.display = 'block';
                                  }

                                  function hideRejectModal() {
                                      document.getElementById('rejectModal').style.display = 'none';
                                  }
                              </script>
                          </body>


                          <!-- <span style="padding-button : 10px; ">
                          <a class="btn btn-success" href="{{url('approve_book',$row ->id)}}">Approve</a>
                          </span>
                          
                          <a class="btn btn-warning"href="">Reject</a>                     -->
                        </td>
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

