<?php 
session_start();

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="foto_banner/logo.png" rel="shortcut icon">
    <meta charset="utf-8">
    <title>UD.RizalJaya</title>
    <link rel="stylesheet" href="invoice/style.css" media="all" />

  </head>
  <body>

    <header class="clearfix">
      <div id="logo">
        <img src="invoice/logo.png">
      </div>
      <h1>INVOICE UD.RIZAL JAYA</h1>
      <div id="company" class="clearfix">
        <div>UD.RIZAL JAYA</div>
        <div>Jl.Pedurungan Tengah V,<br />No. 69,Semarang</div>
        <div>(+62) 81575238186</div>
        <div><a href="mailto:company@example.com">udrizaljaya69@gmail.com</a></div>
      </div>

      <div id="project">
        <?php 
        $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$_GET[id]'");
        $pecah = $ambil->fetch_assoc();
        $status_pembelian = $pecah['status_pembelian'];
        ?>
        <div><span>No.Pesanan</span> RJ0<?php echo $pecah["id_pembelian"]; ?></div>
        <div><span>Nama</span> <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></div>
        <div><span>Alamat</span> <?php echo $pecah["alamat_pembelian"]; ?></div>
        <div><span>Email</span> <a href="<?php echo $_SESSION["pelanggan"]["email_pelanggan"] ?>"> <?php echo $_SESSION["pelanggan"]["email_pelanggan"] ?></a></div>
        <div><span>No.HP</span> <?php echo $_SESSION["pelanggan"]["telp_pelanggan"] ?></div>
        <div><span>Tanggal</span> <?php echo $pecah["tanggal_pembelian"]; ?></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Jumlah</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor=1; ?>
          <?php $totalbelanja = 0; ?> 
          <?php $totalberat = 0; ?> 
          <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
          <?php while($pecah=$ambil->fetch_assoc()){ ?>
            <?php $subharga = $pecah['subharga']; ?>
            <?php $subberat = $pecah['berat'] * $pecah['jumlah']; ?>
            <tr>
              <td><?php echo $pecah['nama']; ?></td>
              <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
              <td><?php echo $subberat ?> Gram.</td>
              <td><?php echo $pecah['jumlah']; ?></td>
              <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
            </tr>
            <?php $nomor++; ?>
            <?php $totalbelanja+=$subharga; ?>
            <?php $totalberat+=$subberat; ?>
          <?php } ?>
        </tbody>
        <tr>
            <td colspan="4" class="grand total">TOTAL BERAT</td>
            <td class="grand total"><?php echo number_format($totalberat) ?> Gram.</td>
        </tr>
        <tr>
            <td colspan="4" class="grand total">JUMLAH TOTAL</td>
            <td class="grand total">Rp. <?php echo number_format($totalbelanja) ?></td>
        </tr>
        <tr>
            <td class="grand total" colspan="5"><font color="#e32249"><h3>Status Pembayaran : 
              <?php 
              if ($status_pembelian==1)
              {
                echo 'Pesanan Anda Dipending Sementara.'; 
              }
              elseif ($status_pembelian==2) 
              {
                echo 'Pesanan Anda Telah Ditolak.';    
              }
              elseif ($status_pembelian==3) 
              {
                echo 'Pembayaran Telah Diterima. Pesanan Anda Akan Segera Dikirim';  
              }
              elseif ($status_pembelian==4) 
              { 
                echo 'Pensanan Anda Telah Dikirim'; 
              }
              else
              {
                echo 'Menunggu Pembayaran'; 
              }
              ?>
            </td>
        </tr>
        <tr>
        <td colspan="5" class="info"><font color="#e32249"><h3>Silakan Melakukan Pembayaran Rp. <?php echo number_format($totalbelanja) ?><br>
          <strong>Ke Rekening BCA 8456324525 a/n UD. Rizal Jaya</strong></h3></font></td>
        </tr>
        <tr>
          <td class="bawah">
            <strong>
              UD.RIZAL JAYA<br>
              Jl.Pedurungan Tengah V No.69, Tlp (+62) 1575238186<br>
              Semarang, Jawa Tengah
            </strong>
          </td>
        </tr>
      </table>
      
    </main>
    
  </body>
</html>