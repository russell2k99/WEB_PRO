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
	<table class="signup">
		<?php require 'template/header1.php'; ?>
		<?php require 'template/menu.php'; ?>
<tr class="maincontent">
			<td class="content">
				<div>
					<?php 
						if(isset($_SESSION['a_p_message'])) {
							echo $_SESSION['a_p_message'];
							unset($_SESSION['a_p_message']);
						}
					 ?>
				</div>


<?php

$conn = mysqli_connect("localhost", "root", "","sp1");

$sq1 = "SELECT * FROM category";
$result = mysqli_query($conn, $sq1)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
?>
<form action="postDeletecategory.php" method="POST" >	
					<div>
						<input type="radio" name="v2" value="<?php echo $row["id"] ?>" /><?php echo $row["category_name"]?><br>

						</div>
						 
<?php	 
	  }?>			
									
				
					<div>
						<input type="submit" name="Submit" value="Select Category" />
					</div>
				</form>
<?php
	}
  mysqli_close($conn);

?>

</td>
</tr>	
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
	</table>

</body>
</html>