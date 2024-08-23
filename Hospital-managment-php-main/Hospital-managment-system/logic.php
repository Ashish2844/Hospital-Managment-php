<?php

session_start();

class mydb{

  private $host;
  private $username;
  private $password;
  private $dbname;

  function dbconct(){
         
      $this->host="127.0.0.1";
      $this->username="root";
      $this->password="";
      $this->dbname="hosp";
    
      $myconn=new mysqli($this->host,$this->username,$this->password,$this->dbname);

      return $myconn;
   
        }

  }



  class myinsertquery extends mydb{
   
    public function insrtdt($table,$field,$value){
       
      $data="INSERT INTO $table ($field) VALUES ($value)";
      
      $insert_query=$this->dbconct()->query($data);

     if($insert_query){
      return "inserted";
     }
    }
  }

  class myselectquery extends mydb{
   
    public function slctdt($tables,$condition){

      $datas="SELECT * FROM $tables WHERE $condition";

      $slct_query=$this->dbconct()->query($datas);

      if($slct_query->num_rows>0){

         $result1=$slct_query->fetch_assoc();
         
         $_SESSION['email']=$result1['email'];

         $_SESSION['name']=$result1['fullname'];

         $_SESSION['number']=$result1['number'];

         $_SESSION['user']=$result1['username'];

         $_SESSION['id']=$result1['id'];

         $_SESSION['doc_name']=$result1['doctor_name'];

         $_SESSION['doc_email']=$result1['doc_email'];

         $_SESSION['contact']=$result1['contact'];
         
        return "selected";
      }
    }
    
  }

  class myselectquery1 extends mydb{

    public function slctdt1($table1,$condition1){
      
      $data1="SELECT * FROM $table1 WHERE $condition1";
    
      $slct_query1=$this->dbconct()->query($data1);
        
      if($slct_query1->num_rows>0){
       
        while($getrow=$slct_query1->fetch_assoc()){
          $getresult[]=$getrow;                            
        }
        return $getresult;
      }
    }
  }
  

  class myselectquery4 extends mydb{

    public function slctdt1($content,$table1,$condition1){
      
      $data1="SELECT $content FROM $table1 WHERE $condition1";
     
      $slct_query4=$this->dbconct()->query($data1);
       
      if($slct_query4->num_rows>0){
       
        while($getrow=$slct_query4->fetch_assoc()){
          $getresult[]=$getrow;
        }
        return $getresult;
      }
    }
  }

  class myselectquery6 extends mydb{

    public function slctdt1($content,$table1,$condition1){
      
      $data1="SELECT $content FROM $table1 WHERE $condition1";
           
      $slct_query1=$this->dbconct()->query($data1);
       
      if($slct_query1){
        return "checkselected";
      }
    }
  }

  class myselectquery2 extends mydb{
    public function slctdt2($table2){
      $data2="SELECT * FROM $table2";
      $slct_query2=$this->dbconct()->query($data2);
      if($slct_query2->num_rows>0){
       while($final=$slct_query2->fetch_assoc()){
          $getfinal[]=$final;
       }
       return $getfinal;
      }
    }
  }

  class myupdatequery extends mydb{
    public function updtdt($table,$set,$onbasis){
      $data="UPDATE $table SET $set WHERE $onbasis";
      $updt_query=$this->dbconct()->query($data);
      if($updt_query){
        return "updated";
      }
    }
  }

  class myselectquery5 extends mydb{
    public function slctdt5($count,$table5,){
      $data5="SELECT $count AS COUNT FROM $table5";

      $slct_query5=$this->dbconct()->query($data5);
      if($slct_query5->num_rows>0){
        while($count=$slct_query5->fetch_assoc()){
          $getcount[]=$count;
        }
        return $getcount;
      }
    }
  }

  class mydeletequery extends mydb{
    public function dltdt($table,$condition){
      $data="DELETE FROM $table WHERE $condition";

      $delete_query=$this->dbconct()->query($data);
      if($delete_query){
        return "deleted";
      }
    }
  }

  
  if(isset($_POST['fname']) && isset($_POST['adrs'])){
  $fname=$_POST['fname'];
  $adrs=$_POST['adrs'];
  $city=$_POST['city'];
  $numb=$_POST['numb'];
  $email=$_POST['email'];
  $spass=$_POST['spass'];
  $gender=$_POST['gender'];

  $myobj=new myinsertquery();

  $table="users";
  $field="id,fullname,address,city,number,gender,email,password,date";
  $value="null,'$fname','$adrs','$city','$numb','$gender','$email','$spass',null";
  
  $insrt=$myobj->insrtdt($table,$field,$value);

  if($insrt=="inserted"){

    echo "You Are Registered";
  }

  }


 if(isset($_POST['login'])){
  $uname=$_POST['uname'];
  $upass=$_POST['upass'];
  
  $myobj1=new myselectquery();

  $tables="users";
  $condition="email='$uname' AND password='$upass'";

  $slct=$myobj1->slctdt($tables,$condition);
 
  if($slct=="selected"){
      header("Location:user_dashboard.php");
  }
     
  else{
    echo "<script>alert('email or password is wrong')</script>";
      echo "<script>window.location.href='index.php'</script>";
  }
  }
 

  
 if(isset($_POST['logout'])){
  
  unset($_SESSION['email']);
  unset($_SESSION['fullname']);
  unset($_SESSION['number']);
  header("Location:index.php");
 }

