<?php 
	include"database.php";
	
	$sql="SELECT * FROM student WHERE SNAME LIKE '{$_POST["s"]}%' ";
	$res=$db->query($sql);
		echo "<table border='1px' class='table'>
				<tr>
					<th>S.No</th>
					<th>Name</th>
					<th>Reg No</th>
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
				<td>{$row["SNAME"]}</td>
				<td>{$row["RNO"]}</td>
				<td>{$row["PHO"]}</td>
				<td><a href='student_view.php?id={$row["ID"]}' class='btnb'>View</a></td>
				<td><a href='delete_student.php?id={$row["ID"]}' class='btnr'>Delete</a></td>
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