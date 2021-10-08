<?php 
 	$page="Halaman Admin";
	include '../asset/header.php';
	include 'verif_user.php'; 
	include 'action.php';
	$id_user = $_SESSION['id_user'];
?>

<div style="display: flex; flex-direction: row-reverse;justify-content: space-between;align-items: center;">
  <div style="display:flex;">
	<a href="signing-out.php" style="flex-direction:column;text-decoration:none;width:50px;">
		<div><img src="../asset/img/ic_logout.png" width="24px" /></div>
		<div style="font-size:x-small">Sign Out</div>
	</a>
	<a href="setting.php" style="display:flex;flex-direction:column;text-decoration:none;width:50px;">
		<div><img src="../asset/img/ic_setting.png" width="24px" /></div>
		<div style="font-size:x-small">Setting</div>
	</a>
  </div>
  
  <div style="padding: 10px;"><h2 align="left">Admin Area</h2></div>
</div> 

<button class="tablink" onclick="openPage('Verifikasi', this)" id="defaultOpen">Manajemen Peminjaman</button>
<button class="tablink" onclick="openPage('Alat', this)">Manajemen Alat</button>
<button class="tablink" onclick="openPage('User', this)">Manajemen User</button>
<button class="tablink" onclick="openPage('Modul', this)">Manajemen Eksperimen</button>

<div id="Verifikasi" class="tabcontent">
  <br /><br />
  <p> </p>
	<p align="right"><a href="borrow_history.php">Buka Riwayat Peminjaman</a></p>
  <h3 style="background:#99f;">Daftar pengembalian menunggu verifikasi</h3>
	<?php
		//Blank check
		bl_check("borrow", "status_borrow = 2");
		
		echo "<div style=\"text-align:left\"><ul>";
		$query_bor = "SELECT * FROM borrow WHERE status_borrow=2 ORDER BY date_borrow ASC";
		$hasil_bor = mysqli_query($con, $query_bor);
		while ($data_bor = mysqli_fetch_array($hasil_bor)){
			echo "<li style=\"margin:5px 0px;\">
					<a href='?act=viewBorrow&id_borrow=".$data_bor['id_borrow']."'>ID Peminjaman: ".$data_bor['id_borrow']."</a><br />
					".$data_bor['id_borrower']." - ".$data_bor['name_borrower']." - ".$data_bor['dosen_pj']."<br />
				  <div style='display:flex'>
					<div style='display:flex;flex-direction: column; margin:5px'>
					  <a href='".$_SERVER['PHP_SELF']."?act=acceptReturn&id_borrow=".$data_bor['id_borrow']."' style='text-decoration:none'>
						<div><img src='../asset/img/ic_verif.png' width='24px' /></div>
						<div style='font-size:x-small'>Verif</div>
					  </a>
					</div>
					
					<div style='display:flex;flex-direction: column;margin:5px'>
					  <a href='".$_SERVER['PHP_SELF']."?act=rejectReturn&id_borrow=".$data_bor['id_borrow']."' style='text-decoration:none'>
						<div><img src='../asset/img/ic_reject.png' width='24px' /></div>
						<div style='font-size:x-small'>Reject</div>
					  </a>
					</div>
				  </div>
				  </li>";
		}
		echo "</ul></div>";
	?>
	<p> </p>
	<h3 style="background:#99f;">Daftar peminjaman aktif</h3>
	<?php
		//Blank check
		bl_check("borrow", "status_borrow = 1");
		
		echo "<div style=\"text-align:left\"><ul>";
		$query_bor2 = "SELECT * FROM borrow WHERE status_borrow=1 ORDER BY date_borrow ASC";
		$hasil_bor2 = mysqli_query($con, $query_bor2);
		while ($data_bor2 = mysqli_fetch_array($hasil_bor2)){
			echo "<li style=\"margin:5px 0px;\">
					<a href='?act=viewBorrow&id_borrow=".$data_bor2['id_borrow']."'>ID Peminjaman: ".$data_bor2['id_borrow']."</a><br />".$data_bor2['id_borrower']." - ".$data_bor2['name_borrower']." - ".$data_bor2['dosen_pj']."<br />
				  </li>";
		}
		echo "</ul></div>";
	?>
</div>

