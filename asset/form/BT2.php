<!--BORROW TYPE 2-->
<form id="borrow-form" action="<?php echo $_SERVER['PHP_SELF']."?borrow_type=BT2&submit=2";?>" method="post" enctype="multipart/form-data">

	<p><label class="text_label">Nama</label>
	<input type="text" name="nama" placeholder="Nama Lengkap Kamu" id="nama"/></p>
		
	<p><label class="text_label">NIM</label>
	<input type="text" name="nim" placeholder="1700000" id="nim"/></p>	
			
	<p><label class="text_label">Mata Kuliah</label>
	<input type="text" name="matkul" placeholder="1, 2, 3, dst.." id="matkul"/></p>

	<p><label class="text_label">Rekan Kelompok</label>
	<input type="text" name="kelompok" placeholder="Mhs 1, Mhs 2, dst.." id="kelompok2"/></p>
	
	<p><label class="text_label">Dosen Pengampu</label>
	<input type="text" name="pengampu" placeholder="Dr. Dosen Anda, M.Si." id="pengampu"/></p>

	<p><b>Alat yang dipinjam</b> <br />
	<textarea type="textarea" name="alat" placeholder="Misal: Neraca pegas, busur derajar, mikrometer skrup" id="alat" style="width:300px;max-width:100%;height:100px;"></textarea>
	</p>
	
	<p>Dokumentasi<br />
	<input type="file" name="dokum" id="dokum"></p>
  
	<p><input type="submit" value="Kirim" class="button" /></p>
</form>