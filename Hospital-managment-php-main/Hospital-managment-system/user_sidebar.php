<div class="head"><i class="fa-solid fa-hospital" style="font-size:30px;"></i> HMS</div>
<div class="side_menu">
<span>General</span>
<ul>
  <li><a href="user_dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>  

  <li><a href="user_bok_apoint.php"><i class="fa fa-copy"></i>Book Appointment</a></li>
  <li><a href="user_apoint_hist.php"><i class="fa fa-list-alt"></i>Appointment History</a></li>
  <li><a href="user_medhist.php"><i class="fa fa-line-chart"></i>Medical History</a></li>
</ul>

<Br/>
<div class="menu_live">
  <span>Live On</span>
  <ul>
    <li><a href="user_update.php"><i class="fa fa-cogs"></i> My Profile</a></li>
    <li><a href="user_chng_paswrd.php"><i class="fa fa-key"></i>Change Password</a></li>
    <li><form action="logic.php" method="post"><i class="fa fa-sign-out"></i><input type="submit" value="Logout" name="logout"></form></li>
  </ul>
</div>
</div>

<?php

if(!isset($_SESSION['email'])){
  header("Location:index.php");
}

?>