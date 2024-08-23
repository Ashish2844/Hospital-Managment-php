<?php

include "logic.php";


if(isset($_POST['specialization'])){
  
   
  $spcl=$_POST['specialization'];
  $myobj=new myselectquery4();

  $content="doctor_name";
  $table1="doctors";
  $condition1="specialization='$spcl'";
  
  $slctt=$myobj->slctdt1($content,$table1,$condition1);
  
  if(isset($slctt[0])){
  
  echo '<option selected="selected">select doctor</option>';  

    foreach($slctt as $res){
     
     echo '
     <option value="'.$res['doctor_name'].'">
     '.$res['doctor_name'].'</option>     
     ';
   

    }
  }

}


if(isset($_POST['doctor'])){

  $doc=$_POST['doctor'];
  $myobj=new myselectquery4();
  
  $content="doc_fees";
  $table1="doctors";
  $condition1="doctor_name='$doc'";
  
  $slctf=$myobj->slctdt1($content,$table1,$condition1);
  
  if(isset($slctf[0])){
   
    foreach($slctf as $resf){
     
     echo '
     <option value="'.$resf['doc_fees'].'">
     '.$resf['doc_fees'].'</option>     
     ';
   
    }
  }

}


?>