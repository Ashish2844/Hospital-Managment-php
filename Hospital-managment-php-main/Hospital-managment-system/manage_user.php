<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="sidebar">
  <?php 
  include "logic.php";
  include "admin_sidebar.php";
   ?>
</div>


<div class="navb">
  <div class="bar">
<?php include "admin_header.php"; ?>
</div>

<div class="data">

<h3 style="color:rgb(113,138,156)">Admin | Manage Users</h3>
   
<div class="doc_spclz">

<?php
 
$myobj=new myselectquery2();

$table2="users";
$cnt=1;

$slct=$myobj->slctdt2($table2);

if(isset($slct[0])){
  echo '<table class="data_table">';
  echo '
    <tr>
    <th>#</th>
    <th>Full Name</th>
    <th>address</th>
    <th>City</th>
    <th>Contact</th>
    <th>Gender</th>
    <th>Email</th>
    <th>Creation Date</th>
    <th>Action</th>
    </tr>
  ';
  foreach($slct as $get){
    
    echo '
    <tr>
    <td>'.$cnt.'</td>
    <td>'.$get['fullname'].'</td>
    <td>'.$get['address'].'</td>
    <td>'.$get['city'].'</td>
    <td>'.$get['number'].'</td>
    <td>'.$get['gender'].'</td>
    <td>'.$get['email'].'</td>
    <td>'.$get['date'].'</td>
    <td><a href="logic.php?idd='.$get['id'].'"><button onclick="return checkdeleteu()"><i class="fa-solid fa-xmark"></i></button></a></td>
    </tr>   
    ';
    $cnt=$cnt+1;
  } 

  echo '</table>';
}

?>
</div>
</div>
</div>
</div>

<script>
 
 function checkdeleteu(){
  return confirm("Are you sure");
 }

</script>

<script>

  alert(
  '<?php  
  echo $_SESSION['msg5'];
  unset($_SESSION['msg5']); 
  ?>'
  );

</script>

</body>
</html>