if(isset($_POST['uname']) && isset($_POST['uadrs']) && isset($_POST['ucity']) && isset($_POST['unumb']) && isset($_POST['ugender']) && isset($_POST['uemail'])){
  $uemail=$_POST['uemail'];
  $uname=$_POST['uname'];
  $uadrs=$_POST['uadrs'];
  $ucity=$_POST['ucity'];
  $unumb=$_POST['unumb'];
  $ugender=$_POST['ugender'];
  $uemail=$_POST['uemail'];

  $myobj2=new myupdatequery();

  $table="users";
  $set="fullname='$uname',address='$uadrs',city='$ucity',number='$unumb',gender='$ugender',email='$uemail'";
  $onbasis="email='$uemail'";

  $updt=$myobj2->updtdt($table,$set,$onbasis);

  if($updt=="updated"){
    echo "updated";
  }
}

if(isset($_POST['submit'])){
  $specialization=$_POST['Doctorspecialization'];
  $doctor=$_POST['doctor'];
  $fees=$_POST['fees'];
  $appdate=$_POST['appdate'];
  $apptime=$_POST['apptime'];

  $email=$_SESSION['email'];

  $name=$_SESSION['name'];

  $contact=$_SESSION['number'];
  
  $myobj3=new myinsertquery();

  $table="appointment";
  $field="id,user_name,user_email,user_contact,specialization,doctor_name,fees,appoint_date,appoint_time,user_status,doc_status";
  $value="NULL,'$name','$email','$contact','$specialization','$doctor','$fees','$appdate','$apptime','1','1'";

  $insert1=$myobj3->insrtdt($table,$field,$value);
  
  if($insert1=="inserted"){
    echo "<script>alert('Appointment has been booked')</script>";
    echo "<script>window.location.href='user_bok_apoint.php'</script>";
  }

}


if(isset($_POST['change'])){
  $current=$_POST['current'];
  $newpass=$_POST['newpass'];
  $confpass=$_POST['confpass'];
  $email=$_SESSION['email'];
  
  if($newpass!=$confpass){
    echo "<script> alert('confirm password is not match !!')</script>";
  }

  else{
   
    $myobj5=new myselectquery1();

    $table1="users";
    $condition1="password='$current' AND email='$email'";

    $slct5=$myobj5->slctdt1($table1,$condition1);

    if(isset($slct5[0])){
             
      $myobj6=new myupdatequery();
      $table="users";
      $set="password='$newpass'";
      $onbasis="password='$current' AND email='$email'";

      $update6=$myobj6->updtdt($table,$set,$onbasis);

      if($update6=="updated"){
        $_SESSION['msg']="updated";
        header("Location:user_chng_paswrd.php");
      }
    }

    else{
      $_SESSION['msg']="current password is not correct";
       header("Location:user_chng_paswrd.php");
    }

  }

}


