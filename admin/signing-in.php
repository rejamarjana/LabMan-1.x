<?php 
	$page="Log Page";
	include "../asset/header.php"; 
	
	$id_user = $_POST['id_user']; 
	$password = md5($_POST['password']);  
	
	// password verification  
	$data = mysqli_query($con,"SELECT * from user WHERE id_user='$id_user' AND password='$password'");
	$cek = mysqli_num_rows($data);

	if ($cek == 1){  
		$_SESSION['id_user'] = $id_user;
		header("Location:".$STurl."admin");
	}  
	else{  
		$userpanel = "";   
		echo "<p>Password salah atau ID tidak terdaftar</p>";
		echo "<a href=../signin.php>login kembali</a>";
	}  
 
	include "../asset/footer.php"; 
?>
