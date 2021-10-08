<?php 
 	$page="Admin Help";
	include '../asset/header.php';?>

<div style="text-align:left;"><h3>Jenis Akses Sistem Manajemen</h3>
<ol align="left">
	<li>Dosen</li>
	<li>Super Admin</li>
	<li>Admin</li>
	<li>Asisten Lab</li>
</ol>

<h3>Prosedur Acc/Verifikasi Peminjaman</h3>
<p>*Akses tersedia untuk semua jenis akun yang terdaftar di sistem</p>
<ol>
	<li>Buka website utama Sistem Informasi Lab Fisika Dasar (<?php echo $STurl; ?>)</li>
	<li>Pilih Menu 'Management' di bawah halaman</li>
	<li>Login dengan menggunakan akun terdaftar</li>
	<li>Di tab pertama admin area, dapat ditemukan daftar: a)peminjaman Aktif; b)peminjaman menunggu verifikasi</li>
	<li>Temukan peminjaman yang hendak diverifikasi.</li>
	<li>Klik ID Peminjaman untuk memeriksa rincian peminjaman. Pastikan semua rincian lengkap da sesuai</li>
	<li>Pilih Verif untuk memverifikasi entri peminjaman tersebut</li>
	<li>Pilih kembali ke halaman awal bila dibutuhkan.</li>
</ol>

<h3>Penggantian User ID dan Password</h3>
<p>Untuk kelancaran administrasi <b>User ID tidak dapat diubah</b>.<br />
Penggantian password dapat dilakukan dengan:<br />
<ol>
	<li>Login ke dalam sistem menggunakan akun terdaftar</li>
	<li>Klik tab 'User Management'</li>
	<li>Isi Form Edit User dengan password yang baik</li>
	<li>Klik simpan</li>
	<li>Apabila Pesan sukses muncul, password berhasil diubah</li>
</ol>
Reset dikarenakan lupa password dapat dilakukan secara manual dengan menghubungi admin.
</p>

<h3>Pengaduan Masalah Sistem</h3>
<p>Sistem Informasi Lab Fisika Dasar Pendidikan Fisika UPI merupakan aplikasi yang dikembangkan oleh tim Laboratorium. Apabila terjadi kesalahan sistem atau masalah lainnya yang mengganggu kelancaran penggunaan sistem ini, silahkan ajukan melalui Email atau WhatsApp kami.<br />
(<a href='http://wa.me/628981049294'>Klik disini untuk membuka kontak WA</a>).
</p>
</div>

<p style="font-size:small;padding:0 30px 0 30px;" align="center">
<a href="index.php">Kembali ke Admin Homepage</a><br /></p>
<?php include '../asset/footer.php';?>
