<!--BORROW TYPE 1-->
<form id="borrow-form" action="<?php echo $_SERVER['PHP_SELF']."?borrow_type=BT1&submit=1";?>" method="post" enctype="multipart/form-data">

	<p><label class="text_label">Nama</label>
	<input type="text" name="nama" placeholder="Nama Lengkap Kamu" id="nama"/></p>
		
	<p><label class="text_label">NIM</label>
	<input type="text" name="nim" placeholder="cth: 1700000" id="nim"/></p>	
			
	<p><label class="text_label">Kelompok</label>
	<input type="text" name="kelompok" placeholder="cth: 1, 2, 3, dst.." id="kelompok"/></p>

	<p><label class="text_label">Anggota</label>
	<input type="text" name="kelompok2" placeholder="Mhs 1, Mhs 2, dst.." id="kelompok2"/></p>
	
	<p>Dosen Pengampu<br />
		<select id="pengampu" name="pengampu">
		<?php 
			$qSelectDosen = "SELECT * FROM user WHERE status = 'dosen'";
			$dataDosen = mysqli_query($con, $qSelectDosen);
			while ($data_Dosen = mysqli_fetch_array($dataDosen)){
				echo "<option value='".$data_Dosen['nama']."'>".$data_Dosen['nama']."</option>";
			}
		?>
		</select>

	<p>Alat yang dipinjam <br />
		<select id="alat" name="alat">
		<?php 
			$qSelect = "SELECT * FROM eksperimen WHERE category = 'EFD I' OR category = 'EFD II' ORDER BY category";
			$data = mysqli_query($con, $qSelect);
			while ($data_add = mysqli_fetch_array($data)){
				echo "<option value='".$data_add['category']." - ".$data_add['title_exp']."'>".$data_add['category']." - ".$data_add['title_exp']."</option>";
			}
		?>
		</select>
	</p>
	
	<p>Dokumentasi<br />
	<input type="file" name="dokum" id="dokum"></p>
  
	<p><input type="submit" value="Kirim" class="button" /></p>
</form>