<?php
session_start();
include '../koneksi.php';

date_default_timezone_set("Asia/Jakarta");

$user         = $_SESSION['username'];



	$tanggal    = date("y-m-d");
	

$total1           = $_POST['input_total'];
$total         = str_replace(".", "", $total1);

$bayar           = $_POST['input_bayar'];
$bayar_t         = str_replace(".", "", $bayar);

$kem           = $_POST['input_kembali'];
$kembali         = str_replace(".", "", $kem);





$query=mysql_query("

INSERT INTO `apotek_vera`.`transaksi_penjualan`
            (`id`,
             `customer`,
             `tgl`,
             `total_harga`,
             `total_bayar`,
             `kembali`, diskon, kasir)
		
		VALUES ('$LastID',
		        '-',
		        '$tanggal',
		        '$total',
		        '$bayar_t',
		        '$kembali','$pot', '$user')

		        ");




$que12=mysql_query("INSERT INTO detail_transaksi (id, kode_obat, harga,diskon, qty, subtotal, pot) 
SELECT id, kode_obat,harga,  diskon, qty, subtotal, pot FROM temp");

$que2=mysql_query("DELETE FROM `temp`");
      

header("location:struk.php?kode=$LastID");


 
?>
