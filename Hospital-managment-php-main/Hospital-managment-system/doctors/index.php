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

<form action="../logic.php" method="post" class="form_login">

<div class="a">HMS | Doctor login</div>

<div class="b">Please enter your name and password to login. </div>

<div class="c" id="c"></div>

<input type="email" placeholder="email "  name="docname" required>

<input type="password" placeholder="password"  name="docpass" required>

<input type="submit" value="Login" name="doclogin">

</form>

<div class="d"><a href="forgot_pswrd.php">Forgot Password?</a></div>

<!-- <div class="e">Don't have an account yet? <a href="user_signup.php">Create an account</a></div> -->

<div class="f">HMS. All rights reserved</div>

</div>

</div>

</body>
</html>