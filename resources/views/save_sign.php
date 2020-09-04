<?php 

	session_start();
	$_SESSION['image']=$_POST['img_data'];
	echo($_POST['img_data']);
	
?>