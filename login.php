<?php 
session_start(); 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="login.css" />
    <title>Login</title>
  </head>
  <body>
    <header class="header">
      <h2>Toko yang menjual galon dan peralatanya</h2>
      <img src="gambar/logo_on-qua.jpeg" alt="logotoko" class="logo logo-toko">
    </header>
    <div class="container">
      <div class="box">
        <div class="box-2">
          <div class="wrapper">
            <form action="proses_login.php" method="POST">
              <h1>On-Qua Account</h1>
              <div class="input-box">
                <input type="email" name="email" placeholder="Masukkan Username / Email" required>
              </div>
              <div class="input-box">
                <input type="password" name="password" placeholder="Masukkan Password" required>
              </div>
              <button type="submit" class="btn">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </body>
</html>