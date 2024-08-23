<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
 
<div class="whole">
<div class="box">

<form action="logic.php" method="post" class="form_login" onsubmit="return valid();">

<div class="a">HMS | Patient Password Reset</div>

<div class="b">Please set your New password. </div>

<div class="c" id="c"></div>

<input type="text" placeholder="New Password" id="pswrdur"  name="pswrdur" required>

<input type="text" placeholder="Confirm Password " id="confpswrdur"  name="confpswrdur" required>

<input type="submit" value="Update" name="urchange">

</form>

<div class="e">Already have an account yet? <a href="index.php">Login</a></div>

<div class="f">HMS. All rights reserved</div>

</div>

</div>

</body>
</html>
<script>
function valid(){
let pswrdur=document.getElementById("pswrdur");
let confpswrdur=document.getElementById("confpswrdur");

if(pswrdur.value!=confpswrdur.value){
    alert("Password and Confirm password field doesnot match  !!");
    pswrdur.confpswrdur.focus();
    return false;
}

else{
    return true;
}
}
</script>
