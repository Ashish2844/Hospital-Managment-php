<?php
include "../logic.php";

if(!empty($_POST['pat_email'])){
  $pt_email=$_POST['pat_email'];

  $myobj=new myselectquery4();

  $content="patient_email";
  $table1="patients";
  $condition1="patient_email='$pt_email'";

  $slct=$myobj->slctdt1($content,$table1,$condition1);
  
  if(isset($slct[0])){
    foreach($slct as $count){
     
      if($count['patient_email']>0){
        echo " Email already exists";
        // echo "<script>$('#submit').prop('disabled',true);</script>";
      }
    }
  }

  else{
    echo "Email available for Registration.";
    // echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}



?>