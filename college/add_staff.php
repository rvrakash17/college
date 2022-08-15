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
			
			
			<div id="section">
				
				<?php include"sidebar.php";?><br><br><br>
				
				<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content1">
					
						<h3 > Add Staff Details</h3><br>
						
					<?php
						if(isset($_POST["submit"]))
						{
							
							$sq="insert into staff(TNAME,TPASS,QUAL,PNO,MAIL,PADDR) values('{$_POST["tname"]}','{$_POST["tpass"]}','{$_POST["qual"]}','{$_POST["pno"]}','{$_POST["mail"]}','{$_POST["paddr"]}')";
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
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					     <label>Staff Name</label><br>
					     <input type="text" name="tname" required class="input">
					     <br><br>
						 <label>Staff Pass</label><br>
					     <input type="text" name="tpass" required class="input">
					     <br><br>

					     <label>Qualification</label><br>
					     <input type="text" name="qual" required class="input">
					     <br><br>
						 <label>Phone No</label><br>
					     <input type="text" name="pno" required class="input">
					     <br><br>
						 <label>Mail Id</label><br>
					     <input type="email" name="mail" required class="input">
					     <br><br>
					     <label>Address</label><br>
					     <input type="text" name="paddr" required class="input">
					     <br><br>
						 
					     <button type="submit" class="btn" name="submit">Add Staff Details</button>
					</form>
				
				
				</div>
				
				
			</div>
	
				
	</body>
</html>