<?php 
	include"database.php";
	
	$sql="SELECT * FROM staff WHERE TNAME LIKE '{$_POST["s"]}%' ";
	$res=$db->query($sql);
		echo "<table border='1px' class='table'>
				<tr>
					<th>S.No</th>
					<th>Name</th>
					<th>Phone No</th>
					<th>View</th>
					<th>Delete</th>
				</tr>
				";
	if($res->num_rows>0)
		
	{
		$i=0;
		while($row=$res->fetch_assoc())
		{
			$i++;
			echo "<tr>
				<td>{$i}</td>
				<td>{$row["TNAME"]}</td>
				<td>{$row["PNO"]}</td>
				<td><a href='staff_view.php?id={$row["TID"]}' class='btnb'>View</a></td>
				<td><a href='delete_staff.php?id={$row["TID"]}' class='btnr'>Delete</a></td>
				</tr>
			";
		}
				echo "</table>";
	}
		
	else
	{
		echo "<p>No Record Found</p>";
	}
	
?>