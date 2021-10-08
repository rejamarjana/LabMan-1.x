<?php
	session_start();
	require '../asset/properties.php';
	include 'verif_user.php'; 
	/**
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Peminjaman_".date("d/m/Y").".xls");
	**/
	
	$qSelectBorrow = "SELECT * FROM borrow ORDER BY id_borrow DESC";
	$dataBorrow = mysqli_query($con, $qSelectBorrow);
	echo "<table border='1'  cellspacing='0'>
				<tr>
					<td>ID</td>
					<td>Status</td>
					<td>Jenis</td>
					<td>NIM</td>
					<td>Nama</td>
					<td>Dosen Pengampu</td>
					<td>Alat</td>
					<td>Peminjaman</td>
					<td>Pengembalian</td>
					<td>Keterangan</td>
					<td colspan='2'>Dokumentasi</td>
				</tr>";
	while ($data_Borrow = mysqli_fetch_array($dataBorrow)){
	  echo "<tr>
				<td>".$data_Borrow['id_borrow']."</td>
				<td>".br_status($data_Borrow)."</td>
				<td>".$data_Borrow['borrow_type']."</td>
				<td>".$data_Borrow['id_borrower']."</td>
				<td>".$data_Borrow['name_borrower']."</td>
				<td>".$data_Borrow['dosen_pj']."</td>
				<td>".$data_Borrow['item_borrow']."</td>
				<td>".$data_Borrow['date_borrow']."</td>
				<td>".$data_Borrow['date_return']."</td>
				<td>".$data_Borrow['more']."</td>
				<td><a href='".$STurl."asset/img/doc/".$data_Borrow['doc_borrow']."'>Buka link</a></td>
				<td><a href='".$STurl."asset/img/doc/".$data_Borrow['doc_return']."'>Buka link</a></td>
			</tr>";
	}
	echo "</table>";
	echo "<p>&nbsp;</p>";
?>