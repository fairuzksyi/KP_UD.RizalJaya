<h2>Halaman Pembelian</h2>
<link href="foto_banner/logo.png" rel="shortcut icon">
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<th><?php echo $nomor; ?></th>
			<th><?php echo $pecah['nama_pelanggan']; ?></th>
			<th><?php echo $pecah['tanggal_pembelian']; ?></th>
			<th>Rp. <?php echo number_format($pecah['total_pembelian']); ?></th>
			<th>
				<?php 
				if ($pecah['status_pembelian']==1)
				{
					echo "<a href='' class='btn btn-warning' disabled>Pesanan Dipending</a>";	
				}
				elseif ($pecah['status_pembelian']==2) 
				{
					echo "<a href='' class='btn btn-danger' disabled>Pesanan Ditolak</a>";		
				}
				elseif ($pecah['status_pembelian']==3) 
				{
					echo "<a href='' class='btn btn-info' disabled>Pembayaran Diterima</a>";	
				}
				elseif ($pecah['status_pembelian']==4) 
				{	
					echo "<a href='' class='btn btn-success' disabled>Pesanan Dikirim</a>";	
				}
				else
				{
					echo "<a href='' class='btn btn-dark' disabled>Menunggu Pembayaran</a>";	
				}
				?>
			</th>
			<th>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">Detail</a>
			</th>
		</tr>
		<?php $nomor++ ?>
	<?php } ?>
	</tbody>
</table>