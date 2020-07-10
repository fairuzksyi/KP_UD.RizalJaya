<?php
session_start();
//session_destroy();
unset($_SESSION['pelanggan']);
unset($_SESSION['keranjang']);
echo "<script>alert('Anda Telah Logout');</script>";
echo "<script>location='index.php';</script>";
?>