<?php
session_start();
include('connection.php');

$id = $_SESSION['id'];
if (empty($id)) {
    header("Location: index.php");
}

if (isset($_POST['sbt-vstr'])) {
    $No_of_person = $_POST['No_of_person'];
    $name = $_POST['name'];
    $cno = $_POST['cno'];
    $email = $_POST['email'];
    $organization = $_POST['organization'];
    $location = $_POST['location'];
    $No_of_vec = $_POST['No_of_vec'];
    $vectype = $_POST['vectype'];
    $vecregno = $_POST['vecregno'];
    $no_of_phones = $_POST['No_of_phones'];
    $mobtype = $_POST['mobtype'];
    $no_of_laptop = $_POST['no_of_laptop'];
    $lapsrno = $_POST['lapsrno'];
    $lapmodel = $_POST['lapmodel'];
    $no_of_charger = $_POST['no_of_charger'];   
    $meet = $_POST['meet'];
    $visit = $_POST['visit'];
    $in_time = $_POST['in_time'];

    // Insert visitor data into database
    $insert_visitor = mysqli_query($conn,"INSERT into tbl_visitors (No_of_person, name, cno, email, organization,
     location, No_of_vec, vectype, vecregno, no_of_phones, no_of_laptop, lapsrno, lapmodel, no_of_charger, meet, visit, 
     in_time)  VALUES ('$No_of_person', '$name', '$cno', '$email', '$organization', '$location',
      '$No_of_vec', '$vectype', '$vecregno', '$no_of_phones', '$no_of_laptop', '$lapsrno', '$lapmodel', '$no_of_charger',
       '$meet', '$visit', '$in_time')");

    if ($insert_visitor) {
        echo "<script>alert('Visitor added successfully.');</script>";
    } else {
        echo "<script>alert('Error occurred while adding visitor.');</script>";
    }
}
?>

