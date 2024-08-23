<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="sidebar">
  <?php 
  include "logic.php";
  include "admin_sidebar.php";
   ?>
</div>


<div class="navb">
  <div class="bar">
<?php include "admin_header.php"; ?>
</div>

<div class="data">

<div class="numbs">

<div class="count">
<span>
  <i class="fa-solid fa-users-line"></i>
  <h5>Total users</h5></span>
<?php
$myobj=new myselectquery5();
$count="COUNT(id)";
$table5="users";
$slct5=$myobj->slctdt5($count,$table5);
if(isset($slct5[0])){
  foreach($slct5 as $cnt){
    echo $cnt['COUNT'];
  }
}
?>
</div>


<div class="count">
<span>
  <i class="fa-solid fa-user-doctor"></i>
  <h5>Total Doctors</h5></span>
<?php
$myobj=new myselectquery5();
$count="COUNT(id)";
$table5="doctors";
$slct5=$myobj->slctdt5($count,$table5);
if(isset($slct5[0])){
  foreach($slct5 as $cnt){
    echo $cnt['COUNT'];
  }
}
?>
</div>

<div class="count">
<span>
  <i class="fa fa-list-alt"></i>
  <h5>Total Appointments</h5></span>
<?php
$myobj=new myselectquery5();
$count="COUNT(id)";
$table5="appointment";
$slct5=$myobj->slctdt5($count,$table5);
if(isset($slct5[0])){
  foreach($slct5 as $cnt){
    echo $cnt['COUNT'];
  }
}
?>
</div>

<div class="count">
<span><i class="fa-solid fa-hospital-user"></i><h5>Total Patients</h5></span>
<?php
$myobj=new myselectquery5();
$count="COUNT(id)";
$table5="patients";
$slct5=$myobj->slctdt5($count,$table5);
if(isset($slct5[0])){
  foreach($slct5 as $cnt){
    echo $cnt['COUNT'];
  }
}
?>
</div>

</div>

</div>

</div>

</div>

</body>
</html>