if(isset($_POST['adlogin'])){
  $adname=$_POST['adname'];
  $adpass=$_POST['adpass'];

  $myobj7=new myselectquery();

  $tables="admin";
  $condition="username='$adname' AND password='$adpass'";

  $slct7=$myobj7->slctdt($tables,$condition);

  if($slct7=="selected"){
    header("Location:admin_dashboard.php");
  }

  else{
    echo "<script>alert('username or password is wrong')</script>";
    echo "<script>window.location.href='admin_index.php'</script>";
  }
 }

 if(isset($_POST['adlogout'])){
  
  unset($_SESSION['user']);
  unset($_SESSION['id']);
  header("Location:admin_index.php");
 }


 if(isset($_GET['idd'])){
  $idd=$_GET['idd'];

  $myobj=new mydeletequery();

  $table="doctors_specialization";
  $condition="id='$idd'";

  $delete=$myobj->dltdt($table,$condition);

  if($delete=="deleted"){
    $_SESSION['msg1']="Deleted";
    header("Location:doctor_specialization.php");
  }
 }


 if(isset($_POST['adds'])){
  $addspcl=$_POST['addspcl'];

  $myobj=new myinsertquery();

  $table="doctors_specialization";
  $field="id,specialization,creation_date";
  $value="null,'$addspcl',null";

  $insrt2=$myobj->insrtdt($table,$field,$value);
  if($insrt2=="inserted"){
    $_SESSION['msg2']="Doctos Specializaiton added";
    header("Location:doctor_specialization.php");
  }
 }

 if(isset($_POST['doc_submit'])){
  $specialization=$_POST['specialization'];
  $doc_name=$_POST['doc_name'];
  $doc_adrs=$_POST['doc_adrs'];
  $doc_fees=$_POST['doc_fees'];
  $doc_contct=$_POST['doc_contct'];
  $doc_email=$_POST['doc_email'];
  $doc_pass=$_POST['doc_pass'];

  $myobj=new myinsertquery();

  $table="doctors";
  $field="id,specialization,doctor_name,address,doc_fees,contact,doc_email,doc_password,creation_date";
  $value="null,'$specialization','$doc_name','$doc_adrs','$doc_fees','$doc_contct','$doc_email','$doc_pass',null";

  $insrt3=$myobj->insrtdt($table,$field,$value);

  if($insrt3=="inserted"){
    echo "<script>alert('Doctor has been added')</script>";
    echo "<script>window.location.href='add_doctor.php'</script>";
  }
 }

 if(isset($_GET['idd'])){
  $idd=$_GET['idd'];
  $myobj=new mydeletequery();
  $table="doctors";
  $condition="id='$idd'";
  $delete=$myobj->dltdt($table,$condition);
  if($delete=="deleted"){
    $_SESSION['msg4']="Deleted";
    header("Location:manage_doctor.php");
  }
 }

 if(isset($_GET['idd'])){
  $idd=$_GET['idd'];
  $myobj=new mydeletequery();
  $table="users";
  $condition="id='$idd'";
  $delete=$myobj->dltdt($table,$condition);
  if($delete=="deleted"){
    $_SESSION['msg5']="User Deleted";
    header("Location:manage_user.php");
  }
 }

 
 if(isset($_POST['admin_change'])){
  $current=$_POST['current'];
  $newpass=$_POST['newpass'];
  $confpass=$_POST['confpass'];
  $user=$_SESSION['username'];
  
  if($newpass!=$confpass){
    echo "<script> alert('confirm password is not match !!')</script>";
  }

  else{
   
    $myobj5=new myselectquery1();

    $table1="admin";
    $condition1="password='$current' AND username='$user'";

    $slct5=$myobj5->slctdt1($table1,$condition1);

    if(isset($slct5[0])){
             
      $myobj6=new myupdatequery();
      $table="admin";
      $set="password='$newpass'";
      $onbasis="password='$current' AND username='$user'";

      $update6=$myobj6->updtdt($table,$set,$onbasis);

      if($update6=="updated"){
        $_SESSION['msga']="updated";
        header("Location:admin_chng_paswrd.php");
      }
    }

    else{
      $_SESSION['msga']="current password is not correct";
       header("Location:admin_chng_paswrd.php");
    }

  }

}


//  Doctors

