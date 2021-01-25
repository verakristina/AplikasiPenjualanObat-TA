<?php

include '../koneksi.php';
include 'header.php';

function OtomatisID()
{
$querycount="SELECT COUNT(id) as LastID FROM transaksi_penjualan";
$result=mysql_query($querycount) or die(mysql_error());
$row=mysql_fetch_array($result);
return $row['LastID'];
}


$sql_query_1 = "SELECT COUNT(*) AS Total FROM transaksi_penjualan";
$sql_execute_1 = mysqli_query($koneksi, $sql_query_1);
$sql_assoc_1 = mysqli_fetch_assoc($sql_execute_1);


?>

 <!-- page content -->
       
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Penjualan<small></small></h2>
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
				  <div class="x_content">
                    <br />
					
                         

          
          <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate>

                     
                      <span class="section">Input Data Penjualan</span>

                      <div class="item form-group">
					  <?php

				$code = "";
				$get = $sql_assoc_1['Total'] + 1;

				if($sql_assoc_1['Total'] >= 10){
					$code = "Trx0".$get;
				}else{
					$code = "Trx00".$get;
				}

				?>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Id Obat <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" "2" name="id"  required="required" type="text" value="<?php echo $code ?>" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
				
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Obat <span class="required"></span>
                        </label>
						<?php
						$sql = mysql_query("select * from obat")
                      ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control selectpicker" name="id_kategori" data-live-search="true" required="required" class="form-control col-md-7 col-xs-12">
					   <option disabled selected value> -- Pilih Salah Satu -- </option>
                      <?php $a=mysqli_query($koneksi,"SELECT * FROM obat");
							while($b=mysqli_fetch_assoc($a)){
							echo "<option value=$b[kode_obat]>$b[nama_obat]</option>";}
					  ?>    
            
						 </select>
                             
						</div>  
                        
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jumlah <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="jumlah" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                </div>

        </div>
          </form>

 
          <div class="x_content">
          
                <table class="table table-bordered">
                  <thead>
        <?php 
          $sql = mysqli_query($koneksi, "select * from detail_transaksi")
        ?>
                      <tr  style="color: #F8F8FF" bgcolor="#2F4F4F" >
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Kode Obat</th>
                          <th style="text-align: center;">Nama Obat</th>
                          <th style="text-align: center;">Harga</th>
                          <th style="text-align: center;">Qty</th>
                          <th style="text-align: center;">Sub Total</th>
                          <th style="text-align: center;">Action</th>

                      </tr>
                  </thead>
                      <tbody>
                  <?php
                    $no=1;
                    while ($data=mysqli_fetch_array($sql)) {

                  ?>
                      <tr style="color: #2F4F4F">
                            <td align="center"><?php echo $no++; ?></td>
                            <td>OB-00<?php echo $data['kode_obat'] ?></td>
                            <td><?php echo $data['nama_obat'] ?></td>
                            <td>Rp. <?php echo number_format($data['harga']) ?>,-</td>
                            <td align="center"><?php echo $data['diskon']?></td>
                            <td align="center"><?php echo $data['jumlah_obat']?></td>
                            <td >Rp. <?php echo number_format($data['subtotal']) ?>,-</td>

                            <td align="center">
<a onClick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='h-temp-jual.php?kode=<?php echo $data['kode_obat']; ?>' }" class="glyphicon glyphicon-trash"></a>
                            </td>
                            
                  </tr>
               <?php } ?>   
            
                      </tbody>
                    </table>
            <?php $sql = mysqli_query($koneksi, "SELECT sum(subtotal) as total from detail_transaksi") ?>
      <form action="selesai.php" class="form-horizontal form-label-left" method="post">


                
            <div class="form-group">
                        <label class="control-label col-md-9 col-sm-3 col-xs-12" for="first-name"> Grand Total <span class="required"></span></label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" name="input_total" id="input-total" required="required" class="form-control col-md-7 col-xs-12" readonly value=" "/>
                        </div></div>

            <div class="form-group">
                        <label class="control-label col-md-9 col-sm-3 col-xs-12" for="first-name"> Bayar<span class="required"></span></label>
                        <div class="col-md-3 col-sm-6 col-xs-12" id="input">
                        <input type="text" name="input_bayar" id="input-bayar" required="required" value="" class="form-control col-md-7 col-xs-12" />
                        </div></div>


                    <div class="form-group">
                        <label class="control-label col-md-9 col-sm-3 col-xs-12" for="first-name"> Kembali <span class="required"></span></label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                        <input type="text" name="input_kembali" id="input-kembali" required="required" class="form-control col-md-7 col-xs-12" readonly value=""/>
                        </div></div>

            <div class="control-label col-md-12 col-sm-3 col-xs-12" >
                        <input class="btn btn-primary btn-sm" type="submit" name="nama" value="Print & Simpan">
                        <a href="transaksi.php"  class="btn btn-dark btn-sm"><span class=""></span>Kembali</a>
 
                         <script>
 
// memformat angka ribuan
function formatAngka(angka) {
 if (typeof(angka) != 'string') angka = angka.toString();
 var reg = new RegExp('([0-9]+)([0-9]{3})');
 while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
 return angka;
}
  
// nilai total ditulis langsung, bisa dari hasil perhitungan lain
var total = <?php echo $data['total'] ?>,
 bayar = 0;
 kembali = 0;
 
// masukkan angka total dari variabel
$('#input-total').val(formatAngka(total));
 
// tambah event keypress untuk input bayar
$('#input-bayar').on('keypress', function(e) {
 var c = e.keyCode || e.charCode;
 switch (c) {
  case 8: case 9: case 27: case 13: return;
  case 65:
   if (e.ctrlKey === true) return;
 }
 if (c < 48 || c > 57) e.preventDefault();
}).on('keyup', function() {
 var inp = $(this).val().replace(/\./g, '');
  
 // set nilai ke variabel bayar
 bayar = new Number(inp);
 $(this).val(formatAngka(inp));
  
 // set kembalian, validasi
 if (bayar > total) kembali = bayar - total;
 if (total > bayar) kembali = 0;
 $('#input-kembali').val(formatAngka(kembali));
});
</script>
  
        <?php ?>

</div>
</div>
</form>


          </div>
      	  </div>
      	  </div>
      	  </div>



    
</div></div></div></div>
 <!-- footer content -->
        <footer>
          <div class="pull-right">
            Apotek sehat Medika</a>
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