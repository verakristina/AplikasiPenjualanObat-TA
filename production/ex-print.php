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


<strong><h3 align="center"><b> Laporan Expired Obat</h3></strong>
<strong><h4 align="center"><b> Priode : <?php echo tgl_indo($date) ?> </h4></strong>
<br>
                   <table id="" class="table table-bordered">
                            <?php
                              $sql=mysqli_query($koneksi,"SELECT * FROM obat");
                            ?>
                    <thead>
                        <tr width="100%" bgcolor="#DCDCDC" >
                          <th width="2%"> No </th>
                          <th width="10%"> Kode Obat </th>
                          <th width="48%"> Nama Obat </th>

                          <th width="20%">Tanggal Expired</th>
                          <th width="30%">Status</th>
                          </tr>
                    </thead>
                      <?php
                      $date = date("Y-m-d");

                        $no=1;
                      while ($data=mysqli_fetch_array($sql)) 
                      { $p = $data['tanggal_expired'] ;

                      if ( $date == $p || $date > $p ) {
                          $nilai = 'Obat Expired';
                      }else
                          $nilai = 'Obat Berlaku';
                        ?>
                      <tr>
                        <td align="center"><?php echo $no++ ?></td>
                        <td><?php echo $data['kode_obat'] ?></td>
                        <td><?php echo $data['nama_obat'] ?></td>
                        <td><?php echo tgl_indo($data['tanggal_expired']) ?></td>
                        <td><?php echo $nilai ?></td>                      
                      </tr>
                        <?php } ?>

</div>
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


        
