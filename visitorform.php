
<?php
require ("connection.php");
session_start();

// $userrole = $_SESSION['userrole'];
//echo $userrole;
?>
<html>
<head>
</head>
<body>
<form method="POST" >
        <div class="container">
          
            <table class="table">
                <tr>
                    <td>Category</td>
                    <td>
                    <div class="form-group">
                        <select class="form-control" name="category_name[]" id="category_name">
                            <option>-- Select Category --</option>
                            <?php
                                $category_sql = $con->query("SELECT * FROM visitor_category");
                                while ($category_sql_res = $category_sql->fetch(PDO::FETCH_ASSOC)) {
                                 ?>
                                <option value="<?php echo $category_sql_res['category_name']; ?>"><?php echo $category_sql_res['category_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr>
        <td>Date:</td>
        <td><input type="date" name="date" id="date"></td>
      </tr>
      <tr>
        <td>Time:</td>
        <td><input type="time" name="time" id="time"></td>
      </tr>
                <tr>
                    <td>No.Of.Person</td>
                    <td colspan="2"><input type="number" name="no_person" id="no_person" placeholder="Enter the no.of.persons" oninput="generateDynamicFields()"></td>
                </tr> 
                <tr>
                  <td><div id="setdet"></div></td><td></td>
                </tr>   
               
</body>
</html>
   <!-- jQuery Core Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery UI Library -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<!-- Your Custom JavaScript -->
<script src="path/to/your/dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
function validateDateTime(event) {
    var selectedDate = new Date(document.getElementById("date").value);
    var selectedTime = document.getElementById("time").value;

    var today = new Date();
    today.setHours(0, 0, 0, 0);
    
    var tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);

    // Allow today and tomorrow only
    if (selectedDate.getTime() < today.getTime() || selectedDate.getTime() > tomorrow.getTime()) {
        alert("Please choose a valid date (today or tomorrow).");
        event.preventDefault();
        return false;
    }

    if (selectedDate.getTime() === today.getTime()) {
        var currentTime = new Date();
        var selectedTimeParts = selectedTime.split(':');
        var selectedDateTime = new Date(selectedDate);
        selectedDateTime.setHours(selectedTimeParts[0], selectedTimeParts[1]);

        if (selectedDateTime <= currentTime) {
            alert("Please choose a valid time.");
            event.preventDefault();
            return false;
        }
    }

    return true;
}


function validateName(name) {
    return /^[A-Za-z\s]+$/.test(name);
}

function validatePhoneNumber(phone) {
    return /^\d{10,15}$/.test(phone);
}

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}


function submitForm(id) {
  //alert("hii");
debugger;

var isValidDateTime = validateDateTime(new Event('submit'));

// Validate Dynamic Fields
var isValidDynamicFields = validateDynamicFields();

// Check if validations pass
if (!isValidDateTime || !isValidDynamicFields) {
 // alert("Please fix validation errors.");
  return; // Exit the function if validation fails
}

          
else
{

  var cate_name = $('#category_name').val();
  var nop = $('#no_person').val();
  //alert(nop);
 var chk = document.getElementById("chk");
  var chk2 = document.getElementById("chk2");
  var chk3 = document.getElementById("chk3");
  var chk4 = document.getElementById("chk4");
  var chk5 = document.getElementById("chk5");
  var chk6 = document.getElementById("chk6");
  var chk7 = document.getElementById("chk7");
  var chk8 = document.getElementById("chk8");
  var chk9 = document.getElementById("chk9");
  var chk10 = document.getElementById("chk10");
  var chk11 = document.getElementById("chk11");
  var chk12 = document.getElementById("chk12");
  var chk13 = document.getElementById("chk13");
  var chk14 = document.getElementById("chk14");
  var chk15 = document.getElementById("chk15");
  var chk16 = document.getElementById("chk16");
  var chk17 = document.getElementById("chk17");
  var chk18 = document.getElementById("chk18");
  var chk19 = document.getElementById("chk19");
  var chk20 = document.getElementById("chk20");

  var chkValue = chk.checked ? "yes" : "no";
  var chk2Value = chk2.checked ? "yes" : "no";
  var chk3Value = chk3.checked ? "yes" : "no";
  var chk4Value = chk4.checked ? "yes" : "no";
  var chk5Value = chk5.checked ? "yes" : "no";
  var chk6Value = chk6.checked ? "yes" : "no";
  var chk7Value = chk7.checked ? "yes" : "no";
  var chk8Value = chk8.checked ? "yes" : "no";
  var chk9Value = chk9.checked ? "yes" : "no";
  var chk10Value = chk10.checked ? "yes" : "no";
  var chk11Value = chk11.checked ? "yes" : "no";
  var chk12Value = chk12.checked ? "yes" : "no";
  var chk13Value = chk13.checked ? "yes" : "no";
  var chk14Value = chk14.checked ? "yes" : "no";
  var chk15Value = chk15.checked ? "yes" : "no";
  var chk16Value = chk16.checked ? "yes" : "no";
  var chk17Value = chk17.checked ? "yes" : "no";
  var chk18Value = chk18.checked ? "yes" : "no";
  var chk19Value = chk19.checked ? "yes" : "no";
  var chk20Value = chk20.checked ? "yes" : "no";


  

//  console.log(value);
  var formData = $('form').serialize();
  formData += '&cname=' +cate_name+'&id=' +id+'&ckh='+ chkValue+ '&ckh2='+ chk2Value +'&ckh3='+ chk3Value+
   '&ckh4=' +chk4Value + '&ckh5=' +  chk5Value + '&ckh6=' +chk6Value+ '&ckh7=' +chk7Value + '&ckh8=' +chk8Value+
    '&ckh9=' +chk9Value+ '&ckh10=' +chk10Value+ '&ckh11=' +chk11Value+ '&ckh12=' +chk12Value+ '&ckh13='+chk13Value+
     '&ckh14='+chk14Value+ '&ckh15=' +chk15Value+ '&ckh16=' +chk16Value+ '&ckh17=' +chk17Value+ '&ckh18=' +chk18Value+ 
     '&ckh19=' +chk19Value+ '&ckh20=' +chk20Value;
  $.ajax({
    type: 'POST', 
    data: formData,
    url: 'visitor management/visitsub.php',                                                                                                                                          
    success: function (data) {
     
      if (data !=1) {
        alert("Entry Successfully");
       // console.warn(data);
       window.location.href = 'index.php';
      } else {
        alert("Entry Failed");
        window.location.href = 'index.php';
        //console.log(data);
      }
    }
  });
}
}

