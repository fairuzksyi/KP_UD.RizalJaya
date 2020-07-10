<?php
unset($_SESSION['admin']);
echo "<script>alert('Anda Telah Logout');</script>";
echo "<script>location='login.php';</script>";
?>