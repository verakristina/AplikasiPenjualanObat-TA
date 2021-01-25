<?php
	include'../koneksi.php';

	$id_user=$_POST['id_user'];
	$username=$_POST['username'];
	$nama=$_POST['nama'];
	$password=$_POST['password'];
	$alamat=$_POST['alamat'];	
	$no_hp=$_POST['no_hp'];
	$level=$_POST['Level'];

	$a=mysqli_query($koneksi,"INSERT INTO user (id_user, username, nama, password, alamat, no_hp, level) VALUES('$id_user','$username','$nama','$password','$alamat','$no_hp', '$level')");

	if(!$a){
		echo "<script>
		alert('Tambah Data user Gagal');
		window.location='data_user.php';
		</script>";
	}else{
		echo "<script>
		alert('Tambah Data User Berhasil');
		window.location='data_user.php';
		</script>";
	}
?>