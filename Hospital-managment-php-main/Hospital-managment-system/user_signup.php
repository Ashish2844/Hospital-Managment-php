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
<div class="signup_box">

<div class="a">HMS | Patient Registration</div>

<div class="b">Enter your personal details below. </div>
<form id="addform">
<input type="text" placeholder="Full name" id="fname" name="fname" required>

<input type="text" placeholder="Address" id="adrs" name="adrs" required>

<input type="text" placeholder="City" id="city" name="city" required>

<input type="number" placeholder="Number" id="numb" name="numb" required>

<div class="c">
<label>Gender</label><br/>
<input type="radio" value="Male" id="male1" name="gender"><label for="male1">Male</label>
<input type="radio" value="Female" id="female1" name="gender"><label for="female1">Female</label>
</div>

<input type="email" placeholder="Email" id="email" name="email">

<input type="password" placeholder="password" id="spass" name="spass">

<input type="password" placeholder="password agian" id="spassa" name="spassa">

<input type="submit" value="Submit" id="submitt">
<div id="error_msg" style="color:red;"></div>
</form>

<div class="d">Already have an account?<a href="index.php">Log-in</a></div>

<div class="e">HMS. All rights reserved</div>


</div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

$(document).ready(function(){
  $('#submitt').on("click",function(e){
    e.preventDefault();
  let fname=jQuery('#fname').val();
  let adrs=jQuery('#adrs').val();
  let city=jQuery('#city').val();
  let numb=jQuery('#numb').val();
  let gender=$('input[name="gender"]:checked').val();
  let email=jQuery('#email').val();
  let spass=jQuery('#spass').val();
  
  if(fname=="" || adrs=="" || city=="" || numb=="" || gender=="" || email=="" || spass==""){
    $("#error_msg").html("all fields are required").slideDown();
   }

  else{
  $.ajax({
    type:"POST",
    url:"logic.php",
    data:{fname:fname, adrs:adrs, city:city,
       numb:numb, gender:gender, email:email, spass:spass},
       success:function(result){
        alert(result);
        $("#addform").trigger("reset");
       }
  })
  }
  })
})


function submit(){


  let fname=jQuery('#fname').val();
  let adrs=jQuery('#adrs').val();
  let city=jQuery('#city').val();
  let numb=jQuery('#numb').val();
  let gender=$('input[name="gender"]:checked').val();
  let email=jQuery('#email').val();
  let spass=jQuery('#spass').val();

   if(fname=="" || adrs=="" || city=="" || numb=="" || gender=="" || email=="" || spass==""){
    $("#error_msg").html("all fields are required").slideDown();
   }

   else{
    jQuery.ajax({
    type:'post',
    url:'logic.php',
    data:"fname="+fname+ "&adrs="+adrs+ "&city="+city+ "&numb="+numb+ "&gender="+gender+ "&email="+email+ "&spass="+spass,
     success:function(result){
      alert(result);
     }
  })
   }
 
}

</script>




</body>
</html>