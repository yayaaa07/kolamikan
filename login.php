<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Monitoring Kolam Ikan Login</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    <link rel="stylesheet" href="css2/style.css" media="screen" type="text/css" />

</head>

<body>

<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "<script>alert('Login gagal username dan password harus diisi!!!')</script>";
		}else if($_GET['pesan'] == "logout"){
			echo "<script>alert('Anda berhasil logout.')</script>";
		}else if($_GET['pesan'] == "belum_login"){
			
		}
	}
?>

  <div class="login-card">
    <h1>Log-in</h1><br>
  <form method="post" action="ceklogin.php">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="login" >
  </form>

  
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>