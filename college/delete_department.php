<?php
	include "database.php";
	session_start();
	$s="delete from dept where DID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('view_department.php?mes=Data Deleted...','_self');</script>";
?>