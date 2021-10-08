<!--BORROW TYPE 3-->
<form id="borrow-form" action="<?php echo $_SERVER['PHP_SELF']."?borrow_type=BT3&submit=3";?>" method="post" enctype="multipart/form-data">

	<p><label class="text_label">Nama</label>
	<input type="text" name="nama" placeholder="Nama Lengkap Kamu" id="nama"/></p>
		
	<p><label class="text_label">NIM</label>
	<input type="text" name="nim" placeholder="1700000" id="nim"/></p>	
	
	<p><label class="text_label">Dosen Pengampu</label>
	<input type="text" name="pengampu" placeholder="Dr. Dosen Anda, M.Si." id="pengampu"/></p>

	<p><b>Judul Penelitian/Kegiatan</b>
	<textarea type="text" name="judul" id="judul" style="width:600px;max-width:100%;height:50px;" placeholder="Contoh: Pengembangan instrumen belajar fisika pada materi ..."></textarea></p>
			
	<p><b>Rincian Penelitian/Kegiatan</b>
	<textarea type="text" name="rincian" id="rincian" style="width:600px;max-width:100%;height:100px;" placeholder="Contoh: Penelitian ini membahas tentang ... ... ... dan memerlukan alat/media ... ... ..."></textarea></p>
	
	<p><b>Alat yang dipinjam</b> <br />
	<textarea type="textarea" name="alat" placeholder="Misal: Neraca pegas, busur derajar, mikrometer skrup" id="alat" style="width:600px;max-width:100%;height:100px;"></textarea>
	</p>
	
	<p>Dokumentasi<br />
	<input type="file" name="dokum" id="dokum"></p>
  
	<p><input type="submit" value="Kirim" class="button" /></p>
</form>