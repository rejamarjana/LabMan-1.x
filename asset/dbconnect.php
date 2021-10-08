<?php
	//db info
	$HOST = 'localhost';
	$USER = 'root';
	$PASS = '';
	$DB = 'labman';
	//connecting
	$con = mysqli_connect($HOST, $USER, $PASS, $DB);
	
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
?>