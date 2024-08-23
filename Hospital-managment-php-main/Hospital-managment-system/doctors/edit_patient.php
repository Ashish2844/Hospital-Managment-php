<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<div class="sidebar">
<div class="head">HMS</div>
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

<h1 style="color:rgb(113,138,156); margin-top:20px;">Doctors || Edit Patients</h1>

<div class="edp">
<?php 
if(isset($_GET['id'])){
  $id=$_GET['id'];

$myobj=new myselectquery1();

$table1="patients";
$condition1="id='$id'";

$slct=$myobj->slctdt1($table1,$condition1);

if(isset($slct[0])){

  foreach($slct as $output){

    echo '
<input type="hidden" value="'.$output['email'].'" name="uemail">
<label>Patient Name</label>
<input type="text" class="form-control" id="pname" name="pname" value="'.$output['patient_name'].'">
<label>Patient Contact</label>
<input type="text" class="form-control" name="pcont" id="pcont" value="'.$output['patient_contact'].'">
<label>Patient Email</label>
<input type="text" class="form-control" name="pemail" id="pemail" disabled value="'.$output['email'].'">
<label>Patient Gender</label>
<select name="pgender" id="pgender" value="'.$output['patient_gender'].'">
  <option value="male">male</option>
  <option value="female">female</option>
</select>
<label>Patient Address</label>
<input type="text" class="form-control" name="padrs" id="padrs" value="'.$output['patient_address'].'">
<label>Patient Age</label>
<input type="text" class="form-control" name="page" id="page" value="'.$output['patient_age'].'">
<label>Medical History</label>
<input type="text" class="form-control" name="medhist" id="medhist" value="'.$output['medical_history'].'">
<label>Reg. Date</label>
<input type="text" class="form-control" name="pdate" id="pdate" disabled value="'.$output['creation_date'].'">
<input type="submit" style="margin-top:20px;" class="btn btn-primary" value="Update" onclick="update(this.value)">
    ';

  }
}

}
?>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

function update(g){

  let pname=jQuery('#pname').val();
  let pcont=jQuery('#pcont').val();
  let pemail=jQuery('#pemail').val();
  let pgender=jQuery('#pgender').val();
  let padrs=jQuery('#padrs').val();
  let page=jQuery('#page').val();
  let medhist=jQuery('#medhist').val();
  let pdate=jQuery('#pdate').val();
  
  jQuery.ajax({
    type:'post',
    url:'logic.php',
    data:"pname="+pname+ "&pcont="+pcont+ "&pemail="+pemail+ "&pgender="+pgender+ "&padrs="+page+ "&medhist="+medhist+ "&pdate="+pdate,
    success:function(result){
      alert("profile updated");
    }
  })

}

</script>

</div>
</div>


</body>
</html>