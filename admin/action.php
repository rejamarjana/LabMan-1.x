<?php 
	if (isset($_GET['act'])){
		// hapus user
		$act= $_GET['act'];
		$id_user = $_SESSION['id_user'];
		$page = "Admin Page";
		
		if ($act== "viewBorrow"){
			// lihat isi peminjaman
			$back = -1;
			$id_borrow = $_GET['id_borrow'];
			
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
			
			echo "<b>ID Peminjaman: ".$id_borrow."</b><br />
			<a href='".$_SERVER['PHP_SELF']."?act=acceptReturn&id_borrow=".$id_borrow."'>Verif</a>&nbsp;&nbsp;&nbsp;<a href='".$_SERVER['PHP_SELF']."?act=rejectReturn&id_borrow=".$id_borrow."'>Tolak</a><br /><br />";
			
			echo "<ul>
					<li>Tanggal Peminjaman: <br />".$date1."<br /></li>
					<li>Tanggal Pengembalian: <br />".$date2."<br /></li>
					<li>Nama: <br />". $nama."<br /></li>
					<li>Pengampu: <br />". $pengampu."<br /></li>
					<li>Alat yang dipinjam: <br />". $alat."<br /></li>
					<li>Catatan: <br />". $more."<br /></li>
					<li>Dokumentasi Peminjaman: <br/>
						<img src='../asset/img/doc/".$docBorrow."' style='max-width:80%' alt=".$docBorrow." /></li>
					<li>Dokumentasi Pengembalian: <br/>
						<img src='../asset/img/doc/".$docReturn."' style='max-width:80%' alt=".$docReturn." /></li>
				  </ul>";
		}
		
		else if ($act== "acceptReturn"){
			// approve pengembalian
			$back = -2;
			$id_borrow = $_GET['id_borrow'];
			$actquery = "UPDATE borrow SET status_borrow = 3 WHERE id_borrow = '".$id_borrow."'";
			if ($con->query($actquery) === TRUE) {
			  echo "<p>Pengembalian diterima!</p>";
			} else {
			  echo "Error: " . $actquery . "<br>" . $con->error;
			}
		}
		
		else if ($act == "rejectReturn"){
			// edit artikel
			$back = -1;
			$id_borrow = $_GET['id_borrow'];
			$actquery = "SELECT * FROM borrow WHERE id_borrow ='".$id_borrow."'";
			$acthasil = mysqli_query($con, $actquery);
			$actdata = mysqli_fetch_array($acthasil);
			echo "<form	action='".$_SERVER['PHP_SELF']."?id_borrow=".$id_borrow."&act=RejectedReturn' method='post'>
				<p>Keterangan ditolak<br />
				<select id='status' name='borrow_status'>
					<option value='4'>Data Tidak Sesuai</option>
					<option value='5'>Barang Rusak/Hilang</option>
					<option value='6'>Lainnya</option>
				</select></p>
				<p><input type='text' name='more' placeholder='Rincian..'/></p>
				<p><input type='submit' class='button' value='Submit'></p>
			</form>";
		}
		
		
		else if ($act == "RejectedReturn"){
			// edit artikel
			$back = -2;
			$id_borrow = $_GET['id_borrow'];
			$borrow_status = $_POST['borrow_status'];
			$more = $_POST['more'];
			
			$getmore = mysqli_query($con, "SELECT more FROM borrow WHERE id_borrow =".$id_borrow);
			if ($row = $getmore->fetch_assoc()) {
				$morenew = $row['more']." <br />".$more;
			}
			
			if ($borrow_status == "4"){
				$actquery = "UPDATE borrow
					   SET status_borrow='$borrow_status', more='$morenew'
					   WHERE id_borrow = '".$id_borrow."'";
				if ($con->query($actquery) === TRUE) {
				  echo "<p>Sukses!<br />Pengembalian - Data tidak sesuai/lengkap dengan rincian: <br />"
					  .$more.
					  "</p>";
				} 
				else {
				  echo "Error: " . $actquery . "<br>" . $con->error;
				}
			}
			if ($borrow_status == "5"){
				$actquery = "UPDATE borrow
					   SET status_borrow='$borrow_status', more='$morenew'
					   WHERE id_borrow = '".$id_borrow."'";
				if ($con->query($actquery) === TRUE) {
				  echo "<p>Sukses!<br />Pengembalian - Barang Rusak/hilang dengan rincian: <br />"
				  .$morenew.
				  "</p>";
				} else {
				  echo "Error: " . $actquery . "<br>" . $con->error;
				}
			}
			if ($borrow_status == "6"){
				$actquery = "UPDATE borrow
					   SET status_borrow='$borrow_status', more='$morenew'
					   WHERE id_borrow = '".$id_borrow."'";
				if ($con->query($actquery) === TRUE) {
				  echo "<p>Sukses!<br />Pengembalian ditolak dengan rincian: <br />"
				  .$morenew.
				  "</p>";
				} else {
				  echo "Error: " . $actquery . "<br>" . $con->error;
				}
			}
		}
		else if ($act == "editProfil"){
			$back = -1;
			$id_user = $_SESSION['id_user'];
			$password1 = md5($_POST['password1']);
			$password2 = md5($_POST['password2']);
			
			// cek konfirmasi password
			if ($password1 == $password2){
				 $actquery = "UPDATE user
					   SET password='$password1'
					   WHERE id_user = '".$id_user."'";
				if ($con->query($actquery) === TRUE) {
				  echo "<p>Sukses!<br />Password berhasil diubah.</p>";
				} else {
				  echo "Error: " . $actquery . "<br>" . $con->error;
				}
			}
			else{
				echo "Password tidak sama. <br />";
			}
		}
		
		else if ($act == "regSubmit"){
			$back = -1;
			echo "<h1>Status Registrasi</h1>";
			
			$reg_id_user = $_POST['reg_id_user'];
			$reg_nama = $_POST['reg_nama'];
			$reg_password1 = md5($_POST['reg_password1']);
			$reg_password2 = md5($_POST['reg_password2']);
			$reg_status = $_POST['reg_status'];
			
			// cek konfirmasi password
			if ($reg_password1 == $reg_password2){
				 // cek apakah username sudah ada
				 $query = "SELECT * FROM user WHERE id_user = '$reg_id_user'";
				 $hasil = mysqli_query($con, $query);
				 $data = mysqli_num_rows($hasil);
				 
				 // bila user name belum ada, maka user akan diregister
				 if ($data == 0){
					 $query = "INSERT INTO user(id_user, nama, password, status)
							   VALUES('$reg_id_user', '$reg_nama', '$reg_password1', '$reg_status')";
					 $hasil = mysqli_query($con,$query);
					 echo "Input <b>".$reg_nama."</b> Sukses. <br /><a href='index.php'><- Kembali</a>";
				 }
				 else echo "ID User tersebut sudah ada. <br /><a href=\"index.php\"><- Kembali</a>";
			}
			else echo "Password tidak sama. <br /><a href=\"index.php\"><- Kembali</a>";
			
			include "../asset/footer.php";
		}		
		
		else if ($act=="deleteUser"){
			$back = -1;
			$id_user = $_GET['id_user'];
			$actquery = "DELETE FROM user WHERE id_user ='".$id_user."'";
			if ($con->query($actquery) === TRUE) {
			  echo "<p>User ".$id_user." berhasil dihapus!</p>";
			} else {
			  echo "Error: " . $actquery . "<br>" . $con->error;
			}
		}
		
		else if ($act=="addExp"){
			$back = -1;
			$category = $_POST['category'];
			$title_exp = $_POST['title_exp'];
			$set_exp = $_POST['set_exp'];
			
			$actquery = "INSERT INTO eksperimen(category, title_exp, set_exp)
					   VALUES('$category', '$title_exp', '$set_exp')";
			if ($con->query($actquery) === TRUE) {
			  echo "<p>".$title_exp." berhasil ditambahkan!</p>";
			} else {
			  echo "Error: " . $actquery . "<br>" . $con->error;
			}
		}
		
		else if ($act=="deleteExp"){
			$back = -1;
			$id_exp = $_GET['id_exp'];
			$actquery = "DELETE FROM eksperimen WHERE id_exp ='".$id_exp."'";
			if ($con->query($actquery) === TRUE) {
			  echo "<p>Eksperimen ".$id_exp." berhasil dihapus!</p>";
			} else {
			  echo "Error: " . $actquery . "<br>" . $con->error;
			}
		}
		
		else if ($act=="addLib"){
			$back = -1;
			$title_lib = $_POST['title_lib'];
			$url_lib = $_POST['url_lib'];
			
			$actquery = "INSERT INTO library(title_lib, url_lib)
					   VALUES('$title_lib', '$url_lib')";
			if ($con->query($actquery) === TRUE) {
			  echo "<p>".$title_lib." berhasil ditambahkan!</p>";
			} else {
			  echo "Error: " . $actquery . "<br>" . $con->error;
			}
		}
		
		else if ($act=="deleteLib"){
			$back = -1;
			$id_lib = $_GET['id_lib'];
			
			$actquery = "DELETE FROM library WHERE id_lib ='".$id_lib."'";
			if ($con->query($actquery) === TRUE) {
			  echo "<p>Item berhasil dihapus!</p>";
			} else {
			  echo "Error: " . $actquery . "<br>" . $con->error;
			}
		}
		
		echo "<p><br /><a href='javascript: window.history.go(".$back.")'>Kembali ke Laman Awal</a></p>";
		exit();
	}
?>