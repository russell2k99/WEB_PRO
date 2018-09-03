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
	}
	$mysqli = new mysqli("localhost", "root", "", "sp1");
	if ($mysqli->connect_errno) {
	   die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	// for all category select
	$sql = "SELECT * FROM supplier";

	$supplier = $mysqli->query($sql);

	$check_supplier = $supplier->num_rows;

	// insert category
	
	$result = mysqli_query($mysqli,$sql)or die(mysqli_error());
	
	if (isset($_POST['Submit'])) {
		if (isset($_POST['supplier'])) {
			
			$supplierValue = $_POST['supplier'];
		 $supplierValue=strtolower($supplierValue);
		}
		$supplierValue1 = $_POST['supplier1'];
	if($supplierValue=="" ||$supplierValue1==""){?>
			<div class="content">
				<h1 style="color:red;"><?php	echo "you must select one!"."</br>";?> </h1>
	</div>
	<?php
	}
else{	
	 if (mysqli_num_rows($result) > 0) {
    // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
		if(strtolower($row["name"])==$supplierValue){
break;
		}
    }
 }
	if(strtolower($row["name"])==$supplierValue){?>
	<div class="content">
	<h1 style="color:red;"><?php	echo "supplier already exist!"."</br>";?> </h1>
		</div>
	<?php
	}
	else{

		$sqlInsert = "INSERT INTO supplier (name,contact) VALUES ('".strtoupper($supplierValue)."','".$supplierValue1."')";
		if ($mysqli->query($sqlInsert)) {
	    	$_SESSION['a_p_message'] = 'Category successfully Added.';
	    	header("Location: sup.php");
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
				if ($check_supplier > 0) { 	
				    while ($suppliers = $supplier->fetch_object()) { ?>
			    		<li><?php echo "SUPPLIER NAME:".$suppliers->name."       SUPPLIER CONTACT:".$suppliers->contact ; ?></li>		  			
					<?php }
				} else {
					echo "<li>No Supplier Found</li>";
				} ?> 
                    </ul>
				</div>

				<table class="addCategory">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<tr>
					    <td>
						<input type="text" name="supplier" placeholder="Supplier name"></td>
					</tr>
                    <tr>
					    <td>
						<input type="text" name="supplier1" placeholder="Supplier contact"></td>
					</tr>
                    <tr>
					    <td>
						<input type="submit" name="Submit" value="Add Supplier" /></td>
					</tr>
					</table>
				</div>
				
			</td>
			
		</tr>	
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
	</table>

</body>
</html>