<?php 
session_start(); 
	
if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}

$productId="";	
/*if (isset($_GET['id'])){ 
	$productId = $_GET['id'];
echo $productId;
}*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>PayGo</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">
</head>
<body>
	<table class="signup">
		<?php require 'template/header1.php'; ?>
		<?php require 'template/menu.php'; ?>
		<tr class="maincontent">
			<td class="content">					
			<?php 

			if(isset($_SESSION['a_p_message'])) {
				echo '<div>' . $_SESSION['a_p_message']. '</div>';
				unset($_SESSION['a_p_message']);
			}

			$mysqli = new mysqli("localhost", "root","","sp1");
			if ($mysqli->connect_errno) {
			   die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
			}

			$sql = "SELECT * FROM category ";

			$product = $mysqli->query($sql);

			$check_product = $product->num_rows;

			 if ($check_product > 0) {

			    /* fetch object array */
			    while ($singleProduct = $product->fetch_object()) {
			 ?>
				<form action="editcategory2.php" method="POST" enctype = "multipart/form-data">
					<div>
						<input type="radio" name="v1" value="<?php echo $singleProduct->id ?>" /><?php echo $singleProduct->category_name?><br>

						</div>
						<?php 
			} ?>
									
				
					<div>
						<input type="submit" name="Submit" value="Update Category" />
					</div>
				</form>
			<?php 
			} ?>
				
			</td>
			
		</tr>	
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
	</table>
	

</body>
</html>