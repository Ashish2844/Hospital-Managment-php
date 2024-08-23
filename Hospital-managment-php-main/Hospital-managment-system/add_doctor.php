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

<h3 style="color:rgb(113,138,156)">Admin | Add Doctors</h3>

<div class="add_doctor">
  <form action="logic.php" method="post">
   <label>Doctor specialization</label>
   <select name="specialization" class="form-control" required>
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
    
     <label>Doctor Name</label>
     <input type="text" class="form-control" placeholder="Enter Doctor Name" name="doc_name" required>

     <label>Doctor Address</label>
     <textarea name="doc_adrs" class="form-control" placeholder="Enter Doctor Address" required></textarea>

     <label>Doctor consultancy Fees</label>
     <input type="text" class="form-control" placeholder="Enter Doctor Fees" name="doc_fees" required>
     
     <label>Doctor Contact No.</label>
     <input type="text" class="form-control" placeholder="Enter Doctor contact no." name="doc_contct" required>
     
     <label>Doctor Email</label>
     <input type="text" class="form-control" placeholder="Enter Doctor email" id="doc_email" name="doc_email" required onblur="checkemailavailability()">
     <span id="avail_status"></span><br/>

     <label>Password</label>
     <input type="text" class="form-control" placeholder="New Password" name="doc_pass" required>
     
     <label>Confirm Password</label>
     <input type="text" class="form-control" placeholder="Confirm Password" required>

     <input type="submit" class="btn btn-primary" value="Submit" name="doc_submit">
  </form>
</div>

</div>

</div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

function checkemailavailability(){
   
  let doc_email=jQuery('#doc_email').val();
  let avail_status=document.getElementById("avail_status");

  jQuery.ajax({
    type:'post',
    url:'check_availability.php',
    data:"doc_email="+doc_email,
    success:function(data){
      avail_status.innerHTML=data;
    }
  })
}

</script>



</body>
</html>