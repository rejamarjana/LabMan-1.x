<?php 
 	$page="Library";
	include 'asset/header.php';?>

<div style="text-align:left;">
<h3 style="background:#99f;">List Modul & Berkas Unggahan</h3>
	  <?php
	  //Blank check
		bl_check("library", "url_lib IS NOT NULL");?>
	<ul>
	  <?php
		$qSelectLib = "SELECT * FROM library";
			$data = mysqli_query($con, $qSelectLib);
			while ($data_add = mysqli_fetch_array($data)){
				echo "<li><a href='".$data_add['url_lib']."' target='_blank'>".$data_add['title_lib']."</a></li>";
			}
		?>
  </ul>
</div>

<p style="font-size:small;padding:0 30px 0 30px;" align="center">
<a href="<?php echo $STurl;?>">Back to Homepage</a></p>
<?php include 'asset/footer.php';?>
