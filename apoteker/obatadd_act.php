<?php
	include'../koneksi.php';

	$kode_obat=$_POST['kode_obat'];
	$nama_obat=$_POST['nama_obat'];
	$supplier=$_POST['supplier'];
	$id_kategori=$_POST['id_kategori'];
	$satuan=$_POST['satuan'];	
	$tanggal_expired=$_POST['tanggal_expired'];
	$stok=$_POST['stok'];
	$harga_jual=$_POST['harga_jual'];


	$a=mysqli_query($koneksi,"INSERT INTO obat (kode_obat, nama_obat, supplier, id_kategori, satuan, tanggal_expired, stok, harga_jual) VALUES('$kode_obat','$nama_obat','$supplier','$id_kategori','$satuan','$tanggal_expired','$stok','$harga_jual')");

	if(!$a){
		echo "<script>
		alert('Tambah Data Obat Gagal');
		window.location='data_obat.php';
		</script>";
	}else{
		echo "<script>
		alert('Tambah Data Obat Berhasil');
		window.location='data_obat.php';
		</script>";
	}
?>
