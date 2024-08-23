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

<form action="logic.php" method="post" class="form_login">

<div class="a">HMS | Patient Login</div>

<div class="b">Please enter your name and password to login. </div>

<div class="c" id="c"></div>

<input type="text" placeholder="username" id="uname" name="uname" required>

<input type="password" placeholder="password" id="upass" name="upass" required>

<input type="submit" value="Login" name="login">

</form>

<div class="d"><a href="user_forgot_pswrd.php">Forgot Password?</a></div>

<div class="e">Don't have an account yet? <a href="user_signup.php">Create an account</a></div>

<div class="f">HMS. All rights reserved</div>

</div>

</div>


<!-- Not required here -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

function login(){

  let uname=jQuery('#uname').val();
  let upass=jQuery('#upass').val();

  jQuery.ajax({
    type:'post',
    url:'logic.php',
    data:"uname="+uname+ "&upass="+upass,
    success:function(result){
      window.location.href="user_profile.php";
    }
  })

}


</script> -->

</body>
</html>