<?php
include_once('koneksi.php');
// $ambil = new prakp();
if(isset($_POST['register']))
{
  // var_dump($_POST);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $telp = $_POST['telepon'];
  //   if($koneksi->register($email,$password,$nama))
  $query = "INSERT INTO pelanggan VALUES ('','$email','$password','$nama','$telp')";
  mysqli_query($koneksi,$query);
  //   {
  //     header('location:login.php');
  //   }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link href="foto_banner/logo.png" rel="shortcut icon">
  <title>Register Pelanggan Baru</title>
  <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

  <!-- NAVBAR -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
        <a class="navbar-brand" href="deskripsiudrizaljaya.php">UD. RIZAL JAYA</a>
      </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="index.php">Home</a></li>
      <li><a href="checkout.php">Checkout</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right"> 
        <li><a href="keranjang.php"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
      </ul>
  </div>
</nav>

  <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Rizal Jaya : Register Pelanggan Baru</h2>
                <br>
            </div>
        </div>
    <form action="register.php" method="post">
  <?php 
  if(isset($_GET['email'])){
    if($_GET['email'] == "kosong"){
      echo "<h6 style='color:red'>Email Belum Di Masukkan !</h6>";
  }
  }
  if(isset($_GET['nama'])){
    if($_GET['nama'] == "kosong"){
      echo "<h6 style='color:red'>Nama Belum Di Masukkan !</h6>";
  }
  }
  if(isset($_GET['telepon'])){
    if($_GET['telepon'] == "kosong"){
      echo "<h6 style='color:red'>Telepon Belum Di Masukkan !</h6>";
  }
  }
  if(isset($_GET['password'])){
    if($_GET['password'] == "kosong"){
      echo "<h6 style='color:red'>Password Belum Di Masukkan !</h6>";
  }
  }
?>
         <div class="row ">
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <!-- <center><strong>Register Form</strong></center> -->
                        <center><strong>Silahkan Isi Identitas Anda</strong></center>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                      <!-- <label for="email" class="col-sm-2 col-form-label">Email:</label> -->
                                            <span class="input-group-addon"></i></span>
                                            <input type="text" class="form-control" name="email" placeholder="Masukkan Email Anda"/>
                                        </div>
                                     <div class="form-group input-group">
                                      <!-- <label for="nama" class="col-sm-2 col-form-label">Nama:</label> -->
                                            <span class="input-group-addon"></i></span>
                                            <input type="text" class="form-control"  name="nama" placeholder="Masukkan Nama Anda"/>
                                        </div>
                                     <div class="form-group input-group">
                                      <!-- <label for="telepon" class="col-sm-2 col-form-label">Telepon:</label> -->
                                            <span class="input-group-addon"></i></span>
                                            <input type="text" class="form-control"  name="telepon" placeholder="Masukkan Telepon Anda"/>
                                        </div>
                                     <div class="form-group input-group">
                                      <!-- <label for="password" class="col-sm-2 col-form-label">Password:</label> -->
                                            <span class="input-group-addon"></i></span>
                                            <input type="password" class="form-control"  name="password" placeholder="Masukkan Password Anda"/>
                                        </div>
                                    <div class="form-group">
                                            
                                        </div>
                                     
                                    <hr/>
                                    <center>
                                       <a href="login.php" class="btn btn-success">Login</a>
                                       <button type="submit" class="btn btn-primary" name="register">Register</button></center>
                                    </form>
                                    <main role="main" class="flex-shrink-0">
        </div>
    </div>
</body>
</html>