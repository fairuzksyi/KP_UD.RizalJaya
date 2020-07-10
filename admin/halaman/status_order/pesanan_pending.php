<?php
$pesanan_pending = "1";
$koneksi->query("UPDATE pembelian SET status_pembelian='$pesanan_pending' WHERE id_pembelian='$_GET[id]'");

echo "<script>alert('Pesanan Dipending')</script>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pembelian'>";
?>