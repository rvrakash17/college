<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('profile_staff.php?mes=Access Denied...','_self');</script>";
		
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
					<h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">
				
					<h3>Mark Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
					
						<label>Enter Reg No</label><br>
						<input type="text" class="input3" name="rno"><br><br>
					</div>
				
					<button type="submit" class="btn" name="view"> View Details</button>
				
					</form>
					<br><br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Mark Details</h3><br>";
								$sql="select * from mark where TID={$_SESSION["TID"]}";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo'
									<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Reg.No</th>
											<th>Department</th>
											<th>Exam Name</th>
											<th>Sub Name</th>
											<th>Sub Code</th>
											<th>Mark</th>
											<th>Delete</th>
										</tr>
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
											<tr>
												<td>{$i}</td>
												<td>{$r["REGNO"]}</td>
												<td>{$r["DEPT"]}</td>
												<td>{$r["ENAME"]}</td>
												<td>{$r["SUB"]}</td>
												<td>{$r["SCO"]}</td>
												<td>{$r["MARK"]}</td>
												<td><a href='delete_mark.php?id={$r["MID"]}' class='btnr'>Delete</a><td>
											</tr>
										
										
										
										
										";
									}
								}
								else
								{
									echo "No Record Found";
								}
								echo "</table>";
							}
						
						
						?>
					
					
					</div>
				</div>
			</div>
	
				
	</body>
</html>