<div id="Alat" class="tabcontent">
  <br /><br />
  <h3 style="background:#99f;">Daftar Alat</h3>
  <div style="text-align:center;font-size:small;width:80%;height:auto;border:solid 1pt #cccccc;background:#eeeeee;padding:5pt;margin: 0pt auto;">Sistem Dalam Pengembangan
	  <!-- TABEL ALAT
	  <div style="overflow-x:auto">
		<table id="daftar-alat">
		<tr>
			<td>Kode alat</td>
			<td>Nama Alat</td>
			<td>Spesifikasi</td>
			<td>Produsen</td>
			<td colspan="2">Tindakan</td>
		</tr>
		<tr>
			<td>B300001</td>
			<td>1705580</td>
			<td>Reja Marjana</td>
			<td>02-10-2020</td>
			<td>Verif</td>
			<td>Tolak</td>
		</tr>
		</table>
	  </div>
	  -->
	</div>
</div>

<div id="User" class="tabcontent">
  <br /><br />
  <h3 style="background:#99f;">Edit Profil</h3>
  <?php
	//edit profil
	$userdata = mysqli_query($con,"SELECT * FROM user WHERE id_user='$id_user'");
  ?>
  <div>
	<form id="userdataedit" name="userdataedit" method="post" action="?act=editProfil">
		<p><label class="text_label">
			ID User
		</label>
		<?php echo "$id_user"; ?></p>
		
		<p><label class="text_label">
			Ganti Password
		</label>
		<input type="password" name="password1" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;"/></p>
		
		<p><label class="text_label">
			Ulangi Password
		</label>
		<input type="password" name="password2" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;"/></p>
		
		<p><input type="submit" class="button" value="Save"></p>
		</form>
  </div>
  
  <?php 
	while($row = mysqli_fetch_array($userdata,1)){$status =$row['status'];}
	
	//admin panel
	if($status == "suadmin" OR $status == "admin"){
		echo "<div>
				<p></p>
				<h3 style='background:#99f;'>Input User Baru</h3>
				  <form id='reg' name='reg' method='post' action='?act=regSubmit' class='text-align:center'>
					<p><label class='text_label'>ID User</label>
					<input type='text' name='reg_id_user' placeholder='ID User'/></p>
					
					<p><label class='text_label'>Nama</label>
					<input type='text' name='reg_nama' placeholder='Nama Lengkap'/></p>
					
					<p><label class='text_label'>Password</label>
					<input type='password' name='reg_password1' placeholder='&bull;&bull;&bull;&bull;&bull;&bull;'/></p>
					
					<p><label class='text_label'>Ulangi Password</label>
					<input type='password' name='reg_password2' placeholder='&bull;&bull;&bull;&bull;&bull;&bull;'/></p>
					
					<p><label class='text_label'>Status</label>
					<select id='status' name='reg_status'>
						<option value='aslab'>Asisten Lab</option>
						<option value='admin'>Admin</option>
						<option value='suadmin'>Super Admin</option>
						<option value='dosen'>Dosen</option>
					</select>
					</p>
					
					<p><input type='submit' class='button' value='Submit'></p>
					</form>
			  </div>
			  <div>
			<p></p>
			<h3 style='background:#99f;'>List User dalam Sistem</h3>";
		
		//user list
		$query_user = "SELECT * FROM user GROUP BY status";
		$hasil_user = mysqli_query($con, $query_user);
		while ($data_user = mysqli_fetch_array($hasil_user))
		{
			echo "<p><b>Tipe Akun</b> : ".$data_user['status']."</p>";
			$query_user_2 = "SELECT * FROM user WHERE status ='".$data_user['status']."' ORDER BY id_user DESC";
			$hasil_user_2 = mysqli_query($con, $query_user_2);
			echo "<ul>";
			while ($data_user = mysqli_fetch_array($hasil_user_2)){
			  echo "<li style=\"display:flex;justify-content: space-between;align-items: center;\">
					  <div>".$data_user['id_user']." - ".$data_user['nama']."</div>
					  <div style='display:flex;flex-direction: column; margin:5px 5px 5px 15px'>
						  <a href='".$_SERVER['PHP_SELF']."?act=deleteUser&id_user=".$data_user['id_user']."' style='text-decoration:none'>
							<div><img src='../asset/img/ic_delete.png' width='24px' /></div>
							<div style='font-size:x-small'>Hapus</div>
						  </a>
					  </div>
					</li>";
			}
			echo "</ul>";
			echo "<p> </p>";
		}
		echo "</div>";
	}
	
	else{}
  ?>
  
</div>

