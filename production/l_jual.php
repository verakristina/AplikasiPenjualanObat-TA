<?php
    include '../koneksi.php';
	include 'header.php';

?>


      
        
            <div class="page-title">
              
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <li><a class=""><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
        <div class="clearfix"></div>
                  </div>
                   <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">

<h2><b>Filter Sesuai Priode : </b></h2>
<p>
<p>
<p>

                    <form action="#" class="form-horizontal form-label-left" method="post" >

          <div class="form-group">
          <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Tanggal Mulai <span class="required" ></span></label>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class='input-group date' id="datetimerangepicker1" >
                                <input type='date' name="awal" required="" class="form-control"  data-date-format="YYYY/MM/DD" />
                                
                            </div>
                        </div>
                        </div>


          <div class="form-group">
          <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Tanggal Selesai <span class="required"></span></label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class='input-group date' id="datetimerangepicker2" >
                                <input type='date' name="akhir" required=""  class="form-control"  data-date-format="YYYY/MM/DD" />
                               
                            </div>
                        </div>
                        </div>
                        <br>
          <div class="col-md-2 col-md-offset-2">
          <input type="submit"  value="Filter" name="pencarian" class="btn btn-danger">
          </div>
          <br>
          <br>

<div class="ln_solid"></div>
          <?php
          if (isset($_POST['pencarian']))
          {

          $tgl_awal   = $_POST['awal'];
          $tgl_akhir  = $_POST['akhir'];

          $tanggalawal = date('Y-m-d', strtotime($tgl_awal));
          $tanggalakhir = date('Y-m-d', strtotime($tgl_akhir));

?>
<br>
<br>
<strong><h3 align="center"><b>Data Penjualan  </h3></strong>
<h4 align="center"><?php echo ($tanggalawal)  ?> - <?php echo($tanggalakhir) ?></b></h4>
  <?php } ?>
<br>

    <table id="" class="table table-keytable">


    <thead>
      <tr>
        
      </tr>
    </thead>
      <?php
      if ((isset($_POST['pencarian']))) {
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
        <td><?php echo $dt['kode_obat'] ?></td>
        <td><?php echo $dt['nama_obat'] ?></td>
        <td>Rp. <?php echo  number_format($dt['harga']) ?>,00,-</td>
        <td><?php echo $dt['jumlah_obat'] ?></td>
		<td><?php echo $dt['pot'] ?></td>
        <td>Rp. <?php echo number_format($dt['sub_total']) ?>,00,-</td>
      </tr>
    <?php } ?>
    <?php 
      $ac = mysqli_query($koneksi,"SELECT * FROM transaksi_penjualan WHERE id_transaksi='$a'")    ?>

      <tr bgcolor="#DCDCDC">
        <td colspan="4" rowspan="1"></td>
        <td>Total Harga</td>
        <?php while ($dr = mysqli_fetch_array($ac)) { ?>
        <td>: Rp. <?php echo number_format($dr['total_harga']) ?>,00,-</td>
      <?php } ?>
      </tr>
      

      <tr>
        <td height="40px" colspan="6" ></td>
      </tr>
      <tr>
      <?php } ?>
            <?php $my = mysqli_query($koneksi,"select sum(total_harga) as total from transaksi_penjualan where tanggal_transaksi between '$tgl_awal' and '$tgl_akhir' "); ?>
      <tr>
      <?php while ($a = mysqli_fetch_array($my)) { ?>
      <td colspan="6" align="right"><h4><b>Total Penjualan Bulan Ini : Rp. <?php echo number_format($a['total']) ?>,00,-</b></h4></td>
      <?php } ?>
      </tr>      


            <a href="l-jual-print.php?awal=<?php echo $tgl_awal ?>&&akhir=<?php echo $tgl_akhir ?>"  class="btn btn-danger btn-sm" target="_Blank"><span class="glyphicon glyphicon-print"> </span> Cetak Laporan</a>

    </tbody>
<?php } ?>
  </table>
    
</div>
</div>
</div>
</div>
</div>
</div></div>
<footer>
          <div class="pull-right">
            Apotek Sehat Medika</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>