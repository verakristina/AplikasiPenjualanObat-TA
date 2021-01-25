<?php
    include '../koneksi.php';
	include 'header.php';
?>


       
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

<strong><h3 align="center"><b> Laporan Stok Obat</h3></strong>


<br>
                   <table id="" class="table table-bordered">
                            <?php
                              $sql=mysqli_query($koneksi,"SELECT * FROM obat");
                            ?>
                    <thead>
                        <tr bgcolor="#DCDCDC">
                          <th width="2%"> No </th>
                          <th width="9%"> Kode Obat </th>
                          <th width="40%"> Nama Obat </th>
                          <th width="12%">Kategori</th>
                          <th width="10%">Satuan</th>
                          <th width="10%">Stok</th>
                          <th width="20%">Status</th>
                          </tr>
                    </thead>
                      <?php
                        $no=1;
                      while ($data=mysqli_fetch_array($sql)) 
                      { $p = $data['stok'] ;

                      if ($p<=10) {
                          $nilai = 'Minimum';
                      }else
                          $nilai = 'Normal';
                        ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['kode_obat'] ?></td>
                        <td><?php echo $data['nama_obat'] ?></td>
                        <td><?php echo $data['id_kategori'] ?></td>
                        <td><?php echo $data['satuan'] ?></td>
                        <td align="center"><?php echo $data['stok'] ?></td>
                        <td><?php echo $nilai ?></td>
                        
                      </tr>
                        <?php } ?>

<a href="stok-print.php" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-print"> </span> Cetak Laporan</a>

</div>
                    </tbody>
                    </table>
</div>
</div>
</div>
</div>
</div>
</div></div></div>


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
