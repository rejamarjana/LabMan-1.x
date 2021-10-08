<p><b>PILIH JENIS PEMINJAMAN</b></p>
<form id="borrow-form" action="<?php echo $_SERVER['PHP_SELF']?>">
	<p><label class="rd_container">
	  <input type="radio" name="borrow_type" class="borrow_type" value="BT1" id="borrow_type_0" checked="checked" />
	  Saya meminjam untuk mata kuliah EFD.
	  <span class="checkmark"></span></label>
	<label class="rd_container">
	  <input type="radio" name="borrow_type" class="borrow_type" value="BT2" id="borrow_type_1" />
	  Saya meminjam untuk mata kuliah lainnya.
	  <span class="checkmark"></span></label>
	<label class="rd_container">
	  <input type="radio" name="borrow_type" class="borrow_type"value="BT3" id="borrow_type_2" />
	  Saya meminjam untuk penelitian, pengembangan, dll.
	  <span class="checkmark"></span></label></p>
<input type="submit" value="Lanjut" class="button" />
</form>