<div id="Modul" class="tabcontent">
  <br /><br />
  <h3 style="background:#99f;">Set Eksperimen</h3>
  <p>List Eksperimen Tersedia</p>
  <?php
	//Blank check
		bl_check("eksperimen", "title_exp IS NOT NULL");
  ?>
  <ul>
	<?php
		$qSelectEksp = "SELECT * FROM eksperimen WHERE category = 'EFD I' OR category = 'EFD II' ORDER BY category";
			$data = mysqli_query($con, $qSelectEksp);
			while ($data_add = mysqli_fetch_array($data)){
				echo "<li style=\"display:flex;justify-content: space-between;align-items: center;\">"
					  .$data_add['category']." - ".$data_add['title_exp'];
				
				if($status == "suadmin" OR $status == "admin"){
					echo "<div style='display:flex;flex-direction: column; margin:5px 5px 5px 15px'>
							  <a href='?act=deleteExp&id_exp=".$data_add['id_exp']."' style='text-decoration:none'>
								<div><img src='../asset/img/ic_delete.png' width='24px' /></div>
								<div style='font-size:x-small'>Hapus</div>
							  </a>
						  </div>";
				}
				echo "</li>";
			}
	?>
  </ul>
  <hr />
  <p>Tambah Set Eksperimen Baru</p>
	<div>
	<form id="addExp" name="addExp" method="post" action="?act=addExp">
		<p><label class="text_label">Kategori</label>
			<select id="category" name="category">
			<option value='EFD I'>EFD I</option>
			<option value='EFD II'>EFD II</option>
			</select></p>
		<p><label class="text_label">Eksperimen</label>
		   <input type="text" name="title_exp" placeholder="Isi dengan judul/nama eksperimen"/></p>
		<p><b>Set alat</b><br />
		   <textarea type="textarea" name="set_exp" placeholder="alat 1, alat 2, alat 2, alat 3, ..." style="width:300px;max-width:100%;height:100px;"></textarea></p>
		<p><input type="submit" class="button" value="Submit"></p>
	</form>
	</div>
  
  <h3 style="background:#99f;">Modul</h3>
  
  <p>List Modul & Berkas Unggahan</p>
    <?php
	//Blank check
		bl_check("library", "title_lib IS NOT NULL");
	?>
  <ul>
	  <?php
		$qSelectLib = "SELECT * FROM library";
			$data = mysqli_query($con, $qSelectLib);
			while ($data_add = mysqli_fetch_array($data)){
				echo "<li style=\"display:flex;justify-content: space-between;align-items: center;\">
					  <div>".$data_add['title_lib']." (".$data_add['url_lib'].")</div>";
				if($status == "suadmin" OR $status == "admin"){
					echo "<div style='display:flex;flex-direction: column; margin:5px 5px 5px 15px'>
							  <a href='?act=deleteLib&id_lib=".$data_add['id_lib']."' style='text-decoration:none'>
								<div><img src='../asset/img/ic_delete.png' width='24px' /></div>
								<div style='font-size:x-small'>Hapus</div>
							  </a>
						  </div>";
				}
				echo "</li>";
			}
		?>
  </ul>
  <hr />
  <p>Tambah Modul/Berkas Unggahan Baru</p>
	<div>
	<form id="addLib" name="addLib" method="post" action="?act=addLib">
		<p><label class="text_label">Judul</label>
		   <input type="text" name="title_lib" placeholder="Judul Modul/Berkas"/></p>
		<p><label class="text_label">URL</label>
		   <input type="text" name="url_lib" placeholder="http://isilinknya.apa"/></p>
		<p><input type="submit" class="button" value="Submit"></p>
	</form>
	</div>
  
</div>

<script>
	function openPage(pageName, elmnt) {
	  // Hide all elements with class="tabcontent" by default */
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	  }

	  // Remove the background color of all tablinks/buttons
	  tablinks = document.getElementsByClassName("tablink");
	  for (i = 0; i < tablinks.length; i++) {
		tablinks[i].style.backgroundColor = "";
	  }

	  // Show the specific tab content
	  document.getElementById(pageName).style.display = "block";

	  // Add the specific color to the button used to open the tab content
	  elmnt.style.backgroundColor = "#99F";
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click(); 
</script>

<p style="font-size:small;padding:0 30px 0 30px;" align="center"><a href="help.php">Need a help? CLICK HERE</p></a>

<?php include '../asset/footer.php';?>
