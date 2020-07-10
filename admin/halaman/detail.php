<h2>Detail Pembelian</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>


<strong>Identitas Pembeli</strong><br>
<p>
	Nama Pembeli : <?php echo $detail['nama_pelanggan']; ?>
	<?php echo $detail ['telp_pelanggan']; ?> <br>
	<?php echo $detail ['email_pelanggan']; ?> <br>
	<?php echo $detail ['alamat_pembelian']; ?> <br>
</p>
<p>
	Tanggal Pembelian: <?php echo $detail['tanggal_pembelian']; ?> <br>
</p>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>NO</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $totalbelanja = 0; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<?php $subharga = $pecah['harga_produk']*$pecah['jumlah'] ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>Rp. <?php echo number_format($subharga); ?></td>
		</tr>
		<?php $nomor++; ?>
		<?php $totalbelanja+=$subharga; ?>
	<?php }?>
		<tr>
			<th colspan="4">Total</th>
			<td>Rp. <?php echo number_format($totalbelanja); ?></td>
		</tr>
	</tbody>
</table>
<div>
	<a href="index.php?halaman=pesanan_pending&id=<?php echo $_GET['id']; ?>" class="btn-warning btn">Pesanan Dipending</a>
	<a href="index.php?halaman=tolak_pesanan&id=<?php echo $_GET['id']; ?>" class="btn-danger btn">Tolak Pesanan</a>
	<a href="index.php?halaman=pembayaran_diterima&id=<?php echo $_GET['id']; ?>" class="btn-info btn">Pembayaran Diterima</a>
	<a href="index.php?halaman=pesanan_dikirim&id=<?php echo $_GET['id']; ?>" class="btn-success btn">Pesanan Dikirim</a>
</div>