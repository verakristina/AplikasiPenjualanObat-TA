<?php
	include '../koneksi.php';

	$id=$_GET['id'];
	$hapus=mysqli_query($koneksi,"DELETE FROM user WHERE id_user='$id'");

	if(!$hapus){
		echo "Gagal";
	}else{
		header('location:data_user.php');
	}
?>