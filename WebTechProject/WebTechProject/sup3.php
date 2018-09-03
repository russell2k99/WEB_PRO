<?php 
session_start(); 
	
if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}

	
	$name="";
	if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	} else {
		if($_SESSION['admin'] == 0) {
			session_destroy();
			header("Location: login.php");
		}
$mysqli = new mysqli("localhost", "root", "","sp1");	
$a=$_SESSION["editsup"];
//echo $a;
$sq2 = "SELECT * FROM supplier";
$result = mysqli_query($mysqli, $sq2)or die(mysqli_error());
$contact="";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
		if($row["id"]==$a){
	$name=$row["name"];
	$contact=$row["contact"];		
       }
	   
	}
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PayGo</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">
</head>
<body>
	<div class="signup">
		<?php require 'template/header1.php'; ?>
		<?php require 'template/menu.php'; ?>
		<div class="maincontent">
			<div class="content">
				<div>
					<?php 
						if(isset($_SESSION['a_p_message'])) {
							echo $_SESSION['a_p_message'];
							unset($_SESSION['a_p_message']);
						}
					 ?>
				</div>
				<b>edit product </b>
				<form action="postEditsup.php" method="POST" enctype = "multipart/form-data">
					<div>
						<label>Supplier name</label><br>
						<input type="text" name="name" placeholder="Supplier name" value=<?php echo $name ?> /><br>
					</div>
					
				<div>
						<label>Supplier contact</label><br>
						<input type="text" name="name1" placeholder="Supplier Contact" value=<?php echo $contact ?> /><br>
					</div>
				
				<div>
						<input type="submit" name="Submit" value="Update Product" />
					</div>
				
				</form>
				
			</div>
			
		</div>	
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
	</div>
	

</body>
</html>