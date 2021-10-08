<?php
//verifikasi user

if (!isset($_SESSION['id_user'])) 
{ 
	echo "<h1>PERINGATAN!!</h1>"; 
	echo "<p>Maaf... fasilitas ini hanya untuk pengelola dan staf laboratorium</p>";  
	echo "<p><a href=../signin.php>login kembali</a></p>"; 
	exit;  
}
?>