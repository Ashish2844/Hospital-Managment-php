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

<div class="a">HMS | Admin Password Reset</div>

<div class="b">Please set your New password. </div>

<div class="c" id="c"></div>

<input type="text" placeholder="New Password" id="pswrdad"  name="pswrdad" required>

<input type="text" placeholder="Confirm Password " id="confpswrdad"  name="confpswrdad" required>

<input type="submit" value="Update" name="changead">

</form>

<div class="e">Already have an account yet? <a href="admin_index.php">Login</a></div>

<div class="f">HMS. All rights reserved</div>

</div>

</div>

</body>
</html>
<script>
function valid(){
let pswrdad=document.getElementById("pswrdad");
let confpswrdad=document.getElementById("confpswrdad");

if(pswrdad.value!=confpswrdad.value){
    alert("Password and Confirm password field doesnot match  !!");
    pswrdad.confpswrdad.focus();
    return false;
}

else{
    return true;
}
}
</script>
