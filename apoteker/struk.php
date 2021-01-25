<?php include '../koneksi.php';
session_start();


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Struk Penjualan</title>
<style type="text/css">
    .footer
      {
          line-height: 1.0em; font-size:11px; text-align: center; font-family: "Impact, Charcoal", sans-serif ;  
      }
   .judul { font-size:18px; text-align: center; line-height: 1.5em; font-family: "Impact, Charcoal", sans-serif ; }
          
   .sub { line-height: 1.0em; font-size:11px; text-align: center; font-family: "Impact, Charcoal", sans-serif ; }

   .isi 
   {
      font-size: 12px; 
      text-align: center;
      line-height: 1em;
      font-family: "Comic Sans MS", cursive, sans-serif;

   }
   .space { line-height: 1.5em;}

   .judjual {
          font-size: 17px;
          font-family: Arial, Helvetica, sans-serif;
          line-height: 1.0em;

   }

   .tab {
          font-size: 15px;
          font-family: "Comic Sans MS", cursive, sans-serif;
          line-height: 1.0em;
          border-collapse: collapse;


   }
   .contoh4 { font-size:16px; line-height: 2;}
</style>





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
   <?php date_default_timezone_set("Asia/Jakarta"); ?>
  <?php $date = date("d/m/Y H:i:s") ?>







<div class="sub"><?php echo $date;  ?></div>
================================<br>
<?php $get = $_GET['kode']; ?>
<?php
      $sql1 = mysqli_query($koneksi,"SELECT *, obat.nama_obat as kode_obat FROM transaksi_penjualan, obat, detail_transaksi WHERE obat.kode_obat=detail_transaksi.kode_obat AND transaksi_penjualan.id_transaksi=detail_transaksi.id_detailTransaksi AND transaksi_penjualan.id_transaksi='$get'"); 
      while ($s = mysqli_fetch_array($sql1)) { ?>
<div class="judjual"><?php echo $s['nama_obat'] ?></div>
<table border="0" class="tab" width="90%" align="center">
      <tr>
      <td width="20%"><?php echo $s['jumlah_obat']?> Pcs X</td>
      <td width="30%" align="right"><?php echo number_format($s['harga'])?></td>
      <td width="50%" align="right"> <?php echo number_format($s['sub_total'])?></td>
    </tr>
</table>

<?php } ?>
================================<br>

<?php $q = mysqli_query($koneksi,"SELECT *,transaksi_penjualan.diskon AS pot, COUNT(detail_transaksi.id_detailTransaksi) AS a FROM transaksi_penjualan,detail_transaksi  WHERE transaksi_penjualan.id_transaksi=detail_transaksi.id_detailTransaksi AND transaksi_penjualan.id_transaksi='$get'");
while ($h = mysqli_fetch_array($q)) {
$a = $h['total_harga'];
$b = $h['pot'];
$c = $h['harga'];
 ?>

 <table border="0" width="90%" style="border-collapse: collapse;" align="center">
  <tr>
     <td align="right">Subtotal</td>
     <td align="center">:</td>
     <td align="right"><?php echo number_format($c) ?></td>
   </tr>
  
   <tr>
     <td align="right">Grand Total</td>
     <td align="center">:</td>
     <td align="right"><?php echo number_format($a) ?></td>
   </tr>
   <tr>
     <td align="right">Tunai</td>
     <td align="center">:</td>
     <td align="right"><?php echo number_format($h['total_bayar']) ?></td>
   </tr>
   <tr>
     <td align="right">Kembali</td>
     <td align="center">:</td>
     <td align="right"><?php echo number_format($h['kembali']) ?></td>
   </tr>

 </table>



<?php } ?>
================================<br>
<div class="footer" align="center">Terimakasih Atas Kunjungannya</div>

<?php echo "<script>window.print()</script>"; ?>

<script src="../../build/js/custom.min.js"></script>
  </body>
</html>


        
