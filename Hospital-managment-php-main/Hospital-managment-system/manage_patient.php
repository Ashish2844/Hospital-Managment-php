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

<h3 style="color:rgb(113,138,156)">Admin | Manage Patients</h3>
   
<div class="doc_spclz">

<?php
 
$myobj=new myselectquery2();

$table2="patients";
$cnt=1;

$slct=$myobj->slctdt2($table2);

if(isset($slct[0])){
  echo '<table class="data_table">';
  echo '
    <tr>
    <th>#</th>
    <th>Patient Name</th>
    <th>Contact no.</th>
    <th>Patient Gender</th>
    <th>Address</th>
    <th>Creation Date</th>
    <th>Action</th>
    </tr>
  ';
  foreach($slct as $get){
    
    echo '
    <tr>
    <td>'.$cnt.'</td>
    <td>'.$get['patient_name'].'</td>
    <td>'.$get['patient_contact'].'</td>
    <td>'.$get['patient_gender'].'</td>
    <td>'.$get['patient_address'].'</td>
    <td>'.$get['creation_date'].'</td>
    <td><a href="view_patient.php?idv='.$get['id'].'"><button><i class="fa-regular fa-eye"></i></button></a></td>
    </tr>   
    ';
    $cnt=$cnt+1;
  } 

  echo '</table>';
}

?>
</div>
</div>
</div>
</div>

</body>
</html>