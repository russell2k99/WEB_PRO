<!DOCTYPE html>
<html>
<head>
<style>


</style>
</head>
<body>
<table class="header" width="100%">
<tr>
    <td>
<div class="logo">
		<img src="images/logo.png"/>
	</div>	</td>
    <td>	
			<?php if (isset($_SESSION['userId'])) { ?>
    </td>
    <td><a  href="logout.php">Logout</a>	
			<?php } else {?></td>
		<td>
	<a href="login.php">Sign In</a></td>
		<td>
    <a href="signup.php">Sign Up</a>
			<?php } ?></td>

			
	 
	
	
</tr>
	
	</table>
</body>
</html>