<?php include('include/header.php'); ?>
<div id="wrapper">
    <?php include('include/side-bar.php'); ?>

    <div id="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Add Visitors</a>
                </li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-info-circle"></i>
                    Submit Details
                </div>
                <div class="card-body">
                    <form method="post" class="form-valide">
                        <div class="row">

                <!----------------------------------------Person----------------------------------------->
                            <!-- No. of Person -->
                            <div class="col-md-3 pt-3">
                                <label>No. Of Person</label>
                                <input type="text" class="form-control" style="height: 25px;" name="No_of_person" id="No_of_person" oninput="createPersonFields()" required>
                            </div>

                            <!-- Additional Dynamic Fields -->
                            <div id="persons"></div>
                            <script>
                            function createPersonFields() {
                                var noOfPersons = parseInt(document.getElementById("No_of_person").value);
                                var personsDiv = document.getElementById("persons");

                                // Clear previous entries
                                personsDiv.innerHTML = '';

                                for (var i = 0; i < noOfPersons; i++) {
                                    var div = document.createElement('div');
                                    div.className = 'row mb-2';

                                    div.innerHTML = `
                                        <div class="col-md-4">
                                            <label>Name</label> 
                                            <input type="text" class="form-control" style="height: 25px;" name="name" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control" style="height: 25px;" name="cno" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                            <input type="email" class="form-control" style="height: 25px;" name="email" required>
                                        </div>
                                    `;

                                    personsDiv.appendChild(div);
                                }

                                // Disable the No_of_person input to prevent further changes
                                document.getElementById("No_of_person").setAttribute("readonly", "readonly");
                            }

                            </script>




          <!--------------------------------- No. of Vehicle -------------------------------->
                            <div class="container">
                                <!-- Existing Row for Other Inputs -->
                                <div class="row">
                                <div class="col-md-3 pt-3">
                                    <label>No. Of Vehicle</label>
                                    <input type="text" class="form-control" style="height: 25px;" name="No_of_vec" id="No_of_vec" oninput="createVehicleFields()" required>
                                </div>
                                <div id="vehicles"></div> 
                                </div>

                            </div>
 
                            <script>
                            function createVehicleFields() {
                                var noOfVehicles = parseInt(document.getElementById("No_of_vec").value);
                                var vehiclesDiv = document.getElementById("vehicles");

                                // Clear previous entries
                                vehiclesDiv.innerHTML = '';

                                for (var i = 0; i < noOfVehicles; i++) {
                                    var div = document.createElement('div');
                                    div.className = 'row mb-2';

                                    div.innerHTML = `
                                        <div class="col-md-6 pt-3">
                                            <label>Vehicle Type</label> 
                                            <input type="text" class="form-control" style="height: 25px;" name="vectype" required>
                                        </div>
                                        <div class="col-md-6 pt-3">
                                            <label> Registration No</label>
                                            <input type="text" class="form-control" style="height: 25px;" name="vecregno" required>
                                        </div>                                   `;

                                    vehiclesDiv.appendChild(div);
                                }

                                // Disable the No_of_vehicle input to prevent further changes
                                document.getElementById("No_of_vehicle").setAttribute("readonly", "readonly");
                            }

                            function cancel() {
                                window.location.href = 'index.php'; // Adjust to your cancel action
                            }
                            </script>

                    
          <!---------------------------------------------- No. of Laptop --------------------------------------------->


                            <div class="container">
                                <!-- Existing Row for Other Inputs -->
                                <div class="row">
                                    <div class="col-12 col-md-3 pt-3">
                                        <label>No. Of Laptop</label>
                                        <input type="text" class="form-control" style="height: 25px;" name="no_of_laptop" id="no_of_laptop" oninput="createLaptopFields()" required>
                                    </div>
                                    <div  id="laptops"></div> 
                                </div>

                            </div>

                            <script>
                            function createLaptopFields() {
                                var noOfLaptops = parseInt(document.getElementById("no_of_laptop").value);
                                var laptopsDiv = document.getElementById("laptops");

                                // Clear previous entries
                                laptopsDiv.innerHTML = '';

                                for (var i = 0; i < noOfLaptops; i++) {
                                    var div = document.createElement('div');
                                    div.className = 'row mb-2';

                                    div.innerHTML = `
                                        <div class="col-md-6 pt-3">
                                            <label>Serial Number</label>
                                            <input type="text" class="form-control" style="height: 25px;" name="lapsrno" required>
                                        </div>
                                        <div class="col-md-6 pt-3">
                                            <label>Laptop Model</label>
                                            <input type="text" class="form-control" style="height: 25px;" name="lapmodel" required>
                                        </div>
                                    `;

                                    laptopsDiv.appendChild(div);
                                }

                                // Disable the No_of_laptop input to prevent further changes
                                document.getElementById("no_of_laptop").setAttribute("readonly", "readonly");
                            }

                            function cancel() {
                                window.location.href = 'index.php'; // Adjust to your cancel action
                            }
                            </script>



                            <div class="col-md-3 pt-3">
                                <div class="form-group">
                                    <label>Organization</label>
                                    <input type="text" name="organization"  style="height: 25px;" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3 pt-3">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" style="height: 25px;" name="location" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3 pt-3">
                                <div class="form-group">
                                    <label>No.Of.Mobile</label>
                                    <input type="number" class="form-control" style="height: 25px;" name="No_of_phones" required>
                                </div>
                            </div>

                            <div class="col-md-3 pt-3">
                                <div class="form-group">
                                    <label>Mobile Type</label>
                                    <select class="form-control" id="role" style="height: 25px;" name="mobtype" required>
                                        <option value="">  </option>
                                        <option value="With Camera">With Camera</option>
                                        <option value="Without Camera">Without Camera</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 pt-3">
                                <div class="form-group">
                                    <label>No.Of.Charger</label>
                                    <input type="number" class="form-control" style="height: 25px;" name="no_of_charger" required>
                                </div>
                            </div>

                            <div class="col-md-3 pt-3">
                                <div class="form-group">
                                    <label>Purpose of Visit</label>
                                    <input type="text" style="height: 25px;" name="visit" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3 pt-3">
                                <div class="form-group">
                                    <label>Person to Meet</label>
                                    <input type="text" name="meet" style="height: 25px;" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3 pt-3">
                                <div class="form-group">
                                    <label>Visit Date and Time</label>
                                    <input type="datetime-local" style="height: 25px;" name="in_time" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-12 pt-3">
                                <button type="submit" name="sbt-vstr" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-secondary" onclick="cancel()">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php include('include/footer.php'); ?>
</div>


