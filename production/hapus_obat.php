<?php
	include '../koneksi.php';

	$id=$_GET['id'];
	$hapus=mysqli_query($koneksi,"DELETE FROM obat WHERE kode_obat='$id'");

	if(!$hapus){
		echo "Gagal";
	}else{
		header('location:data_obat.php');
	}
?>