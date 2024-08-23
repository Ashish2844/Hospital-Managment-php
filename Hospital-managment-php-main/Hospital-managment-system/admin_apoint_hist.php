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
  include "admin_sidebar.php";
   ?>
</div>


<div class="navb">
  <div class="bar">
<?php include "admin_header.php"; ?>
</div>

<div class="data">

<h3 style="color:rgb(113,138,156)">Admin | Appointment History</h3>

<div class="hist">

<?php 
   
  $myobj=new myselectquery2();

  $table2="appointment";
  $count=1;

  
  $slct1=$myobj->slctdt2($table2);

   echo '<table class="data_table">';
   echo '
   <tr>
      <th>#</th>
      <th>Patient Name</th>
      <th>Patient Contact</th>
      <th>Doctor Name</th>
      <th>Specialization</th>
      <th>Consultancy Fees</th>
      <th>Appointment Date</th>
      <th>Appointment Time</th>
      <th>Current Status</th>
      <th>Action</th>
    </tr>
   ';
   if(isset($slct1[0])){
    foreach($slct1 as $app){

      if(($app['user_status']==1) && $app['doc_status']==1){
        $valu="Active";
        $act="No action yet";
      }

         if(($app['user_status']==0) && $app['doc_status']==1){
          $valu="Canceled by user";
          $act="Canceled";
        }

         if(($app['user_status']==1) && $app['doc_status']==0){
          $valu="Canceled by doctor";
          $act="canceled";
        }

  

      echo '
      <tr>
      <td>'.$count.'</td>
      <td>'.$app['user_name'].'</td>
      <td>'.$app['user_contact'].'</td>
      <td>'.$app['doctor_name'].'</td>
      <td>'.$app['specialization'].'</td>
      <td>'.$app['fees'].'</td>
      <td>'.$app['appoint_date'].'</td>
      <td>'.$app['appoint_time'].'</td>
      <td>'.$valu.'</td>
      <td>'.$act.'</td>
      </tr>
      ';
     
      $count=$count+1;
    }
}
    echo '</table>';
?>


</div>


</div>
</div>


</body>
</html>