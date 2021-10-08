<?php 
	$page="Sign In";
	include 'asset/header.php';
	
	if (isset($_SESSION['no_induk']))  
	{  
		header ("Location:".$STurl."admin/index.php");
		session_start();
	} 
	else {}
?>

<form id="signin" name="signin" method="post" action="admin/signing-in.php" class="text-align:center">
  	<p><label class="text_label">
		ID User
    </label>
	<input type="text" name="id_user" placeholder="cth: 1700000"/></p>
	
	<p><label class="text_label">
		Password
    </label>
	<input type="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;"/></p>
	<p><input type="submit" class="button" value="Submit"></p>
</form>

<p style="font-size:small;padding:0 30px 0 30px;" align="center"><a href="help.php">Need a help? CLICK HERE</a><br /><br />
<a href="<?php echo $STurl;?>">Back to Homepage</p></a>

<?php include 'asset/footer.php';?>
