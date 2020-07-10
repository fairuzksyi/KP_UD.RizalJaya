<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"])) 
{
	echo "<script>alert('Anda Harus Login Terlebih Dahulu'); </script>";
	echo "<script>location='login.php';</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<link href="foto_banner/logo.png" rel="shortcut icon">
	<title></title>
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
	      <li><a href="index.php">Home</a></li>
	      <li class="active"><a href="checkout.php">Checkout</a></li>
	      <li><a href="pembelian_pelanggan.php">Pembelian</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<li><a href="keranjang.php"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
	    	<?php if (isset($_SESSION["pelanggan"])): ?>
	    		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> 
	    	<?php else: ?>
	    		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
	    	<?php endif ?>	    	
	    </ul>
	  </div>
	</nav>


<section class="konten">
	<div class="container">
		<h1>Keranjang Belanja</h1><hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>NO</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Sub Harga</th>
					
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $totalbelanja = 0; ?>
				<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :?>
				<?php 
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga_produk"] * $jumlah;
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_produk"]; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
					
							
						
											
				</tr>
				<?php $nomor++; ?>
				<?php $totalbelanja+=$subharga; ?>
				<?php endforeach?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Belanja</th>
					<th>Rp. <?php echo number_format($totalbelanja) ?></th>
				</tr>
			</tfoot>
		</table>
		
		<form method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?>" class="form-control"><br>
						<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["telp_pelanggan"] ?>" class="form-control"><br>
						<input type="text" class="form-control" name="alamat_pembelian" placeholder="Masukkan Alamat Anda" required><br>

					</div>
				</div>
				
			</div>
			<button class="btn btn-primary" name="checkout">Checkout</button>
		</form>


		<?php 
		if (isset($_POST["checkout"])) 
		{
			$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
			$tanggal_pembelian = date("Y-m-d");
			$total_pembelian = $totalbelanja;
			$status_pembelian = "Menunggu Pembayaran";

			//simpan dalam database pembelian
			$koneksi->query("INSERT INTO pembelian(id_pelanggan,tanggal_pembelian,total_pembelian,alamat_pembelian,status_pembelian) VALUES ('$id_pelanggan','$tanggal_pembelian','$total_pembelian','$_POST[alamat_pembelian]','$status_pembelian')");

			//mendapatkan id_pembelian
			$id_pembelian_terakhir = $koneksi->insert_id;
			foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) 
			{
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$perproduk = $ambil->fetch_assoc();

				$nama = $perproduk['nama_produk'];
				$harga = $perproduk['harga_produk'];
				$berat = $perproduk['berat_produk'];

				$subharga = $perproduk['harga_produk'] * $jumlah;
				$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subharga,jumlah) VALUES ('$id_pembelian_terakhir','$id_produk','$nama','$harga','$berat','$subharga','$jumlah') ");
			}

			//menghapus isi keranjang
			//unset($_SESSION["keranjang"]);

			//pindah ke invoice
			echo "<script>alert('Pembelian Sukses');</script>";
			echo "<script>location='invoice.php?id=$id_pembelian_terakhir';</script>";
		}
		?>

	</div>
</section>



</body>
</html>