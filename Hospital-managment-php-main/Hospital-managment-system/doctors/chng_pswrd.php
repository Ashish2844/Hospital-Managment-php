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

<h1 style="color:rgb(113,138,156);">Change Password</h1>
 
<div class="chng">
 
 <form action="logic.php" method="post" onsubmit="return valid()">
  <label>Current Password</label>
  <input type="text" class="form-control" id="current" name="current">

  <label>New Password</label>
  <input type="text" class="form-control" id="newpass" name="newpass">

  <label>Confirm Password</label>
  <input type="text" class="form-control" id="confpass" name="confpass">

  <input type="submit" value="submit" name="doc_change" class="btn btn-o btn-primary">
 </form>

</div>

</div>

</div>

<script>

 function valid(){
  
  let current1=document.getElementById("current");
  let newpass1=document.getElementById("newpass");
  let confpass1=document.getElementById("confpass");
  
  if(current1.value==""){
    alert("current password field is empty !!");
    current1.focus();
    return false;
  }

  else if(newpass1.value==""){
    alert("new password field is empty !!");
    newpass1.focus();
    return false;
  }

  else if(confpass1.value==""){
    alert("confirm password field is empty !!");
    confpass1.focus();
    return false;
  }

  else if(newpass1.value!=confpass1.value){
    alert("new password and confirm password field do not match !!");
    confpass1.focus();
    return false;
  }

  else{
    return true;}
 }

</script>

<script>

  alert('<?php  
  echo $_SESSION['msgd'];
  unset($_SESSION['msgd']); 
  ?>');


</script>

</body>
</html>