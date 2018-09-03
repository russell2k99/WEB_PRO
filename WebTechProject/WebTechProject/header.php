<table class="header">
<tr>
	<td class="logo">
		<img src="images/logo.jpg"/>
	</td>	
	<td class="search">
		<form>
			<input class="textbox" id="searchInput" type="text" name="search" value="" placeholder="Write Here">
			<input id="searchButton" class="find" type="submit" value="Search">
		</form>	
		<div id="result"></div>
	</td>
	<td class="login">
		
			<?php if (isset($_SESSION['userId'])) { ?>
				<a href="logout.php">Logout</a>
			<?php } else {?>
				<a href="login.php">Sign In</a>
				<a href="signup.php">Sign Up</a>
			<?php } ?>
	
	</td>
	</tr>
</table>