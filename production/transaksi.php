<?php
session_start();
if($_SESSION['login']==false){
  header('location=index.php');
}
  
include '../koneksi.php';
include 'header.php';

?>

 
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  

                    <h2>Data Penjualan Obat<small></small></h2>
                  <div class="x_content">
          
                     <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-dark "><span class="glyphicon glyphicon-folder-open" data-toggle="modal" data-target=".bs-example-modal-lg"> </span><b> Tambah Data</b></button><p>
                   
           <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Form data Penjualan</h4>
                        </div>
                        <div class="modal-body">
                          
                          <form action="chart.php" class="form-horizontal form-label-left" method="post" >
            <?php

            $random_code = rand(1, 100);

            $chdt = "";
            if($random_code >= 10){
            $chdt = "Trx0".$random_code;
            }else{
            $chdt = "Trx00".$random_code;
            }

            ?>
                            <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Id Transaksi </label>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="text" name="id_transaksi" class="form-control col-md-7 col-xs-12" value="<?php echo $chdt; ?>" readonly required >
                        </div>
            
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Nama User</label>
              
              <div class="col-md-4 col-sm-6 col-xs-12">
                             <input type="text" name="id_user" class="form-control col-md-7 col-xs-12" value="<?php echo $_SESSION['username']; ?>"  required >
                            
                        </div>
            
                       
                        </div>
                                
            <div class="form-group">
                          
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Nama Obat</label>
              
                           <div class="col-md-3 col-sm-6 col-xs-12">
               <select name="id_kategori" id="id_kategori" class="form-control col-md-7 col-xs-12" required>
              <option value="" selected disabled>Pilih Obat </option>
              <?php $a=mysqli_query($koneksi,"SELECT * FROM obat WHERE tanggal_expired > now()");
                while($b=mysqli_fetch_assoc($a)){
                  echo "<option value='$b[kode_obat]'>$b[nama_obat]</option>";
                }
              
              ?>
            </select>
            </div>
                          <div>
                        </div>
            
            <div class="form-group">
                          <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Jumlah</label>
                           
                            <div class="col-md-4 col-sm-6 col-xs-12">
                           <input type="number" name="jumlah" id="jumlah" class="form-control col-md-7 col-xs-12" onkeyup="hitung();" value="1" required>
               
                        </div>  
                       </div>
                        </div>
                                    
                             <div class="form-group">
               <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Harga </label>
                           
                             <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="number" name="harga" id="harga" value="0" class="form-control col-md-7 col-xs-12"  required readonly>
            </div>
            
            
          
             <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Total Harga</label>
                            
                            <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number"name="total_harga" id="total_harga" required="required" class="form-control col-md-7 col-xs-12" value="0" readonly required>
                            
                        </div>
                        </div>
            </div>
             <div class="form-group">
               <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Total Bayar </label>
                           
                             <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="number" name="total_bayar" id="total_bayar" value="" class="form-control col-md-7 col-xs-12" onkeyup="hitung()" required >
            </div>
            
            
          
             <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Kembali</label>
                            
                            <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number"name="kembali" id="kembali"  class="form-control col-md-7 col-xs-12" value="0" readonly >
                            
                        </div>
                        </div>
            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <input type="submit"  class="btn btn-primary" name="simpan" value="Simpan">

                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
          
                  <?php 
                  $query = mysqli_query($koneksi,"select * from transaksi_penjualan");
                  ?>
                    <table id="datatable-keytabl" class="table basic-table">
                      <thead>
                        <tr style="color: #2F4F4F">
                          <th>No</th>
                          <th>Id Transaksi</th>
              <th>User</th>
                          <th> Tanggal </th>
                          <th>Total Harga </th>
                          <th>Total Bayar</th>
                          <th>Kembali</th>
                         
                          <th>Aksi</th>

                        </tr>
                      </thead>

                      <tbody>
                      <?php 
                      $no=1;
                      while ( $data=mysqli_fetch_array($query)) 
                        {
                          $tanggal_transaksi = $data['tanggal_transaksi'];
                          $day = date('D', strtotime($tanggal_transaksi));
                          $dayList = array(
                              'Sun' => 'Minggu',
                              'Mon' => 'Senin',
                              'Tue' => 'Selasa',
                              'Wed' => 'Rabu',
                              'Thu' => 'Kamis',
                              'Fri' => 'Jumat',
                              'Sat' => 'Sabtu'
                          );
                          ?>
                        <tr style="color: #2F4F4F">
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['id_transaksi'] ?></td>
               <td><?php echo $data['id_user'] ?></td>
                          <td><?php  echo($data['tanggal_transaksi']) ?> </td>
                          <td>Rp. <?php echo number_format($data['total_harga']) ?>,-</td>
                          <td>Rp. <?php echo number_format($data['total_bayar']) ?>,-</td>
                          <td>Rp. <?php echo number_format($data['kembali']) ?>,-</td>
             
                        
                          <td>
<!-- Codes by dewainside.blogspot.com -->
<script type="text/javascript">
// Popup window code
function newPopup(url) {
    popupWindow = window.open(
        url,'popUpWindow','height=550,width=595,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
<a href="JavaScript:newPopup('struk.php?kode=<?php echo $data['id_transaksi'] ?>');" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span></a>

                          </td>

                        </tr>
                       
                        <?php } ?>
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
  
  <!-- JQuery Ajax -->
  <script>
    $('#id_kategori').bind('change', function(){
      var nama_obat = $('#id_kategori').val();
      var jumlah = document.getElementById('jumlah').value;
      $.ajax({
        url: "get_price.php",
        method: "POST",
        dataType: "html",
        data: {nama_obat: nama_obat},
        success: function(response){
          var hasil = response * jumlah;
          $('#harga').val(response);
          $('#total_harga').val(hasil);
        },
      });
    });
    
    function hitung(){
      var harga = document.getElementById('harga').value;
      var jumlah = document.getElementById('jumlah').value;
      
      var hasil = harga * jumlah;
      
      $('#total_harga').val(hasil);
    }
    
    $(function(){
      $('#total_bayar').on('keyup', function(){
        var a = $('#total_bayar').val();
        var b = $('#total_harga').val();
          var hasil=a-b;
        
        $('#kembali').val(hasil);
      })
    })
    
  </script>
  
  </body>
</html>