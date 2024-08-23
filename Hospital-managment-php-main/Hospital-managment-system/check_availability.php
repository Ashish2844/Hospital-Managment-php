<?php
include "logic.php";

if(!empty($_POST['doc_email'])){
  $dc_email=$_POST['doc_email'];

  $myobj=new myselectquery4();

  $content="doc_email";
  $table1="doctors";
  $condition1="doc_email='$dc_email'";

  $slct=$myobj->slctdt1($content,$table1,$condition1);
  
  if(isset($slct[0])){
    foreach($slct as $count){
     
      if($count['doc_email']>0){
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