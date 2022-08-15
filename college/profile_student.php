<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('login_student.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
	$sql="SELECT * FROM student WHERE ID={$_SESSION["ID"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>COLLEGE</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?><br>
	
			<div id="section">
				<?php include"sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["SNAME"]; ?></h3><br><hr><br>
				
					<div class="rbox1">
					<h3> Profile</h3><br>
						<table border="1px">
							<tr><td colspan="2"><img src="<?php echo $row["SIMG"] ?>" height="100" width="100" alt="upload Pending"></td></tr>
							<tr><th>Reg No </th> <td><?php echo $row["RNO"] ?>  </td></tr>
							<tr><th>Add No </th> <td><?php echo $row["ADDNO"] ?> </td></tr>
							<tr><th>Name </th> <td><?php echo $row["SNAME"] ?> </td></tr>
							<tr><th>FatherName </th> <td><?php echo $row["FNAME"] ?> </td></tr>
							<tr><th>Department </th> <td> <?php echo $row["SDEPT"] ?>  </td></tr>
							<tr><th>Section </th> <td> <?php echo $row["SSEC"] ?>  </td></tr>
							<tr><th>DOB </th> <td> <?php echo $row["DOB"] ?>  </td></tr>
							<tr><th>Gender </th> <td> <?php echo $row["GEN"] ?>  </td></tr>
							<tr><th>Phone No </th> <td> <?php echo $row["PHO"] ?> </td></tr>
							<tr><th>E-Mail </th> <td> <?php echo $row["MAIL"] ?> </td></tr>
							<tr><th>Address </th> <td> <?php echo $row["ADDR"] ?> </td></tr>
							<tr><th>Pincode </th> <td> <?php echo $row["PCO"] ?>  </td></tr>
						</table>
						<button class="btn"><a href="profile_student_edit.php">Edit</button>
					</div>
				</div>
			</div>
	
				
	</body>
</html>