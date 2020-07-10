<?php 
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","prakp");
?>

<!DOCTYPE html>
<html>
<head>
	<link href="foto_banner/logo.png" rel="shortcut icon">
	<title>UD. RIZAL JAYA</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
	    	<a class="navbar-brand" href="deskripsiudrizaljaya.php">UD. RIZAL JAYA</a>
	    </div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li><a href="pembelian_pelanggan.php">Pembelian</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
	    	<li><a href="keranjang.php"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
	    	<?php if (isset($_SESSION["pelanggan"])): ?>
	    		<li><a href="Logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> 
	    	<?php else: ?>
	    		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
	    	<?php endif ?>	  
	    </ul>
	</div>
</nav>

<!-- Banner -->

<!-- Konten -->
<div class="container">
<div class="main">
		
		<div class="footer1">

			<h3><center><u>ALAMAT PERUSAHAAN KAMI DI SINI</u></center></h3>
			<br>
			<p><center><img src="foto_banner/udrizaljaya.png" width="900px"><BR><BR><BR><BR><BR><P><strong>SEMARANG</strong><h4>Jl.Pedurungan Tengah V No 69, Pedurungan , Kota Semarang, Jawa Tengah 50251
</h4></P></BR></BR></BR></BR></BR></br></center>

</div>
</div>
</div>


</body>
</html>