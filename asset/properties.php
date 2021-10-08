<?php
	include 'dbconnect.php';

//APP FUNCTIONS
	
	//hitung item kolom
	function count_item($table, $condition){
		global $con;
		$count_query = "SELECT * FROM ".$table." WHERE ".$condition;
		$result = $con->query($count_query);
		$count_result = mysqli_num_rows($result);
		
		return $count_result;
		}
		
	//Blank check
	function bl_check($table, $condition){
		if (count_item($table, $condition) == 0) {
			echo "<div style='text-align:center;font-size:small;width:80%;height:auto;border:solid 1pt #cccccc;background:#eeeeee;padding:5pt;margin: 0pt auto;'><i>List Kosong. Tidak ada entri.</i></div>";
		}
	}
	
	//Borrow status
	function br_status($data){
		if ($data['status_borrow']==1) {
			return "aktif";
		}
		else if ($data['status_borrow']==2) {
			return "waiting";
		}
		else if ($data['status_borrow']==3) {
			return "verified";
		}
		else if ($data['status_borrow']>3) {
			return "rejected";
		}
	}
//APP PROPERTIES	
	//app_name
	$call_appname = mysqli_query($con,"SELECT * FROM properties WHERE property='app_name'");
	while($row = mysqli_fetch_array($call_appname,1)){$STapp_name =$row['content'];}
	
	//institution email
	$call_contact = mysqli_query($con,"SELECT * FROM properties WHERE property='contact_mail'");
	while($row = mysqli_fetch_array($call_contact,1)){$STcontact = $row['content'];}
	
	//institution number
	$call_contact2 = mysqli_query($con,"SELECT * FROM properties WHERE property='contact_phone'");
	while($row = mysqli_fetch_array($call_contact2,1)){$STcontact2 = $row['content'];}
	
	//portal domain
	$call_domain = mysqli_query($con,"SELECT * FROM properties WHERE property='domain'");
	while($row = mysqli_fetch_array($call_domain,1)){$STurl = $row['content'];}

	//institution name
	$call_institution = mysqli_query($con,"SELECT * FROM properties WHERE property='institution'");
	while($row = mysqli_fetch_array($call_institution,1)){$STinstitution = $row['content'];}

	//institution webtitle
	$call_website = mysqli_query($con,"SELECT * FROM properties WHERE property='website'");
	while($row = mysqli_fetch_array($call_website,1)){$STwebsite = $row['content'];}
	

?>