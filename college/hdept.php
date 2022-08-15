<?php
	include "database.php";
	session_start();
	$s="delete from hdept where HID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('handle_dept.php?mes=Data Deleted..','_self');</script>";


?>