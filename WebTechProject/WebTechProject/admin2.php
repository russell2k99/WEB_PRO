
<!DOCTYPE html>
<html>
<head>
	<title>PayGo</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">
</head>
<?php
session_start();
if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}?>
				<body>
	<table class="signup" width="100%">
	<tr>
	    <td>
		<?php require 'template/header1.php'; ?>
		<?php require 'template/menu1.php'; ?>
<table class="maincontent">
        <tr>
			<td class="content">
				<div>
					<?php 
						if(isset($_SESSION['a_p_message'])) {
							echo $_SESSION['a_p_message'];
							unset($_SESSION['a_p_message']);
						}
					 ?>

					 </div>
<form action="admin3.php" method="POST" >	
<?php

	$conn = mysqli_connect("localhost", "root", "","sp1");
	
$sq2 = "SELECT * FROM users";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());
//echo "order product:"."</br>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["role"]==2){
		
	   echo '<input type="radio" name="e1" value="'.$row["id"].'">'.$row["email"]."</br>"."</br>"; 
	   }
}
}	
mysqli_close($conn);
?>
<input type="submit" name="Submit" value="Delete Employee" />
				</form>
            </td>
    </tr>
				<tr>
				    <td>
<a href="profile.php">GO BACK</a>				        
				    </td>
				</tr>
</td>
</tr>	
	<tr>
	    <td>
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
	        
	    </td>
	</tr>
	</table>

</body>
</html>