<?php 
	$page="Peminjaman";
	include 'asset/header.php';

	if (isset($_GET['submit'])){
		$s_type = $_GET['submit'];

		if ($s_type == 1){
			$date = date("d/m/Y"); 
			$nama = $_POST['nama'];
			$nim = $_POST['nim'];
			$kelompok = $_POST['kelompok'];
			$kelompok2 = $_POST['kelompok2'];
			$pengampu = $_POST['pengampu'];
			$alat = $_POST['alat'];
			$borrow_type = $_GET['borrow_type'];
					
			//upload file
			$target_dir = "asset/img/doc/";
			$target_file = $target_dir . $nim . "_" . basename($_FILES["dokum"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			$filename = $nim . "_" . basename($_FILES["dokum"]["name"]);

			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			  $check = getimagesize($_FILES["dokum"]["tmp_name"]);
			  if($check !== false) {
				$uploadOk = 1;
			  } else {
				echo "<p>Maaf! Format tidak didukung.</p><hr />";
				$uploadOk = 0;
			  }
			}

			// Check if file already exists
			if (file_exists($target_file)) {
			  echo "<p>Maaf! file terdeteksi duplikat.</p><hr />";
			  $uploadOk = 0;
			}

			// Check file size
			if ($_FILES["dokum"]["size"] > 5000000) {
			  echo "<p>Maaf! Maksimum file dokumentasi adalah 4MB.</p><hr />";
			  $uploadOk = 0;
			}

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			  echo "<p>Maaf! Hanya didukung format JPG, JPEG, PNG & GIF.</p><hr />";
			  $uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  echo "<p>Maaf!  Peminjaman tidak berhasil.</p><hr />";
			}  
			
			// if everything is ok, try to upload file
			else {
			  if (move_uploaded_file($_FILES["dokum"]["tmp_name"], $target_file)) {
					$sql = "INSERT INTO borrow (borrow_type, date_borrow, id_borrower, name_borrower, item_borrow, dosen_pj, status_borrow, doc_borrow, doc_return, date_return, more) VALUES ('$borrow_type', '$date', '$nim', '$nama', '$alat', '$pengampu', '1', '$filename', 'NaN', 'NaN', 'Kelompok $kelompok : <br />$kelompok2')";
					if ($con->query($sql) === TRUE) {
					  echo "Input data sukses.<br />";
					} else {
					  echo "Error: " . $sql . "<br>" . $con->error;
					}

					$hasil2 = mysqli_query($con, "SELECT * FROM borrow WHERE id_borrower ='".$nim."' AND date_borrow ='".$date."'");
					while($row2 = mysqli_fetch_array($hasil2,1)){$id_borrow = $row2['id_borrow'];}
					
					// tampilkan data peminjaman
					echo "<p><b>ID Peminjaman kamu: </b><br />".$id_borrow."<br /></p>";
					
					echo "<ul>
							<li>Tanggal Peminjaman: <br />".$date."<br /></li>
							<li>Nama: <br />". $nama."<br /></li>
							<li>NIM: <br />". $nim."<br /></li>
							<li>Kelompok: <br />". $kelompok." (".$kelompok2.")<br /></li>
							<li>Pengampu: <br />". $pengampu."<br /></li>
							<li>Alat yang dipinjam: <br />". $alat."<br /></li>
							<li>Dokumentasi Peminjaman: <br/>
								<img src='asset/img/doc/".$filename. "' style='max-width:80%' /></li>
						  </ul>";
					
					echo "<p style='font-size:small;padding:0 30px 0 30px;' align='center'><a href='".$STurl."help.php'>Need a help? CLICK HERE</a><br />
					<a href=".$STurl.">Back to Homepage</p></a>";
					include 'asset/footer.php';
					exit();
			  } 
			  else {
				echo "<p>Maaf! Peminjaman tidak berhasil.</p><hr />";
			  }
			}
		}
		
		if ($s_type == 2){
			//catch nama, nim, matkul, kelompok, pengampu, alat, dokum
			$date = date("d/m/Y"); 
			$nama = $_POST['nama'];
			$nim = $_POST['nim'];
			$matkul = $_POST['matkul'];
			$kelompok = $_POST['kelompok'];
			$pengampu = $_POST['pengampu'];
			$alat = $_POST['alat'];
			$borrow_type = $_GET['borrow_type'];
					
			//upload file
			$target_dir = "asset/img/doc/";
			$target_file = $target_dir . $nim . "_" . basename($_FILES["dokum"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			$filename = $nim . "_" . basename($_FILES["dokum"]["name"]);

			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			  $check = getimagesize($_FILES["dokum"]["tmp_name"]);
			  if($check !== false) {
				$uploadOk = 1;
			  } else {
				echo "<p>Maaf! Format tidak didukung.</p><hr />";
				$uploadOk = 0;
			  }
			}

			// Check if file already exists
			if (file_exists($target_file)) {
			  echo "<p>Maaf! file terdeteksi duplikat.</p><hr />";
			  $uploadOk = 0;
			}

			// Check file size
			if ($_FILES["dokum"]["size"] > 5000000) {
			  echo "<p>Maaf! Maksimum file dokumentasi adalah 4MB.</p><hr />";
			  $uploadOk = 0;
			}

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			  echo "<p>Maaf! Hanya didukung format JPG, JPEG, PNG & GIF.</p><hr />";
			  $uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  echo "<p>Maaf!  Peminjaman tidak berhasil.</p><hr />";
			}  
			
			// if everything is ok, try to upload file
			else {
			  if (move_uploaded_file($_FILES["dokum"]["tmp_name"], $target_file)) {
					$sql = "INSERT INTO borrow (borrow_type, date_borrow, id_borrower, name_borrower, item_borrow, dosen_pj, status_borrow, doc_borrow, doc_return, date_return, more) VALUES ('$borrow_type', '$date', '$nim', '$nama', '$alat', '$pengampu', '1', '$filename', 'NaN', 'NaN', '$matkul <br />Rekan kelompok: $kelompok')";
					if ($con->query($sql) === TRUE) {
					  echo "Input data sukses.<br />";
					} else {
					  echo "Error: " . $sql . "<br>" . $con->error;
					}

					$hasil2 = mysqli_query($con, "SELECT * FROM borrow WHERE id_borrower ='".$nim."' AND date_borrow ='".$date."'");
					while($row2 = mysqli_fetch_array($hasil2,1)){$id_borrow = $row2['id_borrow'];}
					
					// tampilkan data peminjaman
					echo "<p><b>ID Peminjaman kamu: </b><br />".$id_borrow."<br /></p>";
				  	
					echo "<ul>
							<li>Tanggal peminjaman: <br />".$date."</li>
							<li>Nama: <br />". $nama."</li>
							<li>NIM: <br />". $nim."</li>
							<li>Pengampu: <br />". $pengampu."</li>
							<li>Mata kuliah: <br />". $matkul."</li>
							<li>Rekan kelompok: <br />". $kelompok."</li>
							<li>Alat yang dipinjam: <br />". $alat."</li>
							<li>Dokumentasi peminjaman: <br/>
								<img src='asset/img/doc/".$filename. "' style='max-width:80%' /></li>
						  </ul>";
					
					echo "<p style='font-size:small;padding:0 30px 0 30px;' align='center'><a href='".$STurl."help.php'>Need a help? CLICK HERE</a><br />
					<a href=".$STurl.">Back to Homepage</p></a>";
					include 'asset/footer.php';
					exit();
			  } 
			  else {
				echo "<p>Maaf!  Peminjaman tidak berhasil.</p><hr />";
			  }
			}
		}
		
		if ($s_type == 3){
			//catch nama, nim, pengampu, judul, rincian, alat, dokum
			$date = date("d/m/Y"); 
			$nama = $_POST['nama'];
			$nim = $_POST['nim'];
			$pengampu = $_POST['pengampu'];
			$judul = $_POST['judul'];
			$rincian = $_POST['rincian'];
			$alat = $_POST['alat'];
			$borrow_type = $_GET['borrow_type'];
					
			//upload file
			$target_dir = "asset/img/doc/";
			$target_file = $target_dir . $nim . "_" . basename($_FILES["dokum"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			$filename = $nim . "_" . basename($_FILES["dokum"]["name"]);

			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			  $check = getimagesize($_FILES["dokum"]["tmp_name"]);
			  if($check !== false) {
				$uploadOk = 1;
			  } else {
				echo "<p>Format tidak didukung.</p><hr />";
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
			  echo "<p>Maaf!  Peminjaman tidak berhasil.</p><hr />";
			}  
			
			// if everything is ok, try to upload file
			else {
			  if (move_uploaded_file($_FILES["dokum"]["tmp_name"], $target_file)) {
				  //input nama, nim, pengampu, judul, rincian, alat, dokum
					$sql = "INSERT INTO borrow (borrow_type, date_borrow, id_borrower, name_borrower, item_borrow, dosen_pj, status_borrow, doc_borrow, doc_return, date_return, more) VALUES ('$borrow_type', '$date', '$nim', '$nama', '$alat', '$pengampu', '1', '$filename', 'NaN', 'NaN', '$judul. <br />$rincian.')";
					if ($con->query($sql) === TRUE) {
					  echo "Input data sukses.<br />";
					} else {
					  echo "Error: " . $sql . "<br>" . $con->error;
					}

					$hasil2 = mysqli_query($con, "SELECT * FROM borrow WHERE id_borrower ='".$nim."' AND date_borrow ='".$date."'");
					while($row2 = mysqli_fetch_array($hasil2,1)){$id_borrow = $row2['id_borrow'];}
					
					// tampilkan data peminjaman
					echo "<p><b>ID Peminjaman kamu: </b><br />".$id_borrow."<br /></p>";
					
					echo "<ul>
							<li>Tanggal Peminjaman: <br />".$date."<br /></li>
							<li>Nama: <br />". $nama."<br /></li>
							<li>NIM: <br />". $nim."<br /></li>
							<li>Pengampu: <br />". $pengampu."<br /></li>
							<li>Judul: <br />". $judul."<br /></li>
							<li>Rincian: <br />". $rincian."<br /></li>
							<li>Alat yang dipinjam: <br />". $alat."<br /></li>
							<li>Dokumentasi Peminjaman: <br/>
								<img src='asset/img/doc/".$filename. "' style='max-width:80%' /></li>
						  </ul>";
					
					echo "<p style='font-size:small;padding:0 30px 0 30px;' align='center'><a href='".$STurl."help.php'>Need a help? CLICK HERE</a><br />
					<a href=".$STurl.">Back to Homepage</p></a>";
					include 'asset/footer.php';
					exit();
			  } 
			  else {
				echo "<p>Maaf!  Peminjaman tidak berhasil.</p><hr />";
			  }
			}
		}
	}
	
	if (isset($_GET['borrow_type'])){
		// tampilkan data peminjaman
		$borrow_type = $_GET['borrow_type'];
		
		if ($borrow_type == "BT1"){
			include 'asset/form/BT1.php';
		}
		
		else if ($borrow_type == "BT2"){
			include 'asset/form/BT2.php';
		}
		
		else if ($borrow_type == "BT3"){
			include 'asset/form/BT3.php';
		}
	}
	else {
		include 'asset/form/B1F.php';
	}
?>
	

<p style="font-size:small;padding:0 30px 0 30px;" align="center"><a href="help.php">Need a help? CLICK HERE</a><br />
<a href="<?php echo $STurl;?>">Back to Homepage</p></a>

<?php include 'asset/footer.php';?>
