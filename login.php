<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link href="foto_banner/logo.png" rel="shortcut icon">
  <title>Login Pelanggan</title>
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
                <h2> Rizal Jaya : Login Pelanggan</h2>
                <br>
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <center><strong>Masukkan Email Dan Passsword</strong></center>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"></i></span>
                                            <input type="text" class="form-control" name="email" placeholder="Masukkan Email Anda"/>
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"></i></span>
                                            <input type="password" class="form-control"  name="password" placeholder="Masukkan Password Anda"/>
                                        </div>
                                    <div class="form-group">
                                            
                                        </div>
                                     
                                    <hr/>
                                    <center>
                                    <button class="btn btn-primary" name="login">Login</button>
                                    <a href="register.php" class="btn btn-success">Register</a></center>
                                    </form>

                                     <?php
                                    if (isset($_POST["login"])) 
                                    {
                                      $email = $_POST["email"];
                                      $password = $_POST["password"];
                                      $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
                                      $ambil2 = $koneksi->query("SELECT * FROM request_pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

                                      $akunyangcocok = $ambil->num_rows;
                                      $akunrequest = $ambil2->num_rows;

                                      if ($akunyangcocok==1) 
                                      {
                                        //telah login
                                        $akun = $ambil->fetch_assoc();
                                        $_SESSION["pelanggan"] = $akun; 
                                        echo "<br><div class='alert alert-info'><center>Login Sukses</center></div>";
                                        if (isset($_SESSION["keranjang"])) 
                                        {
                                          echo "<meta http-equiv='refresh' content='3;url=checkout.php'>";
                                        }
                                        else
                                        {
                                          echo "<meta http-equiv='refresh' content='3;url=index.php'>";
                                        }

                                      }
                                      elseif ($akunrequest==1) 
                                      {
                                        // akun belum dikonfirmasi admin
                                        echo "<br><div class='alert alert-info'><center>Akun Anda Belum Dikonfirmasi Oleh Admin</center></div>";
                                        echo "<meta http-equiv='refresh' content='3;url=login.php'>"; 
                                      }
                                      else
                                      {
                                        // anda gagal login
                                        echo "<br><div class='alert alert-danger'><center>Anda Gagal Login. Email Atau Password Salah</center></div>";
                                        echo "<meta http-equiv='refresh' content='3;url=login.php'>"; 
                                      }
                                    }
                                    ?>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>



</body>
</html>