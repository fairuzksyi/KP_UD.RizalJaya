<?php 
session_start();
//koneksi database
include 'koneksi.php';
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
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
	    	<a class="navbar-brand" href="deskripsiudrizaljaya.php">UD. RIZAL JAYA</a>
	    </div>
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li class="active"><a href="index.php">Pembelian</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php if (isset($_SESSION["keranjang"])): ?>
	    		<li><a href="keranjang.php"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
	    	<?php else: ?>
	    		<li><a href="belumadabarang.php"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> Cart</a></li> 
	    	<?php endif ?>
	    	<!-- <li><a href="keranjang.php"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> Cart</a></li> -->
	    	<?php if (isset($_SESSION["pelanggan"])): ?>
	    		<li><a href="Logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> 
	    	<?php else: ?>
	    		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
	    	<?php endif ?>	    	
	    </ul>
	</div>
</nav>


<!-- Konten -->
<section class="konten">
	<div class="container">
		<h1>Daftar Pembelian Anda</h1>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Pelanggan</th>
					<th>Tanggal</th>
					<th>Total</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"]; ?>
				<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON $id_pelanggan =pembelian.id_pelanggan = pelanggan.id_pelanggan"); ?>
				<?php while ($pecah = $ambil->fetch_assoc()){ ?>
				<tr>
					<th><?php echo $nomor; ?></th>
					<th><?php echo $pecah['nama_pelanggan']; ?></th>
					<th><?php echo $pecah['tanggal_pembelian']; ?></th>
					<th>Rp. <?php echo number_format($pecah['total_pembelian']); ?></th>
					<th>
						<a href="invoice.php?&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">Detail</a>
					</th>
				</tr>
				<?php $nomor++ ?>
			<?php } ?>
			</tbody>
		</table>
	</div>
</section>

</body>
</html>