<?php 
	$page="Pengembalian";
	include 'asset/header.php';?>

<p><b>PENGEMBALIAN</b></p>
	<?php
		if (isset($_GET['act'])){
			// hapus user
			$act= $_GET['act'];
			$id_borrow= $_GET['id_borrow'];
			
			if ($act== "viewBorrow"){
				// lihat isi peminjaman
				$sql = mysqli_query($con, "SELECT * FROM borrow WHERE id_borrow ='".$id_borrow."'");
				while($row2 = mysqli_fetch_array($sql,1)){
					$id_borrow = $row2['id_borrow'];
					$date1 = $row2['date_borrow'];
					$date2 = $row2['date_return'];
					$nama = $row2['name_borrower'];
					$nim = $row2['id_borrower'];
					$more = $row2['more'];
					$pengampu = $row2['dosen_pj'];
					$alat = $row2['item_borrow'];
					$docBorrow = $row2['doc_borrow'];
					$docReturn = $row2['doc_return'];
				}
				
				echo "<ul>
						<li><b>ID Peminjaman: <br />".$id_borrow."</b><br /></li>
						<li>Tanggal Peminjaman: <br />".$date1."<br /></li>
						<li>Tanggal Pengembalian: <br />".$date2."<br /></li>
						<li>Nama: <br />". $nama."<br /></li>
						<li>Pengampu: <br />". $pengampu."<br /></li>
						<li>Alat yang dipinjam: <br />". $alat."<br /></li>
						<li>Catatan: <br />". $more."<br /></li>
						<li>Dokumentasi Peminjaman: <br/>
							<img src='asset/img/doc/".$docBorrow. "' style='max-width:80%' /></li>
					  </ul>
					  <p><br /><a href='javascript:history.back()'>Kembali</a></p>";
						
				exit();
			}
			
			
			if ($act == "cancelVerif") {
				echo "<form id='signin' name='signin' method='post' action='".$_SERVER['PHP_SELF']."?act=cancelBorrow&id_borrow=".$id_borrow."' class='text-align:center' method='post'>
				<p>Masukan NIM/No ID yang digunakan<br />
				<input type=\"text\" name=\"id_borrower\" placeholder=\"cth: 1705580\"/></p>
				<p><input type='submit' class='button' value='Submit'></p>
				";
				echo "<p><br /><a href='javascript:history.back()'>Kembali ke Laman Awal</a></p>";
				include 'asset/footer.php';
				exit();
			}
			
			else if ($act == "cancelBorrow"){
				$id_borrower = $_POST['id_borrower'];
				$verifrt = mysqli_query($con,"SELECT * FROM borrow WHERE id_borrow='$id_borrow' AND id_borrower='$id_borrower'");
				$cekrt = mysqli_num_rows($verifrt);

				if ($cekrt == 1){  
					$actquery = "DELETE FROM borrow WHERE id_borrow = $id_borrow";
					if ($con->query($actquery) === TRUE) {
						  echo "<p>Peminjaman dengan ID ".$id_borrow." berhasil dihapus!</p>";
						} else {
						  echo "Error: " . $actquery . "<br>" . $con->error;
						}
					echo "<p><br /><a href=".$STurl.">Back to Homepage</p></a></p>";
					include 'asset/footer.php';
					exit();
				}
			}
		}
		
		//List active
		$query_bor = "SELECT * FROM borrow WHERE status_borrow='1' ORDER BY date_borrow ASC";
		$hasil_bor = mysqli_query($con, $query_bor);
		
		//Blank check
		bl_check("borrow", "status_borrow = 1");
		
		echo "<div style=\"text-align:left\"><ul>";
		while ($data_bor = mysqli_fetch_array($hasil_bor)){
			echo "<li style=\"margin:5px 0px;\">
					<a href=?act=viewBorrow&id_borrow=".$data_bor['id_borrow']."> ID Peminjaman ".$data_bor['id_borrow']."</a> 
					<br />oleh ".$data_bor['name_borrower']."
					<br /><a href='return_form.php?id_borrow=".$data_bor['id_borrow']."'>Kembalikan</a> | 
					<a href='".$_SERVER['PHP_SELF']."?act=cancelVerif&id_borrow=".$data_bor['id_borrow']."'>Batalkan</a>
				  </li>";
		}
	?></ul></div>
	<p>&nbsp;</p>
<p style="font-size:small;padding:0 30px 0 30px;" align="center"><a href="help.php">Need a help? CLICK HERE</a><br />
<a href="<?php echo $STurl;?>">Back to Homepage</p></a>
<?php include 'asset/footer.php';?>
