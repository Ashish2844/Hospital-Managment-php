<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="sidebar">
  <?php 
  include "../logic.php";
  include "sidebar.php";
   ?>
</div>


<div class="navb">
  <div class="bar">
<?php include "header.php"; ?>
</div>

<div class="data">
      
<div class="add_pat">
<h3>Add Doctor</h3>

<form action="../logic.php" method="post">
  <label>Patient Name</label>
  <input type="text" class="form-control" id="pat_name" name="pat_name" placeholder="Enter Patient Name" required>


  <label>Patient Contact No.</label>
  <input type="number" class="form-control" id="pat_cont" name="pat_cont" placeholder="Enter Patient Contact no." required>


  <label>Patient Email</label>
  <input type="email" class="form-control" id="pat_email" name="pat_email" placeholder="Enter Patient email id" required onblur="user_availability()">
  <span id="userstatus"></span>


  <label>Gender</label><br/>
  <input type="radio" name="pat_gend" value="male" id="pat_gend"><label for="male">Male</label>
  <input type="radio" name="pat_gend" value="female" id="pat_gend"><label for="female">Female</label>

  <br/>
  <label>Patient Address</label>
  <textarea class="form-control" id="pat_adrs" name="pat_adrs" rows="3" placeholder="Enter Patient Address" required></textarea>


 <label>Patient Age</label>
  <input type="number" class="form-control" id="pat_age" name="pat_age" placeholder="Enter Patient Age" required>


  <label>Medical History</label>
  <textarea class="form-control" id="pat_hist"  name="pat_hist" rows="3" placeholder="Enter Patient Medical history (if any)"></textarea>
  
<input type="submit" class="btn o btn-primary" value="Add" name="add_patient">

</form>
</div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script>

function user_availability(){

  let pat_email=jQuery('#pat_email').val();
  let userstatus=document.getElementById("userstatus");

  jQuery.ajax({
    type:'post',
    url:'check_availability',
    data:"pat_email="+pat_email,
    success:function(data){
      userstatus.innerHTML=data;
    }
  })
}


</script>
</body>
</html>