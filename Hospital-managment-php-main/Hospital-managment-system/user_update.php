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

<h2 style="color:rgb(113,138,156);">User | Edit Profile</h2>

<div class="user_update">
<?php 
$email=$_SESSION['email'];

$myobj=new myselectquery1();

$table1="users";
$condition1="email='$email'";

$slct=$myobj->slctdt1($table1,$condition1);

if(isset($slct[0])){

  foreach($slct as $output){

    echo '
<input type="hidden" value="'.$output['email'].'" name="uemail">
<label>Name</label>
<input type="text" class="form-control" id="uname" name="uname" value="'.$output['fullname'].'">
<label>Address</label>
<input type="text" class="form-control" name="uadrs" id="uadrs" value="'.$output['address'].'">
<label>City</label>
<input type="text" class="form-control" name="ucity" id="ucity" value="'.$output['city'].'">
<label>Contact</label>
<input type="text" class="form-control" name="unumb" id="unumb" value="'.$output['number'].'">
<label>Gender</label>
<select name="ugender" id="ugender" value="'.$output['gender'].'">
  <option value="male">male</option>
  <option value="female">female</option>
</select><br/>
<label>Email</label><Br/>
<input type="text" class="form-control" disabled name="uemail" id="uemail" value="'.$output['email'].'">
<input type="submit" value="Update" class="btn btn-primary" onclick="update()">


    ';

  }
}

?>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

function update(){

  let uname=jQuery('#uname').val();
  let uadrs=jQuery('#uadrs').val();
  let ucity=jQuery('#ucity').val();
  let unumb=jQuery('#unumb').val();
  let ugender=jQuery('#ugender').val();
  let uemail=jQuery('#uemail').val();

  jQuery.ajax({
    type:'post',
    url:'logic.php',
    data:"uname="+uname+ "&uadrs="+uadrs+ "&ucity="+ucity+ "&unumb="+unumb+ "&ugender="+ugender+ "&uemail="+uemail,
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