if(isset($_POST['doclogin'])){
  $docname=$_POST['docname'];
  $docpass=$_POST['docpass'];

  $myobj7=new myselectquery();

  $tables="doctors";
  $condition="doc_email='$docname' AND doc_password='$docpass'";

  $slct7=$myobj7->slctdt($tables,$condition);

  if($slct7=="selected"){
    header("Location:../Hospital-managment-system/doctors/dashboard.php");
  }

  else{
    echo "<script>alert('username or password is wrong')</script>";
    echo "<script>window.location.href='../Hospital-managment-system/doctors/add_patient.php'</script>";
  }
 }

 if(isset($_POST['doc_logout'])){
  unset($_SESSION['doc_email']);
  unset($_SESSION['id']);
  header("Location:../Hospital-managment-system/doctors/index.php");
 }


 if(isset($_POST['doc_spcl']) && isset($_POST['doc_nam']) && isset($_POST['doc_addr']) && isset($_POST['doc_fes']) && isset($_POST['doc_cont']) && isset($_POST['doc_eml'])){
 $doc_spcl=$_POST['doc_spcl'];
 $doc_nam=$_POST['doc_nam'];
 $doc_addr=$_POST['doc_addr'];
 $doc_fes=$_POST['doc_fes'];
 $doc_cont=$_POST['doc_cont'];
 $doc_eml=$_POST['doc_eml'];
 $dc_email=$_POST['dc_email'];

  $myobj2=new myupdatequery();

  $table="doctors";
  $set="specialization='$doc_spcl', doctor_name='$doc_nam', address='$doc_addr', doc_fees='$doc_fes', contact='$doc_cont', doc_email='$doc_eml'";
  $onbasis="doc_email='$dc_email'";

  $updt=$myobj2->updtdt($table,$set,$onbasis);

  if($updt=="updated"){
    echo "updated";
  }
}


if(isset($_POST['add_patient'])){
  $pat_name=$_POST['pat_name'];
  $pat_cont=$_POST['pat_cont'];
  $pat_email=$_POST['pat_email'];
  $pat_gend=$_POST['pat_gend'];
  $pat_adrs=$_POST['pat_adrs'];
  $pat_age=$_POST['pat_age'];
  $pat_hist=$_POST['pat_hist'];

  if($pat_gend=="male"){
    $gender="male";
  }

  else if($pat_gend=="female"){
    $gender="female";
  }

  $doc_name=$_SESSION['doc_name'];

  $myobj8=new myinsertquery();

  $table="patients";
  $field="id,doctor_name,patient_name,patient_contact,email,patient_gender,patient_address,patient_age,medical_history,creation_date";
  $value="null,'$doc_name','$pat_name','$pat_cont','$pat_email','$gender','$pat_adrs','$pat_age','$pat_hist',null";
  
  $insrt8=$myobj8->insrtdt($table,$field,$value);
  
  if($insrt8=="inserted"){
    echo "<script>alert('Patient data added')</script>";
    echo "<script>window.location.href='../Hospital-managment-system/doctors/add_patient.php'</script>";
  }
}

if(isset($_POST['admin_change'])){
  $current=$_POST['current'];
  $newpass=$_POST['newpass'];
  $confpass=$_POST['confpass'];
  $d_email=$_SESSION['doc_email'];
  
  if($newpass!=$confpass){
    echo "<script> alert('confirm password is not match !!')</script>";
  }

  else{
   
    $myobj5=new myselectquery1();

    $table1="doctors";
    $condition1="doc_password='$current' AND doc_email='$d_email'";

    $slct5=$myobj5->slctdt1($table1,$condition1);

    if(isset($slct5[0])){
             
      $myobj6=new myupdatequery();
      $table="doctors";
      $set="doc_password='$newpass'";
      $onbasis="doc_password='$current' AND doc_email='$d_email'";

      $update6=$myobj6->updtdt($table,$set,$onbasis);

      if($update6=="updated"){
        $_SESSION['msgd']="updated";
        header("Location:../Hospital-managment-system/doctors/add_patient.php");
      }
    }

    else{
      $_SESSION['msgd']="current password is not correct";
       header("Location:../Hospital-managment-system/doctors/add_patient.php");
    }

  }

}

// Doctors forgot password

