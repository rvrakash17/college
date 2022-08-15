<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}
	$sql="SELECT * FROM student WHERE ID={$_GET["id"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
		}	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>college</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?><br>
			<br><br>
			<div id="section">
			<?php include"sidebar.php";?><br>
				<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content">
				<h3 >View Student Details</h3><br>
						<div class="ibox">
							<img src="<?php echo $row["SIMG"]; ?>" height="230" width="230">
							
						</div>
						<div class="tsbox">
						<table border="1px">
					     	<tr><th>Reg No </th> <td> <?php echo $row["RNO"]; ?></td></tr>
					    	<tr><th>Add No </th> <td> <?php echo $row["ADDNO"]; ?></td></tr>
							<tr><th>Name </th> <td> <?php echo $row["SNAME"]; ?></td></tr>
							<tr><th>FName </th> <td> <?php echo $row["FNAME"]; ?></td></tr>
							<tr><th>Department </th> <td> <?php echo $row["SDEPT"]; ?></td></tr>
							<tr><th>Section </th> <td> <?php echo $row["SSEC"]; ?></td></tr>
							<tr><th>DOB </th> <td> <?php echo $row["DOB"]; ?></td></tr>
							<tr><th>Gender </th> <td> <?php echo $row["GEN"]; ?></td></tr>
							<tr><th>Phone </th> <td> <?php echo $row["PHO"]; ?></td></tr>
							<tr><th>E-Mail </th> <td> <?php echo $row["MAIL"]; ?></td></tr>
							<tr><th>Address </th> <td> <?php echo $row["ADDR"]; ?></td></tr>
							<tr><th>Pincode </th> <td> <?php echo $row["PCO"]; ?></td></tr>
							
						</table>
						</div>
				</div>	
			</div>
			
			
	</body>
</html>