function cancel()
{
		$.ajax({
		type:"POST",
    url: 'index.php',
    success:function(data){
		$("#main_content").html(data);
		}
		})
	}
</script>



<script type="text/javascript">

function generateDynamicFields() {
 // debugger;

  var noPersons = document.getElementById("no_person").value;
  var setdetDiv = document.getElementById("setdet");

  
  setdetDiv.innerHTML = '';

  for (var i = 1; i <= noPersons; i++) {
    var dynamicField = document.createElement("div");

    dynamicField.innerHTML = "<label for='name" + i + "'>Name:</label> <br>" +
         "<input type='text' id='name" + i + "' name='name" + i + "' placeholder='Name' oninput='validateNameField(this)'><br>" +
          "<span id='name" + i + "Error' style='color: red; display: none;'>Invalid name: Only alphabetic characters and spaces are allowed.</span> <br><br>" +

                             "<label for='number" + i + "'>Contact Number:</label> <br>" +
                             "<input type='number' id='number" + i + "' name='number" + i + "' placeholder='Contact Number' oninput='validatePhoneNumberField(this)'> <br>" +
                             "<span id='number" + i + "Error' style='color: red; display: none;'>Invalid phone number: Should be between 10 and 15 digits.</span> <br><br>" +

                             "<label for='email" + i + "'>Email:</label> <br>" +
                             "<input type='email' id='email" + i + "' name='email" + i + "' placeholder='Email' oninput='validateEmailField(this)'> <br>" +
                             "<span id='email" + i + "Error' style='color: red; display: none;'>Invalid email address.</span> <br><br>";

    setdetDiv.appendChild(dynamicField);
  }
}

function validateDynamicFields() {
  var isValid = true;
  var noPersons = document.getElementById("no_person").value;

  for (var i = 1; i <= noPersons; i++) {
    var nameField = document.getElementById('name' + i);
    var phoneField = document.getElementById('number' + i);
    var emailField = document.getElementById('email' + i);

    if (!validateName(nameField.value)) {
      nameField.style.borderColor = "red";
      document.getElementById(nameField.id + "Error").style.display = "block";
      isValid = false;
    } else {
      nameField.style.borderColor = "";
      document.getElementById(nameField.id + "Error").style.display = "none";
    }

    if (!validatePhoneNumber(phoneField.value)) {
      phoneField.style.borderColor = "red";
      document.getElementById(phoneField.id + "Error").style.display = "block";
      isValid = false;
    } else {
      phoneField.style.borderColor = "";
      document.getElementById(phoneField.id + "Error").style.display = "none";
    }

    if (!validateEmail(emailField.value)) {
      emailField.style.borderColor = "red";
      document.getElementById(emailField.id + "Error").style.display = "block";
      isValid = false;
    } else {
      emailField.style.borderColor = "";
      document.getElementById(emailField.id + "Error").style.display = "none";
    }
  }

  return isValid;
}

// Validation rules
function validateName(name) {
  return /^[A-Za-z\s]+$/.test(name);
}

function validatePhoneNumber(phone) {
  return /^\d{10,12}$/.test(phone);
}

function validateEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}




</script>



 


