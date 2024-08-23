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

<div class="a">Admin | Sign in to your account</div>

<div class="b">Please enter your name and password to login. </div>

<div class="c" id="c"></div>

<input type="text" placeholder="username"  name="adname" required>

<input type="password" placeholder="password"  name="adpass" required>

<input type="submit" value="Login" name="adlogin">

</form>

<div class="d"><a href="admin_forgot_pswrd.php">Forgot Password?</a></div>

<div class="f">HMS. All rights reserved</div>

</div>

</div>
</body>
</html>