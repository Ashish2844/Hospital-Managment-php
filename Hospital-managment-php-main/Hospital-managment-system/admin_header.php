<div class="nv">
  <nav class="navbar" style="background-color:lightgrey;">
    <div class="container-fluid" style="width:100%; height:100%;">
      <a class="navbar-brand" href="#"><i class="fa-solid fa-bars" style="color:gray;"></i></a>
      <div class="btn-group dropstart">
  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="admin_chng_paswrd.php">Change Password</a></li>
    <li><form action="logic.php" method="post"><i class="fa fa-sign-out"></i><input type="submit" value="Logout" name="adlogout"></form></li>
  </ul>
</div>
    </div>
  </nav>
</div>

<style>
.dropdown-menu{
  font-size:15px;
}

.dropdown-menu form{
 margin-left:17px;
}

.dropdown-menu form input{
  border:transparent;
  background:transparent;
  margin-left:5px;
}

</style>