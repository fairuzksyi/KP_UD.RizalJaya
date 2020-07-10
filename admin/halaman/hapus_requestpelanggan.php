<?php

$koneksi->query("DELETE FROM request_pelanggan WHERE id_pelanggan='$_GET[id]'");

echo "<script>alert('Pelanggan Ditolak'); </script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";

?>