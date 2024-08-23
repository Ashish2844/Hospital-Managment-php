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
<h2 style="color:rgb(113,138,156); margin-top:20px;">User | Appointment History</h2>
<div class="hist">

<?php 
   
   $email=$_SESSION['email'];

  $myobj=new myselectquery1();

  $table1="appointment";
  $condition1="user_email='$email'";
  $count=1;

  
  $slct1=$myobj->slctdt1($table1,$condition1);
  echo '<table class="data_table">
      <tr>
      <th>#</th>
      <th>Doctor Name</th>
      <th>Specialization</th>
      <th>Consultancy Fees</th>
      <th>Appointment Date</th>
      <th>Appointment Time</th>
      <th>Current Status</th>
      <th>Action</th>
    </tr>  
    ';
    foreach($slct1 as $fin){

      if(($fin['user_status']==1) && $fin['doc_status']==1){
        $val="Active";
      }

        if(($fin['user_status']==0) && $fin['doc_status']==1){
          $val="Canceled by you";
        }

        if(($fin['user_status']==1) && $fin['doc_status']==0){
          $val="Canceled by doctor";
        }
           
      echo '
      <tr>
      <td>'.$count.'</td>
      <td>'.$fin['doctor_name'].'</td>
      <td>'.$fin['specialization'].'</td>
      <td>'.$fin['fees'].'</td>
      <td>'.$fin['appoint_date'].'</td>
      <td>'.$fin['appoint_time'].'</td>
      <td>'.$val.'</td>
      <td><form action="#" method="post">
      <input type="submit" class="btn btn-primary" name="cancel" value="cancel" onclick="return check()">
      </form>
      </td>
      </tr>
      ';
     
      $count=$count+1;
    }
    echo '</table>';
?>

<?php

if(isset($_POST['cancel'])){

  $iddoc=$_SESSION['id'];

  $myobj=new myupdatequery();

  $table="appointment";
  $set="user_status='0'";
  $onbasis="id='$iddoc'";

  $update=$myobj->updtdt($table,$set,$onbasis);

  if($update=="updated"){
    header("Location:user_apoint_hist.php");
  }

  else{
    echo "failed";
  }

}

?>

<script>

function check(){

  return confirm('Are you sure you want to cancel');
  
}

</script>

</div>


</div>
</div>


</body>
</html>