if(isset($_POST['reset'])){
  $emaild=$_POST['emaild'];
  $numbd=$_POST['numbd'];

  $myobj=new myselectquery();

  $tables="doctors";
  $condition="doc_email='$emaild' AND contact='$numbd'";
 
  $slct=$myobj->slctdt($tables,$condition);

  if($slct=="selected"){
    header("Location:../Hospital-managment-system/doctors/reset_pswrd.php");
  }
 
  else{
    echo "<script>alert('Invalid Details. Please try with valid details');</script>";
    echo "<script>window.location.href='forgot_pswrd.php'</script>";
  }
}


if(isset($_POST['pchange'])){
    $pswrd=$_POST['pswrd'];
    $confpswrd=$_POST['confpswrd'];
    $emailr=$_SESSION['doc_email'];
    $contactr=$_SESSION['contact'];

    if($pswrd!=$confpswrd){
      echo "<script>alert('Password and confirm field does not match !!');</script>";
      echo "<script>window.location.href='reset_pswrd.php';</script>";
    }

    else{
$myobj=new myupdatequery();
$table="doctors";
$set="doc_password='$pswrd'";
$onbasis="doc_email='$emailr' AND contact='$contactr'";

$chnged=$myobj->updtdt($table,$set,$onbasis);

if($chnged=="updated"){
    echo "<script>alert('Password successfully updated.')</script>";
    echo "<script>window.location.href='../Hospital-managment-system/doctors/index.php';</script>";
}
    }
}

// User Forgot Password
if(isset($_POST['user_reset'])){
  $emailur=$_POST['emailur'];
  $numbur=$_POST['numbur'];

  $myobj=new myselectquery();

  $tables="users";
  $condition="email='$emailur' AND number='$numbur'";
 
  $slct=$myobj->slctdt($tables,$condition);

  if($slct=="selected"){
    header("Location:user_reset_pswrd.php");
  }
 
  else{
    echo "<script>alert('Invalid Details. Please try with valid details');</script>";
    echo "<script>window.location.href='forgot_pswrd.php'</script>";
  }
}

if(isset($_POST['urchange'])){
  $pswrdur=$_POST['pswrdur'];
  $confpswrdur=$_POST['confpswrdur'];
  $emailur=$_SESSION['email'];
  $numberur=$_SESSION['number'];

  if($pswrd!=$confpswrd){
    echo "<script>alert('Password and confirm field does not match !!');</script>";
    echo "<script>window.location.href='user_reset_pswrd.php';</script>";
  }

  else{
$myobj=new myupdatequery();
$table="users";
$set="password='$pswrdur'";
$onbasis="email='$emailur' AND number='$numberur'";

$chnged=$myobj->updtdt($table,$set,$onbasis);

if($chnged=="updated"){
  echo "<script>alert('Password successfully updated.')</script>";
  echo "<script>window.location.href='index.php';</script>";
}
}
}

// Admin Forgot Password
if(isset($_POST['ad_reset'])){
  $emailad=$_POST['emailad'];
  $numbad=$_POST['numbad'];

  $myobj=new myselectquery();

  $tables="admin";
  $condition="username='$emailad' AND contact='$numbad'";
 
  $slct=$myobj->slctdt($tables,$condition);

  if($slct=="selected"){
    header("Location:admin_reset_pswrd.php");
  }
 
  else{
    echo "<script>alert('Invalid Details. Please try with valid details');</script>";
    echo "<script>window.location.href='admin_forgot_pswrd.php'</script>";
  }
}

if(isset($_POST['changead'])){
  $pswrdad=$_POST['pswrdad'];
  $confpswrdad=$_POST['confpswrdad'];
  $emailad=$_SESSION['user'];
  $numberad=$_SESSION['contact'];

  if($pswrdad!=$confpswrdad){
    echo "<script>alert('Password and confirm field does not match !!');</script>";
    echo "<script>window.location.href='admin_reset_pswrd.php';</script>";
  }

  else{
$myobj=new myupdatequery();
$table="admin";
$set="password='$pswrdad'";
$onbasis="username='$emailad' AND contact='$numberad'";

$chnged=$myobj->updtdt($table,$set,$onbasis);

if($chnged=="updated"){
  echo "<script>alert('Password successfully updated.')</script>";
  echo "<script>window.location.href='admin_index.php';</script>";
}
}
}

?>