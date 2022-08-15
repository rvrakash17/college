<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('login_staff.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	if(isset($_GET["rno"]))
	{
		$sql="select * from student where RNO='{$_GET["rno"]}'";
		$res=$db->query($sql);
		if($res->num_rows<=0)
		{
			header("location:add_mark.php?err=Invalid Register no..");
		}
		else
		{
			$rows=$res->fetch_assoc();
			$dep=$rows["SDEPT"];
			$regno=$_GET["rno"];
		}
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
					
					<h3>Add Marks</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$sq="insert into mark(TID,REGNO,SUB,SCO,MARK,ENAME,DEPT) values ('{$_SESSION["TID"]}','{$_POST["regno"]}','{$_POST["sub"]}','{$_POST["sco"]}','{$_POST["mark"]}','{$_POST["ename"]}','{$_POST["dep"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed</div>";
							}
							
						}
					
					
					
					?>
					
					<form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
						<div class="lbox">
							<label> Register No</label><br>
							<input type="text" style="background:#b1b1b1;" value="<?php echo $regno;?>" class="input3" name="regno" readonly><br><br>
							
							<label>Department</label><br>
							<input type="text" style="background:#b1b1b1;"  value="<?php echo $dep ?>" class="input3" name="dep" readonly><br><br>
						</div>
						<div class="rbox">
						<label>Exam Name</label><br>
							<select name="ename" required class="input3">
						
								<?php 
									 $s="SELECT *  FROM exam";
									$re=$db->query($s);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["ENAME"]}'>{$r["ENAME"]}</option>";
												}
											}
								?>
							</select>
							<br><br>
						<label>Sub Name</label><br>
							<select name="sub" required class="input3">
						
								<?php 
									 $s="SELECT *  FROM sub";
									$re=$db->query($s);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
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
									 $s="SELECT *  FROM sub";
									$re=$db->query($s);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["SCODE"]}'>{$r["SCODE"]}</option>";
												}
											}
								?>
							</select>
							<br><br>
							<label >Mark :</label><br>
							<input class="input3" name="mark"  id="mark" type="mark" required>
							<br><br>
							<button type="submit" style="float:right;" class="btn" name="submit"> Add Mark Details</button>
					</form>							
						</div>
						
				</div>
				
			</div>
	
				
	</body>
</html>