<?php
	include'../koneksi.php';

	$data=$_POST['id_transaksi'];
	$id_user=$_POST['id_user'];
	$tanggal_transaksi=date("y-m-d");
	$total_harga=$_POST['total_harga'];
	$total_bayar=$_POST['total_bayar'];
	$kembali=$_POST['kembali'];	
	$jumlah = $_POST['jumlah'];
	$obat = $_POST['id_kategori'];
	
	
	

	$a=mysqli_query($koneksi,"INSERT INTO transaksi_penjualan (id_transaksi, id_user, tanggal_transaksi, total_harga, total_bayar, kembali) VALUES('$data','$id_user','$tanggal_transaksi','$total_harga','$total_bayar','$kembali')");
	
	$b = mysqli_query($koneksi,"UPDATE obat SET stok = (stok-$jumlah) WHERE kode_obat='$obat'");


	if(!$a){
		echo "<script>
		alert('Tambah Data transaksi Gagal');
		window.location='';
		</script>";
	}else{
		echo "<script>
		alert('Tambah Data Transaksi Berhasil');
		window.location='transaksi.php';
		</script>";
	}
?>
