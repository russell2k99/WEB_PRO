<table class="header" width="100%">
<tr>
	<td class="logo">
		<img src="images/logo.png"/>
	</td>	
	<td class="search">
		
	<form>
	<input type="text" id="searchInput" name="search" value="" placeholder="Write Here" onkeyup="showUser(this.value)">
	 <input id="searchButton" type="submit" value="search" onclick="showUser(this.value)">
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