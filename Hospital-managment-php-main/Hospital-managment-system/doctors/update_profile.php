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

<h1 style="color:rgb(113,138,156); margin-top:20px;">Doctors || Update Profile</h1>

<div class="doc_update">
<?php 
$email=$_SESSION['doc_email'];

$myobj=new myselectquery1();

$table1="doctors";
$condition1="doc_email='$email'";

$slct=$myobj->slctdt1($table1,$condition1);

if(isset($slct[0])){

  foreach($slct as $output){

    echo '
<input type="hidden" id="dc_email" value="'.$output['doc_email'].'" name="dc_email">
<label>Specialization</label>
<input type="text" class="form-control" name="doc_spcl" id="doc_spcl" value="'.$output['specialization'].'">
<label>Name</label>
<input type="text" class="form-control" name="doc_nam" id="doc_nam" value="'.$output['doctor_name'].'">
<label>City</label>
<input type="text" class="form-control" name="doc_addr" id="doc_addr" value="'.$output['address'].'">
<label>Fees</label>
<input type="text" class="form-control" name="doc_fes" id="doc_fes" value="'.$output['doc_fees'].'">
<label>Contact</label>
<input type="text" class="form-control" name="doc_cont" id="doc_cont" value="'.$output['contact'].'">
<label>Email id</label>
<input type="text" disabled class="form-control" name="doc_eml" id="doc_eml" value="'.$output['doc_email'].'">
<input type="submit" class="btn-o btn-primary" value="Update" onclick="docupdate()">
    ';

  }
}

?>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

function docupdate(){

  let doc_spcl=jQuery('#doc_spcl').val();
  let doc_nam=jQuery('#doc_nam').val();
  let doc_addr=jQuery('#doc_addr').val();
  let doc_fes=jQuery('#doc_fes').val();
  let doc_cont=jQuery('#doc_cont').val();
  let doc_eml=jQuery('#doc_eml').val();
  let dc_email=jQuery('#dc_email').val();

  jQuery.ajax({
    type:'POST',
    url:'../logic.php',
    data:"doc_spcl="+doc_spcl+ "&doc_nam="+doc_nam+ "&doc_addr="+doc_addr+ "&doc_fes="+doc_fes+  "&doc_cont="+doc_cont+ "&doc_eml="+doc_eml+ "&dc_email="+dc_email,
    success:function(result){
      alert("profile updated");
      // alert(result);
    }
  })

}

</script>

</div>
</div>


</body>
</html>