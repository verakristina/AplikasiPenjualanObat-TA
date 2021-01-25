<?php
include '../koneksi.php';
include 'header.php';

if (isset($_POST["Cari"])) {
	
}
?>
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Obat</h2>
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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-dark"><span class="glyphicon glyphicon-plus"  data-toggle="modal" data-target=.bs-example-modal-lg></span><b> Tambah Data</b></button>

			<form class="navbar-form navbar-right" role="search">
			  <div class="form-group">
				<input type="text" name="query" class="form-control" placeholder="Search">
			  </div>
			  <button type="submit" name="Cari" class="btn btn-default">Submit</button>
			</form>
			

			<div class="modal fade bs-example-modal-lg" tabindex="-1" rolw="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
							</button>

							<h4 class="modal-title" id="myModalLabel">Form Data Obat</h4>
						</div>
						<div class="modal-body">
							<form action="obatadd_act.php" class="form-horizontal form-label-left" method="post">
								<?php
								$random_code = rand(1, 100);

								$chdt = "";
								if($random_code >= 10){
								$chdt = "BR0".$random_code;
								}else{
								$chdt = "BR00".$random_code;
								}
							?>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Kode Obat</label>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<input type="text" name="kode_obat" class="form-control col-md-7 col-xs-12" value="<?php echo $chdt; ?>"readonly required>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nama Obat</label>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<input type="text" name="nama_obat" class="form-control col-md-7 col-xs-12" required>
								</div>
							</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Supplier</label>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<input type="text" name="supplier" class="form-control col-md-7 col-xs-12" required>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Kategori</label>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<select name="id_kategori" class="form-control col-md-7 col-xs-12" required>
											<option value=""selected>Pilih Kategori</option>
											<?php $a=mysqli_query($koneksi,"SELECT * FROM kategori");
								while($b=mysqli_fetch_assoc($a)){
									echo "<option value=$b[id_kategori]>$b[nama_kategori]</option>";
								}
							?>
										</select>
									</div>

								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Satuan</label>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<input type="text" name="satuan" class="form-control col-md-7 col-xs-12" required>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Tanggla Expired</label>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<input type="date" name="tanggal_expired" class="form-control col-md-7 col-xs-12" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Stok</label>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<input type="number" name="stok" class="form-control col-md-7 col-xs-12" required>
								</div>
								<label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Harga Jual</label>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<input type="number" name="harga_jual" class="form-control col-md-7 col-xs-12" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" name="nama" value="Simpan">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

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
						   <th>Aksi</th>
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
                        <td>
                           <a href="update_obat.php?id=<?php echo $key['kode_obat'] ?>"  class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-edit">  Edit</span></a>
                           <a name="hapus" onClick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_obat.php?id=<?php echo $key['kode_obat']; ?>' }"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-trash">  Hapus</span></a>
                        </td>
                     
                        
          </tr>

        <?php }
        ?>
      </tbody>
                    </table>
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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