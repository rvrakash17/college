<div class="navbar">

			<ul class="list">
				<b style="color:white;float:left;line-height:50px;margin-left:15px;font-family:Cooper Black;">
				DSEC</b>
			<?php
				if(isset($_SESSION["AID"]))
				{
					echo'
				
						<li><a href="profile_admin.php">Admin Home</a></li>
				<li><a href="change_pass.php">Settings</a></li>
				<li><a href="logout.php">Logout</a></li>
					';
				}
				elseif(isset($_SESSION["TID"]))
				{
					echo'
				
						<li><a href="profile_staff.php">Staff Home</a></li>
				<li><a href="staff_change_pass.php">Settings</a></li>
				<li><a href="logout.php">Logout</a></li>
					';
				}
				elseif(isset($_SESSION["ID"]))
				{
					echo'
				
						<li><a href="profile_student.php">Student Home</a></li>
				<li><a href="student_change_pass.php">Settings</a></li>
				<li><a href="logout.php">Logout</a></li>
					';
				}
				else{
					echo'
					
					<li><a href="index.php">Admin</a></li>
				<li><a href="profile_staff.php">Staff</a></li>
				<li><a href="profile_student.php">Student</a></li>
				<li><a href="contact.php">Contact Us</a></li>';
				}
			?>
				
			</ul>
		</div>
		