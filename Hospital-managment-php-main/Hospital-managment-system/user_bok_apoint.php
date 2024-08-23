<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<div class="sidebar">
  <?php 
  include "logic.php";
  include "user_sidebar.php";
   ?>
</div>


<div class="navb">
  <div class="bar">
<?php include "user_header.php"; ?>
</div>

<div class="data">

<h2 style="color:rgb(113,138,156);">User | Book Appointment</h2>

<form action="logic.php" method="post">
<div class="spclz">
  <label for="Doctorspecialization">Doctors Specialization</label>
  <select name="Doctorspecialization" class="form-control" onchange="getdoctor(this.value);" required>
    <option value="">Select Specialization</option>
    <?php 
     $myobj=new myselectquery2();
     $table2="doctors_specialization";

     $slct=$myobj->slctdt2($table2);

     if(isset($slct[0])){
      foreach($slct as $out){
        echo '
        <option value="'.$out['specialization'].'">
        '.$out['specialization'].'
       </option>';
      }
     }
     ?>
     </select>

     <div class="form-group">
									<label for="doctor">
										Doctors
									</label>
									<select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">	
            			<option value="">Select Doctor</option>
									</select>
								</div>
								<div class="form-group">
									<label for="consultancyfees">
										Consultancy Fees
									</label>
								<select name="fees" class="form-control" id="fees"  readonly>
								</select>
							</div>
              <div class="form-group">
									<label for="AppointmentDate">
										Date
									</label>
									<input type="date" class="form-control" name="appdate"  required="required" data-date-format="yyyy-mm-dd">
								</div>
								<div class="form-group">
									<label for="Appointmenttime">
										Time
									</label>
									<input type="time" class="form-control" name="apptime" id="time" required="required">eg : 10:00 PM
								</div>
								<button type="submit" name="submit" class="btn btn-o btn-primary">
									Submit
								</button>
							</form>
              
              
     
  
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>

function getdoctor(val){
  let doctor=document.getElementById("doctor");
  jQuery.ajax({
    type:'POST',
    url:'get_doctor.php',
    data:'specialization='+val,
    success:function(data){
      doctor.innerHTML=data;  
    }
  })
}
</script>

<script>

function getfee(val){
  let fees=document.getElementById("fees");
  jQuery.ajax({
    type:'POST',
    url:'get_doctor.php',
    data:'doctor='+val,
    success:function(data){
       fees.innerHTML=data;
    }
  })
}
</script>

</body>
</html>