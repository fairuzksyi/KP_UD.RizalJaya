<?php
$tolak_order = "2";
$koneksi->query("UPDATE pembelian SET status_pembelian='$tolak_order' WHERE id_pembelian='$_GET[id]'");

echo "<script>alert('Pesanan Ditolak')</script>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pembelian'>";
?>