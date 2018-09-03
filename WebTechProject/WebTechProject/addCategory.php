<!DOCTYPE html>
<html>
<head>
	<title>PayGo</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">
</head>
<?php 


session_start(); 
	// if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	//     header("Location: login.php");
	// } else {
	// 	if($_SESSION['admin'] !=0) {
	// 		header("Location: login.php");
	// 	}
	// }


	
	if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}
	$mysqli = new mysqli("localhost", "root", "", "sp1");
	if ($mysqli->connect_errno) {
	   die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	// for all category select
	$sql = "SELECT * FROM category";

	$category = $mysqli->query($sql);

	$check_category = $category->num_rows;

	// insert category
	
	$result = mysqli_query($mysqli,$sql)or die(mysqli_error());
	
	if (isset($_POST['Submit'])) {
		if (isset($_POST['category'])) {
			
			$categoryValue = $_POST['category'];
		 $categoryValue=strtolower($categoryValue);
		}
	if($categoryValue==""){?>
			<div class="content">
				<h1><?php	echo "you must select one!"."</br>";?> </h1>
	</div>
	<?php
	}
else{	
	 if (mysqli_num_rows($result) > 0) {
    // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
		if(strtolower($row["category_name"])==$categoryValue){
break;
		}
    }
 }
	if(strtolower($row["category_name"])==$categoryValue){?>
	<div class="content">
	<h1><?php	echo "category already exist!"."</br>";?> </h1>
		</div>
	<?php
	}
	else{

		$sqlInsert = "INSERT INTO category (category_name) VALUES ('".strtoupper($categoryValue)."')";
		if ($mysqli->query($sqlInsert)) {
	    	$_SESSION['a_p_message'] = 'Category successfully Added.';
	    	header("Location: addCategory.php");
		} else {
			print 'Error : ('. $mysqli->errno .') '. $mysqli->error;die();
		} 
	}
}
	}
?>

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
				<div class="category">
					<ul>
				<?php 
				if ($check_category > 0) { 	
				    /* fetch object array */
				    while ($categories = $category->fetch_object()) { ?>
			    		<li><?php echo $categories->category_name; ?></li>
		  			<?php }
				} else {
					echo "<li>No Category Found</li>";
				} ?> 
				</div>

				<div class="addCategory">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<input type="text" name="category" placeholder="Category">
						<input type="submit" name="Submit" value="Add Category" />
					</form>
				</div>
				
			</div>
            </td>
		</tr>	
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
	</table>

</body>
</html>