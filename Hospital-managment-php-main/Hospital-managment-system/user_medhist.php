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
  include "user_sidebar.php";
   ?>
</div>


<div class="navb">
  <div class="bar">
<?php include "user_header.php"; ?>
</div>

<div class="data">

<h3 style="color:rgb(113,138,156)">User | Medical History</h3>

<h5 style="color:rgb(113,138,156)">View medical history</h5>
   
<div class="doc_spclz">

<?php

$emailmh=$_SESSION['email'];

$myobj=new myselectquery1();

$table1="patients";
$condition1="email='$emailmh'";
$cnt=1;

$slct=$myobj->slctdt1($table1,$condition1);

if(isset($slct[0])){
 
  foreach($slct as $get){
     
    echo '
    <table class="table table-bordered" border="2">
  <tr align="center"><td colspan="4" style="color:darkblue; font-weight:bold; font-size:20px;">Patient Details</td></tr>
  <tr>
  <th>Patient Name</th>
  <td>'.$get['patient_name'].'</td>
  <th>Patient Email</th>
  <td>'.$get['email'].'</td>
</tr>
<tr>
  <th>Patient Contact</th>
  <td>'.$get['patient_contact'].'</td>
  <th>Patient Address</th>
  <td>'.$get['patient_address'].'</td>
</tr>
<tr>
  <th>Patient Gender</th>
  <td>'.$get['patient_gender'].'</td>
  <th>Patient Age</th>
  <td>'.$get['patient_age'].'</td>
</tr>
<tr>
  <th>Patient Medical History (if any)</th>
  <td>'.$get['medical_history'].'</td>
  <th>Patient Reg. Date</th>
  <td>'.$get['creation_date'].'</td>
</tr>
</table>
    ';
    $cnt=$cnt+1;
  } 
  
}

else{
    echo '<h4 style="color:rgb(113,138,156)">NO History</h4>';
}
 
?>
</div>
</div>
</div>
</div>

</body>
</html>