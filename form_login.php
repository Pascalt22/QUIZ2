<?php
session_start();
$conn = mysqli_connect("localhost","root","","user");
if( isset($_POST['tombol_login']) ){
  var_dump($_POST);
  $nama = $_POST['nama'];
  $password = $_POST['password'];
  $check_input = mysqli_query($conn,"SELECT * FROM data_pengguna WHERE nama = '$nama' and password = '$password' ");
  if (mysqli_num_rows($check_input)){

    $_SESSION['login_status'] = 'hidup';
    $_SESSION['nama'] = $nama;
  }
  else{
    echo "<script>alert('username atau kata sandi yang anda masukan salah')</script>";
    $_SESSION['login_status'] = 'mati';
  }
}
if( isset($_POST['tombol_login_cookie']) ){
  $nama = $_POST['nama'];
  $password = $_POST['password'];
  $check_input = mysqli_query($conn,"SELECT * FROM data_pengguna WHERE nama = '$nama' and password = '$password' ");
  if (mysqli_num_rows($check_input)){
    setcookie("nama",$nama,time()+120);
    setcookie("password",$password,time()+120);
    $_SESSION['login_status'] = 'hidup';
    $_SESSION['nama'] = $nama ;
  }
  else{
    echo "<script>alert('username atau kata sandi yang anda masukan salah')</script>"; 
    $_SESSION['login_status'] = 'mati';
  }
}


if(isset($_SESSION['login_status'])){;
  if($_SESSION['login_status'] == 'hidup'){
    header("Location: index.php");
  }
  
}
else{
  if(isset($_COOKIE['nama']) && isset($_COOKIE['password'])){
    $_SESSION['login_status'] = "hidup";
    $_SESSION['nama'] = $_COOKIE['nama'] ;
    header("Location: index.php");
  }
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>form login</title>
  <link rel="stylesheet" href="js_css/bootstrap.min.css">
  <style>
    .tabel-login{
      width: 600px;
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>
<body>
  <h1 class="text-center">form login</h1>
  <form action="" method="POST">
    <table class="table tabel-login border">
      <tr><td>Input nama</td><td><input type="text" class="form-control" name="nama"></td></tr>
      <tr><td>Input password</td><td><input type="password" class="form-control" name="password"></td></tr>
      <tr><td><button type="submit" name="tombol_login" class="btn btn-success">masuk tanpa cookie</button></td>
        <td><button type="submit" name="tombol_login_cookie" class="btn btn-danger">login menggunakan cookie</button></td></tr>
    </table>
  </form>


  <script src="js_css/bootstrap.min.js"></script>
</body>
</html>