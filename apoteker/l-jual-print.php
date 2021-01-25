<?php include '../koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Laporan Stok</title>
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">





<?php
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );


  $pecahkan = explode('-', $tanggal);
  

 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
 
?>


<?php
date_default_timezone_set("Asia/Jakarta");

$day = date ("D");
switch ($day) {
case 'Sun' : $hari = "Minggu"; break;
case 'Mon' : $hari = "Senin"; break;
case 'Tue' : $hari = "Selasa"; break;
case 'Wed' : $hari = "Rabu"; break;
case 'Thu' : $hari = "Kamis"; break;
case 'Fri' : $hari = "Jum'at"; break;
case 'Sat' : $hari = "Sabtu"; break;
default : $hari = "??";
}

?>
  </head>
  <?php $date = date("Y-m-d") ?>


<div class="ln_solid"></div>
          <?php
          $tgl_awal   = $_GET['awal'];
          $tgl_akhir  = $_GET['akhir'];

          $tanggalawal = date('Y-m-d', strtotime($tgl_awal));
          $tanggalakhir = date('Y-m-d', strtotime($tgl_akhir));

?>
<br>
<br>
<strong><h3 align="center"><b>Data Penjualan  </h3></strong>
<h4 align="center"><?php echo tgl_indo($tanggalawal)  ?> - <?php echo tgl_indo($tanggalakhir) ?></b></h4>

<br>

    <table align="center" id="" class="table table-keytable">


    <thead>
      <tr>
        
      </tr>
    </thead>
      <?php
       $sql = mysqli_query($koneksi,"select * from transaksi_penjualan where tanggal_transaksi between '$tgl_awal' and '$tgl_akhir'") ?>
    <tbody>
      <?php $no=1; while ($data = mysqli_fetch_array($sql)) { 
        $a = $data['id_transaksi'];
      ?>

      <tr>
        <td rowspan="4" colspan="4"><h1>NO : <?php echo $no++; ?></h1></td>
      </tr>
      <tr bgcolor="#DCDCDC">
        <td colspan="1">No Faktur</td>
        <td>: <?php echo $data['id_transaksi'] ?></td>

      </tr>
      <tr bgcolor="#DCDCDC">
        <td colspan="1">Pembeli</td>
        <td>: <?php echo $data['Customer'] ?></td>

      </tr>
      <tr bgcolor="#DCDCDC">
        <td  colspan="1">Tgl</td>
        <td>: <?php echo ($data['tanggal_transaksi']) ?></td>
<?php $ab = mysqli_query($koneksi,"select * from detail_transaksi, obat where obat.kode_obat = detail_transaksi.kode_obat and id_transaksi='$a'") ?>

      </tr>
	  
      <tr bgcolor="#2F4F4F">
        <td width="10%">Kode</td>
        <td width="40%">Nama Obat</td>
        <td width="15%">Harga</td>
        <td width="10%">Qty</td>
        <td width="10%">Diskon</td>
        <td width="20%">Subtotal</td>
      </tr>
      <?php while ($dt = mysqli_fetch_array($ab)) { ?>
      <tr>
        <td>OB-00<?php echo $dt['kode_obat'] ?></td>
        <td><?php echo $dt['nama_obat'] ?></td>
        <td>Rp. <?php echo  number_format($dt['harga']) ?>,00,-</td>
        <td><?php echo $dt['jumlah_obat'] ?></td>
        <td><?php echo $dt['pot'] ?> % </td>
        <td>Rp. <?php echo number_format($dt['sub_total']) ?>,00,-</td>
      </tr>
    <?php } ?>
    <?php 
      $ac = mysqli_query($koneksi,"SELECT * FROM transaksi_penjualan WHERE id_transaksi='$a'")    ?>

      <tr bgcolor="#DCDCDC">
        <td colspan="4" rowspan="2"></td>
        <td>Total Harga</td>
        <?php while ($dr = mysqli_fetch_array($ac)) { ?>
        <td>: Rp. <?php echo number_format($dr['total_harga']) ?>,00,-</td>
      <?php } ?>
      </tr>
      <?php $ad = mysqli_query($koneksi,"select count(id_transaksi) as totcont from detail_transaksi where id_transaksi='$a' ")?>
      <tr bgcolor="#DCDCDC">
        <td>Total Item</td>
        <?php while ($dy = mysqli_fetch_array($ad)) { ?>
        <td>: <?php echo $dy['totcont'] ?> Item</td>
      <?php } ?>
      </tr>

      <tr>
        <td height="40px" colspan="6" ></td>
      </tr>

      <?php } ?>
      <?php $my = mysqli_query($koneksi,"select sum(total_harga) as total from transaksi_penjualan where tanggal_transaksi between '$tgl_awal' and '$tgl_akhir' "); ?>
      <tr>
      <?php while ($a = mysqli_fetch_array($my)) { ?>
      <td colspan="6" align="right"><h4><b>Total Penjualan Bulan Ini : Rp. <?php echo number_format($a['total']) ?>,00,-</b></h4></td>
      <?php } ?>
      </tr>      

    </tbody>

  </table>
                    <table border="0" width="100%">
                      <tr>
                        <td height="10px" width="25"></td>
                        <td width="50%"></td>
                        <td width="25%" align="center">Malang, <?php echo tgl_indo($date) ?><br><br> Hormat Kami</td>
                      </tr>
                        <td height="100px"></td>
                        <td></td>
                        <td></td>
                      </tr>
                     <tr>
                        <td ></td>
                        <td></td>

                        <td align="center">(___________________)</td>
                      </tr>
                      <tr>


                    </table>
              
                    <?php echo "<script>window.print()</script>"; ?>





<script src="../../build/js/custom.min.js"></script>
  </body>
</html>


        
