<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["ID"]))
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
					<h3 class="text">Welcome <?php echo $_SESSION["SNAME"]; ?></h3><br><hr><br>
					
				<div class="tbox" >
					<h3 style="margin-top:30px;"> Staff Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>S.No</th>
							<th>Name</th>
							
							<th>Qualification</th>
							<th>Phone No</th>
							<th>E-Mail</th>
							
							<th>Image</th>
		
						</tr>
						<?php
							$s="select * from staff";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo "
										<tr>
										<td>{$i}</td>
										<td>{$r["TNAME"]}</td>
										
										<td>{$r["QUAL"]}</td>
										<td>{$r["PNO"]}</td>
										<td>{$r["MAIL"]}</td>
										
										<td><img src='{$r["IMG"]}' height='70' width='70'></td>
										
										</tr>
									
									";
									
								}
								
							}
							else
							{
								echo "No Record Found";
							}
						?>
						
					</table>
				</div>
			</div>
	
				
	</body>
</html>