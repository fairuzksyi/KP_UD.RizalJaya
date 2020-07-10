<?php
$pembayaran_diterima = "3";
$koneksi->query("UPDATE pembelian SET status_pembelian='$pembayaran_diterima' WHERE id_pembelian='$_GET[id]'");

echo "<script>alert('Pembayaran Diterima')</script>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pembelian'>";
?>