<?php

$koneksi->query("INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telp_pelanggan) SELECT email_pelanggan,password_pelanggan,nama_pelanggan,telp_pelanggan FROM request_pelanggan WHERE id_pelanggan='$_GET[id]'");

$koneksi->query("DELETE FROM request_pelanggan WHERE id_pelanggan='$_GET[id]'");

echo "<script>alert('Pelanggan Diterima'); </script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";

?>