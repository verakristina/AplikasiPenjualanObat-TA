<?php

include '../koneksi.php';
include 'header.php';
?>

        <!-- /top navigation -->

        <!-- page content -->
       
          <div class="">
            <div class="page-title">
              <div class="title_left">
                
              </div>
                  </div>
            </div>

      
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Data User<small></small></h2>
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
				  <?php
    $edit = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$_GET[id]'");
    $a = mysqli_fetch_assoc($edit);
    ?>
                          <form action="#" class="form-horizontal form-label-left" method="post" >

                            <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Id User <span class="required"></span></label>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" name="id_user" required="required" class="form-control col-md-7 col-xs-12" readonly value="<?php echo $a['id_user']; ?>">
                        </div>


                            <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Username <span class="required"></span></label>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" name="username" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $a['username'] ?>">
                        </div>
                        </div>
                        </div>

                            <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Nama <span class="required"></span></label>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" name="nama" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $a['nama'] ?>">
                        </div>
                   
                         <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> 	password <span class="required"></span></label>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="password" id="first-name" name="password" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $a['password'] ?>">
						
                        </div>
						</div>
						</div>
                        
                         <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Alamat <span class="required"></span></label>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $a['alamat'] ?>">
                        
                        </div>
                        
						
						 <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> No-Hp<span class="required"></span></label>
                            
                            <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number" id="first-name" name="no_hp" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $a['no_hp'] ?>">
                        </div>
                        </div>
						</div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Status <span class="required"></span></label>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
                            <select type="text"  name="level" required="required" class="form-control col-md-7 col-xs-12"value="<?php echo $a['level'] ?>">
							    <option value="" selected>Pilih Status</option>
								<<option>Admin</option>}
								<<option>Apoteker</option>}</select>
                        </div>
                        </div>                  

                            <div class="form-group">
    



                        </div>
                        <div class="modal-footer">
						 <a href="data_user.php" class="btn btn-default" data-dismiss="modal">Batal</a>
                     <input class="btn btn-primary btn-sm" type="submit" name="submit" value="UPDATE">
                        </div>
                      </form>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
$username=$_POST['username'];
$nama=$_POST['nama'];
$password=$_POST['password'];   
$alamat=$_POST['alamat'];
$No_Hp=$_POST['no_hp'];
$level=$_POST['level'];

      if($username=='' || $nama=='' || $password=='' || $alamat==''){
        echo "Form belum lengkap";
        }else{
        $rubah = mysqli_query($koneksi,"UPDATE user SET username='$username',nama='$nama',password='$password',alamat='$alamat',no_hp='$No_Hp',level='$level' WHERE id_user='$a[id_user]'");
        if(!$rubah){
       echo "Proses Edit Data Gagal";
   }else{
        echo "
       <script>
        window.location = 'data_user.php';
       </script>
       ";
   }
}
}
ob_flush();
?>

                    <?php ?>
                  </div>
                </p></div></div>
              </div>
              </div>
                    

                 

      </tbody>
  
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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