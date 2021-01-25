<?php
include '../koneksi.php';
include 'header.php';

if (isset($_POST["Cari"])) {
	
}
?>

      
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Obat<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<form>
				<input type="submit" name="Cari" class="nav navbar-right" value="Search"/>
				<input type="text" name="query" placeholder="Cari Data" class="nav navbar-right"/>
			</form>
                    <table id="" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Id Obat</th>
                          <th>Nama Obat</th>
                          <th>Supplier</th>
                          <th>Id Kategori</th>
                          <th>Satuan</th>
						  <th>Tanggal Expired</th>
						   <th>Stok</th>
                          <th>Harga Jual</th>
						  
                        </tr>
                      </thead>
 <tbody align="center">
        <br>
        <?php
        $data = "";
        if (isset($_GET['Cari'])){
              $nama_obat = $_GET['query'];
              $data = mysqli_query($koneksi, "SELECT * FROM obat WHERE nama_obat LIKE '%".$nama_obat."%'");
          }else{
              $data = mysqli_query($koneksi, "SELECT * FROM obat");
          }
        while($key = mysqli_fetch_assoc($data)){ ?>
          <tr>
            <td><?php echo $key['kode_obat']; ?></td>
            <td><?php echo $key['nama_obat']; ?></td>
                        <td><?php echo $key['supplier']; ?></td>
                        <td><?php echo $key['id_kategori']; ?></td>
                        <td><?php echo $key['satuan']; ?></td>
                        <td><?php echo $key['tanggal_expired']; ?></td>
                        <td><?php echo $key['stok']; ?></td>
                        <td><?php echo $key['harga_jual']; ?></td>
                       
                     
                        
          </tr>

        <?php }
        ?>
      </tbody>
                    </table>
                  </div>
                </div>
              </div>

                       
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
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