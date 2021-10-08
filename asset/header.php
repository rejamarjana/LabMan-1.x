<?php 
	session_start();
	require 'properties.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo $page." | ".$STapp_name; ?></title>
<link href="<?php echo $STurl."asset/style.css"; ?>" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container">

<span class="header"><h1><a href="<?php echo $STurl;?>" style="text-decoration:none;color:#000;"><?php echo $STapp_name; $page="Peminjaman";?></a></h1></span>
<span class="content">