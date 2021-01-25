<?php

include '../koneksi.php';

$nama_obat = $_POST['nama_obat'];

$sql_query = "SELECT * FROM obat WHERE kode_obat = '$nama_obat'";
$sql_execute = mysqli_query($koneksi, $sql_query);

while($data = mysqli_fetch_assoc($sql_execute)){
	echo $data['harga_jual'];
}

?>