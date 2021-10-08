<?php 
 	$page="Help Common";
	include 'asset/header.php';?>

<div style="text-align:left;"><h2>Prosedur Peminjaman</h2>
<ol align="left">
	<li>Buka website utama Sistem Informasi Lab Fisika Dasar (<?php echo $STurl; ?>)</li>
	<li>Pilih Menu 'Borrow'</li>
	<li>Isikan kebutuhan peminjaman, dan klik lanjut</li>
	<li>Lengkapi data-data yang diminta secara lengkap, disertai foto dokumentasi alat yang dipinjam</li>
	<li>Submit dan pastikan muncul pesan peminjaman sukses!</li>
	<li>Bila perlu catat ID peminjaman yang ditunjukan sistem</li>
</ol>

<h2>Prosedur Pengembalian</h2>
<ol>
	<li>Buka website utama Sistem Informasi Lab Fisika Dasar (<?php echo $STurl; ?>)</li>
	<li>Pilih Menu 'Return'</li>
	<li>Cari entri peminjaman yang telah diisi sebelumnya dan klik 'Kembalikan'</li>
	<li>Verifikasi dengan nomor induk yang digunakan saat melakukan peminjama</li>
	<li>Submit dan pastikan muncul pesan peminjaman sukses!</li>
	<li>Bila perlu catat ID peminjaman yang ditunjukan sistem</li>
</ol>

<h2>Pengaduan Masalah Sistem</h2>
<p>Sistem Informasi Lab Fisika Dasar Pendidikan Fisika UPI merupakan aplikasi yang dikembangkan oleh tim Laboratorium. Apabila terjadi kesalahan sistem atau masalah lainnya yang mengganggu kelancaran penggunaan sistem ini, silahkan ajukan melalui Email atau WhatsApp kami.<br />
(<a href='http://wa.me/628981049294'>Klik disini untuk membuka kontak WA</a>).
</p>
</div>

<p style="font-size:small;padding:0 30px 0 30px;" align="center">
<a href="<?php echo $STurl;?>">Back to Homepage</a></p>
<?php include 'asset/footer.php';?>
