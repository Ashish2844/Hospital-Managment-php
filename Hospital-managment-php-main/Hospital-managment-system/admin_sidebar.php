<div class="head"><i class="fa-solid fa-hospital" style="font-size:30px;"></i> HMS</div>
<div class="side_menu">
<span>General</span>
<ul>
  <li><a href="admin_dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>  

<li><button class="btn btn-primary btn-lg dropdown-toggle" id="doc"><i class="fa-solid fa-user-doctor"></i>Doctors</button></li>
<div id="doc_content">
<ul>
         <li><a href="doctor_specialization.php">Doctors Specialization</a></li>
          <li><a href="add_doctor.php">Add Doctor</a></li>
          <li><a href="manage_doctor.php">Manage Doctors</a></li>
        </ul>
</div>

<br/>

<li><button class="btn btn-primary btn-lg dropdown-toggle" id="user" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fa-solid fa-user"></i>Users</button></li>
<div id="user_content">
       <ul>
         <li><a href="manage_user.php">Manage Users</a></li>
       </ul>
</div>

<br/>

<li><button class="btn btn-primary btn-lg dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="patient"><i class="fa-solid fa-hospital-user"></i>Patients</button></li>
<div id="pat_content">
       <ul>
         <li><a href="manage_patient.php">Manage Patients</a></li>
       </ul>
</div>


<li><div class="apoint_hist"><a href="admin_apoint_hist.php"><i class="fa fa-list-alt"></i>Appointment History</a></div></li>
</ul>

<div class="menu_live">
  <span>Live On</span>
  <ul>
    <li><a href="admin_chng_paswrd.php"><i class="fa fa-key"></i>Change Password</a></li>
    <li><form action="logic.php" method="post"><i class="fa fa-sign-out"></i><input type="submit" value="Logout" name="adlogout"></form></li>
  </ul>
</div>

</div>

<?php

if(!isset($_SESSION['user'])){
  header("Location:admin_index.php");
}

?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
 integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>

$("#doc").click(function(){
  $("#doc_content").slideToggle("");
});

</script>

<script>

$("#user").click(function(){
  $("#user_content").slideToggle("");
});

</script>

<script>

$("#patient").click(function(){
  $("#pat_content").slideToggle("");
});

</script>
