<?php

	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "apotek_vera";
	
	$koneksi = mysqli_connect($host, $username, $password,$database);
	
	// if($koneksi){
	// 	echo "";
		
	// 	//memilih database
	// 	$pilih_db = mysqli_select_db($koneksi, $database);
		
	// 	if($pilih_db){
	// 		echo "";
	// 	}
	// }else{
	// 	echo "Koneksi gagal, silahkan coba lagi";
	// }

