<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Monitoring Kolam Ikan Login</title>
  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>
  <link rel="stylesheet" href="css2/style.css" media="screen" type="text/css" />
  <style>
    body {
      background-color: #800080; /* Purple */
      font-family: "Poppins", sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      padding: 0;
    }

    .login-card {
      background: linear-gradient(to right, #910b33, #682ae0);
      border-radius: 10px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
      max-width: 400px;
      padding: 40px;
      color: #fff;
      text-align: center;
    }

    .login-card h1 {
      font-size: 32px;
      font-weight: 700;
      text-transform: uppercase;
      margin-bottom: 20px;
    }

    .login-card input[type="text"],
    .login-card input[type="password"] {
      background-color: rgba(255, 255, 255, 0.2);
      border: none;
      color: #fff;
      padding: 15px 20px;
      text-align: center;
      font-size: 16px;
      width: 100%;
      border-radius: 30px;
      transition: all 0.3s ease-in-out;
    }

    .login-card input[type="submit"] {
      background-color: #800080;
      border: none;
      color: #fff;
      padding: 15px;
      text-align: center;
      text-decoration: none;
      display: block;
      text-transform: uppercase;
      font-size: 14px;
      border-radius: 30px;
      transition: all 0.3s ease-in-out;
      cursor: pointer;
    }

    .login-card input[type="submit"]:hover {
      background-color: #ac12d3;
    }
  </style>
</head>

<body>
  <div class="login-card">
    <h1>Log-in</h1>
    <?php 
    if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "gagal"){
        echo "<script>alert('Login gagal. Username dan password harus diisi!!!')</script>";
      }else if($_GET['pesan'] == "logout"){
        echo "<script>alert('Anda berhasil logout.')</script>";
      }else if($_GET['pesan'] == "belum_login"){
        
      }
    }
    ?>
    <form method="post" action="ceklogin.php">
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" name="login" class="login login-submit" value="Login">
    </form>
  </div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>
</body>

</html>
