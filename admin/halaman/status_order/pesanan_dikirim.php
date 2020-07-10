<?php
$pesanan_dikirim = "4";
$koneksi->query("UPDATE pembelian SET status_pembelian='$pesanan_dikirim' WHERE id_pembelian='$_GET[id]'");

echo "<script>alert('Pesanan Dikirim')</script>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pembelian'>";
?>