<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dahsbor</title>
  <link rel="stylesheet" href="js_css/bootstrap.min.css">
  <style>
  .container{
    width: 400px;
    
  }
  .container h1{
    font-size: 20px;
  }
  </style>
</head>
<body>
  <div class="container ">
  <?php
  if(isset($_SESSION['login_status'])){
    if($_SESSION['login_status'] == 'hidup'){
      echo "<h1>masuk sebagai $_SESSION[nama]</h1>";
      if(isset($_COOKIE['nama']) && isset($_COOKIE['password'])){
        echo "<h1>cookie aktif</h1>";
      }
      else{
        echo "<h1>cookie tidak aktif</h1>";
      }
    }
    else{
      $_SESSION['login_status'] = 'mati';
      header("Location: form_login.php");
    }
  }
  else{
    header("Location: form_login.php");
  }
  ?>
  <h1>Hello, selamat datang di dashbor</h1>
  </div>
  

  <script src="js_css/bootstrap.min.js"></script>
</body>
</html>