<div class="sidebar"><br>
<h3 class="text">Dashboard</h3><br><hr><br>
<ul class="s">
<?php
	if(isset($_SESSION["AID"]))
	{
		echo'
			<li class="li"><a href="add_event.php">Events</a></li>
			<li class="li"><a href="profile_admin.php">Profile</a></li>
			<li class="li"><a href="view_student.php">View Students</a></li>
			<li class="li"><a href="search_student.php">Search Students</a></li>
			<li class="li"><a href="view_staff.php">View Staff</a></li>
			<li class="li"><a href="search_staff.php">Search Staff</a></li>
			<li class="li"><a href="view_department.php">View Department</a></li>
			<li class="li"><a href="view_subject.php">View Subjects</a></li>
			<li class="li"><a href="view_exam.php">View Exam</a></li>
			<li class="li"><a href="add_student.php">Add Students</a></li>
			<li class="li"><a href="add_staff.php">Add Staff</a></li>
			<li class="li"><a href="add_department.php">Add Department</a></li>
			<li class="li"><a href="add_subject.php">Add Subject</a></li>
			<li class="li"><a href="add_exam.php">Add Exam</a></li>
			<li class="li"><a href="logout.php">Logout</a></li>
		
		';
	
	
	}
	elseif(isset($_SESSION["TID"])){
		echo'
		<li class="li"><a href="edit_event.php">Events</a></li>
			<li class="li"><a href="profile_staff.php">Profile</a></li>
			<li class="li"><a href="handle_dept.php"> Handled Dept</a></li>
			<li class="li"><a href="view_stud_teach.php"> View Student</a></li>
			<li class="li"><a href="staff_add_exam.php">Add Exam</a></li>
            <li class="li"><a href="staff_view_exam.php">View Exam</a></li>
			<li class="li"><a href="add_mark.php">Add Marks</a></li>
			<li class="li"><a href="view_mark.php">View Marks</a></li>
			<li class="li"><a href="logout.php">Logout</a></li>

		
		';
	}
	else{
		echo'
	     	<li class="li"><a href="view_event.php">Events</a></li>
			<li class="li"><a href="profile_student.php">Profile</a></li>
			<li  class="li"><a href="stu_view_sub.php">View Subjects</a></li>
			<li  class="li"><a href="stu_view_staff.php">View Staffs</a></li>
			<li class="li"><a href="stu_view_exam.php">View Exam</a></li>
			<li class="li"><a href="stu_view_mark.php">View Marks</a></li>
			<li class="li"><a href="logout.php">Logout</a></li>

		
		';
	}


?>
	

</ul>

</div>