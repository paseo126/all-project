
  <div id="signin" style="">
  <fieldset>
  <img src="foto/avatar.png" width="120px" />
  <h3>ADMINISTRATOR</h3>
  <p>SILAHKAN LOGIN</p>
  <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
      <input type="text" name="username" id="username" placeholder="Username" />
      <input type="password" name="password" id="password" placeholder="Password" />
      <input type="submit"  name="login" id="login" value="LOGIN ADMINISTRATOR" />
  </form>
  <?php
  if($_POST["login"]){
    $sqla = mysqli_query($kon, "select * from admin where username='$_POST[username]' and password='$_POST[password]'");
    $ra = mysqli_fetch_array($sqla);
    $row = mysqli_num_rows($sqla);
    if($row > 0){
      session_start();
  	$_SESSION["useradm"] = $ra["username"];
  	$_SESSION["passadm"] = $ra["password"];
  	echo "Login Berhasil";
    }else{
      echo "Login Gagal";
    }
   echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=home'>";
  }
  ?>
  </fieldset>
  </div>


