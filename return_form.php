<?php 
	$page="Pengembalian";
	include 'asset/header.php';
	$id_borrow = $_GET['id_borrow'];
	
	if (isset($_GET['act'])){
			// hapus user
			$act= $_GET['act'];
			
			if ($act == "returned") {
				$id_borrower = $_POST['id_borrower'];  
				$date = date("d/m/Y"); 
				
				// password verification  
				$verifrt = mysqli_query($con,"SELECT * FROM borrow WHERE id_borrow='$id_borrow' AND id_borrower='$id_borrower'");
				$cekrt = mysqli_num_rows($verifrt);

				if ($cekrt == 1){
					//upload file
					$target_dir = "asset/img/doc/";
					$target_file = $target_dir . $id_borrower . "_" . basename($_FILES["dokum"]["name"]);
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
					$filename = $id_borrower . "_" . basename($_FILES["dokum"]["name"]);

					// Check if image file is a actual image or fake image
					if(isset($_POST["submit"])) {
					  $check = getimagesize($_FILES["dokum"]["tmp_name"]);
					  if($check !== false) {
						$uploadOk = 1;
					  } else {
						echo "<p>Format gambar tidak didukung.</p><hr />";
						$uploadOk = 0;
					  }
					}

					// Check if file already exists
					if (file_exists($target_file)) {
					  echo "<p>File terdeteksi duplikat.</p><hr />";
					  $uploadOk = 0;
					}

					// Check file size
					if ($_FILES["dokum"]["size"] > 5000000) {
					  echo "<p>Maksimum file dokumentasi adalah 4MB.</p><hr />";
					  $uploadOk = 0;
					}

					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					  echo "<p>Hanya didukung format JPG, JPEG, PNG & GIF.</p><hr />";
					  $uploadOk = 0;
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						echo "<p>Galat! Terjadi kesalahan.</p><hr />";
						
						echo "<p style=\"font-size:small;padding:0 30px 0 30px;\" align=\"center\"><a href='return.php'>Kembali</a><br /><br />
						<a href=\"help.php\">Need a help? CLICK HERE</a><br />
						<a href=".$STurl.">Back to Homepage</p></a>";
						include 'asset/footer.php';
						exit();
					}
					
					// if everything is ok, try to upload file
					else {
						if (move_uploaded_file($_FILES["dokum"]["tmp_name"], $target_file)) {
							$sql = "UPDATE borrow SET status_borrow = 2, date_return = '$date', doc_return = '$filename' WHERE id_borrow = '".$id_borrow."'";
							if ($con->query($sql) === TRUE) {
							  echo "<p>Form pengembalian dengan ID ".$id_borrow." telah diterima. Silahkan tunggu pihak pengelola melakukan acc!</p>";
							  echo "<p style=\"font-size:small;padding:0 30px 0 30px;\" align=\"center\"><a href=\"help.php\">Need a help? CLICK HERE</a><br />
								<a href=".$STurl.">Back to Homepage</p></a>";
							  include 'asset/footer.php';
							  exit();
							} else {
							  echo "Error: " . $sql . "<br>" . $con->error;
							  echo "<p style=\"font-size:small;padding:0 30px 0 30px;\" align=\"center\">
							  <a href=\"help.php\">Need a help? CLICK HERE</a><br />
							  <a href=".$STurl.">Back to Homepage</p></a>";
							  include 'asset/footer.php';
							  exit();
							}
						}
					}
				}
				else {
					echo "<p>ID yang kamu masukan tidak sesuai!</p>";
					echo "<p style=\"font-size:small;padding:0 30px 0 30px;\" align=\"center\"><a href='return.php'>Kembali</a><br /><br />
						<a href=\"help.php\">Need a help? CLICK HERE</a><br />
						<a href=".$STurl.">Back to Homepage</p></a>";
					include 'asset/footer.php';
				}
			}
			
			if ($act == "cancelBorrow") {
				$id_borrower = $_POST['id_borrower'];  
				
				// password verification  
				$verifrt = mysqli_query($con,"SELECT * FROM borrow WHERE id_borrow='$id_borrow' AND id_borrower='$id_borrower'");
				$cekrt = mysqli_num_rows($verifrt);

				if ($cekrt == 1){  
					mysqli_query($con, "DELETE FROM user WHERE id_user ='".$id_user."'");
					echo "<p>Form pengembalian dengan ID ".$id_borrow." telah dihapus!</p>";
					echo "<p style=\"font-size:small;padding:0 30px 0 30px;\" align=\"center\"><a href='return.php'>Kembali</a><br /><br />
						<a href=\"help.php\">Need a help? CLICK HERE</a><br />
						<a href=".$STurl.">Back to Homepage</p></a>";
					include 'asset/footer.php';
				}  
				else{  
					$userpanel = "";   
					echo "<p>ID yang kamu masukan tidak sesuai!</p>";
					echo "<p style=\"font-size:small;padding:0 30px 0 30px;\" align=\"center\"><a href='return.php'>Kembali</a><br /><br />
						<a href=\"help.php\">Need a help? CLICK HERE</a><br />
						<a href=".$STurl.">Back to Homepage</p></a>";
					include 'asset/footer.php';
				}
				exit();
			}
	}
?>

<p>RETURNING<br />
ID Peminjaman: 
<?php echo $id_borrow;?>
</p>

<p><form id="signin" name="signin" method="post" action="<?php echo $_SERVER['PHP_SELF']."?act=returned&id_borrow=".$id_borrow;?>" class="text-align:center" enctype="multipart/form-data">
  	<p></p>
	<p><label class="text_label">NIM/NIK</label>
	<input type="text" name="id_borrower" placeholder="cth: 1700000"/></p>
	
	<p>Upload Dokumentasi</p><p><input type="file" name="dokum" id="dokum"></p>
	
	<p>&nbsp;</p>
	
	<p><input type="submit" class="button" value="Submit"></p>
</form></p>

<p style="font-size:small;padding:0 30px 0 30px;" align="center"><a href="help.php">Need a help? CLICK HERE</a><br />
<a href="<?php echo $STurl;?>">Back to Homepage</p></a>
<?php include 'asset/footer.php';?>