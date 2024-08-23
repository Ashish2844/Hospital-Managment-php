<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
 
<div class="whole">
<div class="box">

<form action="../logic.php" method="post" class="form_login" onsubmit="return valid();">

<div class="a">HMS | Doctor Password Reset</div>

<div class="b">Please set your New password. </div>

<div class="c" id="c"></div>

<input type="text" placeholder="New Password" id="pswrd"  name="pswrd" required>

<input type="text" placeholder="Confirm Password " id="confpswrd"  name="confpswrd" required>

<input type="submit" value="Update" name="pchange">

</form>

<div class="e">Already have an account yet? <a href="index.php">Login</a></div>

<div class="f">HMS. All rights reserved</div>

</div>

</div>

</body>
</html>
<script>
function valid(){
let pswrd=document.getElementById("pswrd");
let confpswrd=document.getElementById("confpswrd");

if(pswrd.value!=confpswrd.value){
    alert("Password and Confirm password field doesnot match  !!");
    pswrd.confpswrd.focus();
    return false;
}

else{
    return true;
}
}
</script>
