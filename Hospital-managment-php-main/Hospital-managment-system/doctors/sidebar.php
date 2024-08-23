<div class="head"><i class="fa-solid fa-hospital" style="font-size:30px;"></i> HMS</div>
<div class="side_menu">
<span>General</span>
<ul>
  <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>  

<li><button class="btn btn-primary btn-lg dropdown-toggle" id="btn"><i class="fa-solid fa-hospital-user"></i>Patient</button></li>
<div id="list">
<ul>
         <li><a href="add_patient.php">Add Patient</a></li>
          <li><a href="manage_patient.php">Manage Patient</a></li>
        </ul>
</div>


<li>
  <div class="apoint_hist"><a href="apoint_hist.php"><i class="fa fa-list-alt"></i>My Appointments || Appointment History</a></div></li>
</ul>

<div class="menu_live">
  <span>Live On</span>
  <ul>
  <li><a href="search.php"><i class="fa-solid fa-magnifying-glass"></i>Search</a></li>
    <li><a href="chng_pswrd.php"><i class="fa fa-key"></i>Change Password</a></li>
    <li><form action="../logic.php" method="post"><i class="fa fa-sign-out"></i><input type="submit" value="Logout" name="doc_logout"></form></li>
  </ul>
</div>

</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"
 integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>

$("#btn").click(function(){
  $("#list").slideToggle("slow");
}); 

</script>


<?php

if(!isset($_SESSION['doc_email'])){
  header("Location:../doctors/index.php");
}

?> 