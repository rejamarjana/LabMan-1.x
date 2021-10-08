<?php 
 	$page="Halaman Admin";
	include '../asset/header.php';
	include 'verif_user.php'; 
	
	if (isset($_GET['act'])){
		// hapus user
		$act= $_GET['act'];
				
		if ($act== "clearHistory"){
			$verif= $_GET['verif'];
			if ($verif == 0){
				echo "<p><form id=\"signin\" name=\"signin\" method=\"post\" action=". $_SERVER['PHP_SELF']."?act=clearHistory&verif=1 class=\"text-align:center\" enctype=\"multipart/form-data\">
					<p></p>
					<p><label class=\"text_label\">Masukan Password</label><br />
					<input type=\"password\" name=\"password_verif\" placeholder=\"&bull;&bull;&bull;&bull;&bull;&bull;\"/></p>
					<p><input type=\"submit\" class=\"button\" value=\"Submit\"></p>
				</form></p>";
				
				echo "<a href=\"javascript: window.history.go(-1)\">Kembali ke Admin Homepage</a><br /><br />";
				include '../asset/footer.php';
				exit();
			}
			else if ($verif == 1){
				$password_verif = md5($_POST['password_verif']);  
				$id_user = $_SESSION['id_user'];
				
				// password verification  
				$data = mysqli_query($con,"SELECT * from user WHERE id_user='$id_user' AND password='$password_verif'");
				$cek = mysqli_num_rows($data);

				if ($cek == 1){
					$query = "DELETE FROM borrow";
					if ($con->query($query) === TRUE) {
						  //delete file dokumentasi
							//folder
							$dir = "../asset/img/doc/";
							//Get a list of all of the file names in the folder.
							$files = glob($dir . '*');

							//Loop through the file list.
							foreach($files as $file){
								//Make sure that this is a file and not a directory.
								if(is_file($file)){
									//Use the unlink function to delete the file.
									unlink($file);
								}
							}
								
						  //PEMBERSIHAN BERHASIL		
						  echo "RIWAYAT PEMINJAMAN BERHASIL DIBERSIHKAN.<br />
								TINDAKAN INI TIDAK DAPAT DIKEMBALIKAN.";
						} else {
						  echo "Error: " . $query . "<br />" . $con->error;
						}
				}  
				else{  
					$userpanel = "";   
					echo "<p style=\"color:red\">Password salah!</p>";
				}
			}
		}
		else if ($act == ""){

		}
	}
?>

<div>
	<p></p>
	<h3 style="background:#99f;">Riwayat Peminjaman</h3>
	
	<p align="right"><a href="borrow_export.php">Export ke Excel(*.xls)</a></p>
	
	<?php
		$qSelectBorrow = "SELECT * FROM borrow GROUP BY borrow_type DESC";
		$dataBorrow = mysqli_query($con, $qSelectBorrow);
		while ($data_Borrow = mysqli_fetch_array($dataBorrow))
		{
			echo "<p align='left'><b>Kategori</b> : ";
			if ($data_Borrow['borrow_type'] == "BT1"){
				echo "Kelas Eksperimen Fisika Dasar";
			}
			else if ($data_Borrow['borrow_type'] == "BT2"){
				echo "Mata Kuliah Lain";
			}
			else if ($data_Borrow['borrow_type'] == "BT3"){
				echo "Penelitian";
			}
			else {
				echo "Lainnya";
			}
			
			echo "</p>";
			$qSBorrow = "SELECT * FROM borrow WHERE borrow_type ='".$data_Borrow['borrow_type']."' ORDER BY id_borrow DESC";
			$dataBorrow2 = mysqli_query($con, $qSBorrow);
			echo "<div style='overflow-x:auto'><table style='text-align:left'>
					<tr>
						<td>ID</td>
						<td>Status</td>
						<td>NIM</td>
						<td>Nama</td>
						<td>Peminjaman</td>
						<td>Pengembalian</td>
						<td>Dosen Pengampu</td>
						<td>Keterangan</td>
						<td>Dokumentasi</td>
					</tr>";
			while ($data_Borrow2 = mysqli_fetch_array($dataBorrow2)){
			  echo "<tr>
						<td>".$data_Borrow2['id_borrow']."</td>
						<td>".br_status($data_Borrow2)."</td>
						<td>".$data_Borrow2['id_borrower']."</td>
						<td>".$data_Borrow2['name_borrower']."</td>
						<td>".$data_Borrow2['date_borrow']."</td>
						<td>".$data_Borrow2['date_return']."</td>
						<td>".$data_Borrow2['dosen_pj']."</td>
						<td>".$data_Borrow2['more']."</td>
						<td>
						<a href='".$STurl."asset/img/doc/".$data_Borrow2['doc_borrow']."' target='_blank'>Peminjaman</a> <br/>
						<a href='".$STurl."asset/img/doc/".$data_Borrow2['doc_return']."' target='_blank'>Pengembalian</a>
						</td>
					</tr>";
			}
			echo "</table></div>";
		}
	?>
	<p align="left"><a href="?act=clearHistory&verif=0">Bersihkan semua*</a> <br/>
	<span style="font-size:small;color:red;">*) Peringatan! Pembersihan ini tidak dapat dikembalikan. <br />
	&nbsp;&nbsp;&nbsp;Harap backup (unduh cadangan) terlebih dahulu!</span></p>
</div>

<p style="font-size:small;padding:0 30px 0 30px;" align="center">
<a href="index.php">Kembali ke Admin Homepage</a><br />
<a href="help.php">Need a help? CLICK HERE</p></a>
<?php include '../asset/footer.php';?>