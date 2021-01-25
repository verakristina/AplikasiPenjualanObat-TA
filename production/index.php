<?php
include 'header.php';
?>

        
          <!-- top tiles -->
<div class="row tile_count">
	<?php $bln = date("m"); ?>
  <?php $thn = date("Y"); ?>

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <?php $sql = mysqli_query($koneksi,"SELECT COUNT(nama) AS total FROM user"); ?>
      <span class="count_top"><i class="fa fa-user"></i> Total User</span>
      <?php while ($a = mysqli_fetch_array($sql)) { ?>
      <div align="center" class="count blue"><?php echo $a['total']; ?></div>
      <?php } ?>
      <span class="count_bottom"><i class="blue"><i class="fa fa-calendr "></i> Total Data Master User </i></span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <?php $sql = mysqli_query($koneksi,"SELECT COUNT(kode_obat) AS total FROM obat"); ?>
      <span class="count_top"><i class="fa fa-cloud-download"></i>Total Obat</span>
      <?php while ($a = mysqli_fetch_array($sql)) { ?>
    <div align="center" class="count red"><?php echo $a['total']; ?></div>
      <?php } ?>
      <span class="count_bottom"><i class="blue"><i class="fa fa-calendr "></i>Total Data Master Obat</i></span>
   </div>
	 <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <?php $sql = mysqli_query($koneksi,"SELECT COUNT(kode_obat) AS total FROM obat WHERE MONTH(tanggal_expired) = '$bln' AND YEAR(`tanggal_expired`)='$thn'"); ?>
      <span class="count_top"><i class="fa fa-cloud-download"></i> Info Expired Obat</span>
      <?php while ($a = mysqli_fetch_array($sql)) { ?>
      <div align="center" class="count red"><?php echo $a['total']; ?></div>
    <?php } ?>
      <span class="count_bottom"><i class="green"><i class="fa fa-calendr "></i>Akan Expire Bulan Ini</i></span>
    </div>
		<div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <?php $sql = mysqli_query($koneksi,"SELECT SUM(total_harga) AS total FROM transaksi_penjualan WHERE MONTH(tanggal_transaksi) = '$bln'"); ?>
        <span class="count_top"><i class="fa fa-tags"></i> Total Penjualan </span>
        <?php while ($a = mysqli_fetch_array($sql)) { ?>
        <div align="center" class="count red">RP. <?php echo number_format($a['total']) ?>,-</div>
      <?php } ?>
        <span class="count_bottom"><i class="blue"><i class="fa fa-sort-des"></i>Total penjualan bulan ini </i></span>
    </div>		
</div>
<br><br><br>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" class="">×</span>
        </button>
        <center><h3>Selamat Datang Anda Login Sebagai Admin:)</h3></center>
    </div>
  </div>
</div>
          
    <!-- footer content -->
    <footer>
      <div class="pull-right">
        Apotek Sehat Medika
      </div>
      <div class="clearfix"></div>
    </footer>
        <!-- /footer content -->
    

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
