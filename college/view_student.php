<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
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
				
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
						<label>Department</label><br>
					<select name="dep" required class="input3">
				
						<?php 
							 $sl="SELECT DISTINCT(DNAME) FROM dept";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["DNAME"]}'>{$ro["DNAME"]}</option>";
										}
									}
						?>
					
					</select>
					<br><br>
						
				</div>
				<div class="rbox">
					<label>Section</label><br>
						<select name="sec" required class="input3">
				
						<?php 
							 $sql="SELECT DISTINCT(DSEC) FROM dept";
							$re=$db->query($sql);
								if($re->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($r=$re->fetch_assoc())
										{
											echo "<option value='{$r["DSEC"]}'>{$r["DSEC"]}</option>";
										}
									}
						?>
					
					</select><br><br>
				</div>
					<button type="submit" class="btn" name="view"> View Details</button>
				
						
					</form>
					<br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Student Details</h3><br>";
								$sql="select * from student where SDEPT='{$_POST["dep"]}' and SSEC='{$_POST["sec"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo '
										<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Reg No</th>
											<th>Add No</th>
											<th>Name</th>
											<th>Father Name</th>
											<th>Dept</th>
											<th>Sec</th>
											<th>DOB</th>
											<th>Gender</th>
											<th>Phone</th>
											<th>Mail</th>
											<th>Address</th>
											<th>Pincode</th>
											<th>Image</th>
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
											<td>{$r["RNO"]}</td>
											<td>{$r["ADDNO"]}</td>
											<td>{$r["SNAME"]}</td>
											<td>{$r["FNAME"]}</td>
											<td>{$r["SDEPT"]}</td>
											<td>{$r["SSEC"]}</td>
											<td>{$r["DOB"]}</td>
											<td>{$r["GEN"]}</td>
											<td>{$r["PHO"]}</td>
											<td>{$r["MAIL"]}</td>
											<td>{$r["ADDR"]}</td>
											<td>{$r["PCO"]}</td>
											<td><img src='{$r["SIMG"]}' height='70' width='70'></td>
											<td><a href='delete_student.php?id={$r["ID"]}' class='btnr'>Delete</a><td>
											</tr>
										";
										
									}
								}
							else
							{
								echo "No record Found";
							}
								echo "</table>";
							}
						
						
						?>
					
					</div>
				</div>
				
				
			</div>
	
				
	</body>
</html>