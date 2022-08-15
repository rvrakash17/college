<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('login_staff.php?mes=Access Denied...','_self');</script>";
		
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
	
			<div id="section">
				<?php include"sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">
				
					<h3>Add Classes</h3><br>
					
					<div class="lbox1">
					<?php
						if(isset($_POST["submit"]))
						{
							 $sq="insert into hdept(TID,DEP,SEC,SUB,SCO) values ('{$_SESSION["TID"]}','{$_POST["dep"]}','{$_POST["sec"]}','{$_POST["sub"]}','{$_POST["sco"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed..</div>";
							}
		
						}
					
					
					?>					
						
						
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
					<label>Department</label><br>
						
						<select name="dep" required class="input3">
							<?php
								$sl="select DISTINCT(DNAME) from dept";
								$r=$db->query($sl);
								 if($r->num_rows>0)
								 {
									 echo "<option value=''>Select</option>";
									 while($ro=$r->fetch_assoc())
									 {
										 echo "<option value='{$ro["DNAME"]}'>{$ro["DNAME"]}</option>";
									 }
								 }
							
							
							?>
					
						</select>
						
					<br><br>
					
					<label>Section</label><br>
					
						<select name="sec" required class="input3">
						<?php
							$sl="select DISTINCT(DSEC) from dept";
							$r=$db->query($sl);
								if($r->num_rows>0)
								{
									echo "<option value=''>Select</option>";
									while($ro=$r->fetch_assoc())
									{
										echo "<option value='{$ro["DSEC"]}'>{$ro["DSEC"]}</option>";
									}
								}
						
						
						
						
						?>
						
						
						</select><br></br>
						
						
						
					<label>Sub Name</label><br>
					
						<select name="sub" required class="input3">
						<?php
							$s="select * from sub";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>Select</option>";
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["SUBNAME"]}'>{$r["SUBNAME"]}</option>";
								}
							}
						
						
						?>
						</select>
						
					<br><br>
					<label>Sub Code</label><br>
					
						<select name="sco" required class="input3">
						<?php
							$s="select * from sub";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>Select</option>";
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["SCODE"]}'>{$r["SCODE"]}</option>";
								}
							}
						
						
						?>
						</select>
						
					<br><br>
					
					<button type="submit" class="btn" name="submit">Add  Details</button>
					</form>
					
					
					
					</div>
					<div class="rbox1">
					<h3> Details</h3><br>
						<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>S.No</th>
							<th>Class Name</th>
							<th>Section</th>
							<th>Sub Name</th>
							<th>Sub Code</th>

							<th>Delete</th>
						</tr>
						<?php
							$s="select * from hdept where TID={$_SESSION["TID"]}";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
									<tr>
										<td>{$i}</td>
										<td>{$r["DEP"]}</td>
										<td>{$r["SEC"]}</td>
										<td>{$r["SUB"]}</td>
										<td>{$r["SCO"]}</td>
										<td><a href='hdept.php?id={$r["HID"]}' class='btnr'>Delete</a></td>
									</tr>
									
									";
								}
							}
						
						
						
						?>
						
						</table>
					</div>
				</div>
			</div>
	
				
	</body>
</html>