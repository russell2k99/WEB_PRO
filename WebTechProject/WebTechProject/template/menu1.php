<?php if ( isset($_SESSION['userId']) && isset($_SESSION['admin']) && $_SESSION['admin'] == true ) { ?> 
	<table class="adminMenu" width="100%">
		<tr>				
			<td><a href="emp1.php">Add Employee</a></td>			
			<td><a href="profile.php">My Profile</a></td>
			<td><a href="admin.php">employee details</a></td>
			<td><a href="admin2.php">remove employee</a></td>
		</tr>
	</table>
<?php } ?>