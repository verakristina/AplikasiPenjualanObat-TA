<?php

include '../../koneksi.php';
include 'header.php';

if (isset($_POST["Cari"])) {
  # code...
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Apotek sehat medika! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Apotek sehat medika</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Vera</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class=""></span></a>
                  
                  </li>
                  <li><a><i class="fa fa-suitcase"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="admin/obat.php">Data Obat</a></li>
                      <li><a href="form_advanced.html">Data User</a></li>
                    </ul>
                  </li>
				  
                  <li><a><i class="fa fa-random"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">Penjualan</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Penjualan</a></li>
                      <li><a href="tables_dynamic.html">Expired</a></li>
					   <li><a href="tables.html">Stok</a></li>
                    </ul>
                  </li>
                  <li><a href="logout.php"><i  class="fa fa-sign-out"></i> Log Out <span class=""></span></a></li>
                 
                    </ul>
                  </li>                  
                 
              </div>	

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
       
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

             
              </ul>
            </nav>
          </div>
        </div>

    <div id="main">
    
    <br>
     
      <div class="col-md-12">  
      <div class="panel panel-default">
      <div class="panel-heading">
       <h1> <center>Menu Data Obat</center></div></h1>
      <div class="panel-body">
      <div class="main">
    
   
    <table align="center">
    <br>

    <table border="2" width="1000px" align="center">
        <form>
         <center> <input type="text" name="query" placeholder="Cari Data" />
         <input type="submit" name="Cari" value="Search"/></center>
        </form>
      <thead align="center">
         <tr  style="color: #FFFFFF" bgcolor="#3b5988" >
                  
                          <th style="text-align: center;">Kode Obat</th>
                          <th style="text-align: center;">Nama Obat</th>
                          <th style="text-align: center;">Supplier</th>
                          <th style="text-align: center;">Id Kategori</th>
                          <th style="text-align: center;">Satuan</th>
                          <th style="text-align: center;">Tgl-Expired</th>
                          <th style="text-align: center;">Stok</th>
                          <th style="text-align: center;">Harga Jual</th>
                          <th style="text-align: center;">Aksi</th>
          </tr>
          <tr>
  
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
                           <a href="update_obat_form.php?id=<?php echo $key['kode_obat'] ?>"  class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-edit">  Edit</span></a>
                           <a name="hapus" onClick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_obat.php?id=<?php echo $key['kode_obat']; ?>' }"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-trash">  Hapus</span></a>
                        </td>
                     
                        
          </tr>

        <?php }
        ?>
      </tbody>
       

        <center><a href="form.php" class="btn btn-dark"><span class="glyphicon glyphicon-folder-open"> </span><b> Tambah Data Obat</b></a></button><p></a></center> 
    </table>
    <br>
  </div>
  </div>
  <script type="text/javascript">
        function openSideMenu(){
  document.getElementById('side-menu').style.width= '225px';
  document.getElementById('main').style.marginLeft= '225px';
}  function closeSlideMenu(){
      document.getElementById('side-menu').style.width = '0';
      document.getElementById('main').style.marginLeft = '0';
    }


    </script>
</body>
</html>