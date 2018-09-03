<?php 
session_start(); 

if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}
$mysqli = new mysqli("localhost", "root", "","sp1");
							if ($mysqli->connect_errno) {
							   die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
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
	<table class="signup">
		<?php require 'template/header1.php'; ?>
		<?php require 'template/menu.php'; ?>
		<tr class="maincontent">
			<td class="content">
			<table>
				<b>Add product </b>
				<form action="postAddproduct.php" method="POST" enctype = "multipart/form-data" name="mfm">
					<tr>
					<td><label>Product name</label></td>
					<td><input type="text" name="name" placeholder="Product name" /></td>
						
					</tr>
					<tr>
					<td><label>Product quantity</label></td>
					<td><input type="number" name="quantity" placeholder="Product quantity" /></td>	
					</tr>
					<tr>
					<td><label>Product Buying price</label></td>
					<td>
						<input type="number" name="price1" placeholder="Product Buying price" /></td>
					
					</tr>
					<tr>
					<td><label>Product Selling price</label></td>
					<td><input type="number" name="price" placeholder="Product Selling price" /></td>
						
					</tr>
					<tr>
					<td><label>Product discount</label></td>	<br>
					<td><input type="number" name="discount" placeholder="Product discount" /></td>	
							
					</tr>
					<tr>
					<td colspan="2">
						<label>Product category</label><br>
						<?php
							
							// for all category select
							$sql = "SELECT * FROM category";
                   
							$category = $mysqli->query($sql);
        
							$check_category = $category->num_rows;
						 ?>
						<select name="category_id" >
						<?php if ($check_category > 0) { 	
						    /* fetch object array */
						    while ($categories = $category->fetch_object()) { ?>
					    		<option value="<?php echo $categories->id; ?>"><?php echo $categories->category_name; ?></option>
				  			<?php }
						}?>
						</select>
					
					
					</td>
					</tr>
					<tr>
					<td colspan="2">
					    
						<label>Supplier Name</label><br>
						<?php
                            $sq2="SELECT * FROM supplier";
							
                            $supplier = $mysqli->query($sq2);
							$check_supplier = $supplier->num_rows;
						 ?>
						<select name="supplier_id" >
						<?php if ($check_supplier > 0) { 	
						    /* fetch object array */
						    while ($suppliers = $supplier->fetch_object()) { ?>
					    		<option value="<?php echo $suppliers->id; ?>"><?php echo $suppliers->name; ?></option>
				  			<?php }
						}?>
						</select>
					</td>
					
					</tr>
					
					
					<tr>
					<td><label>Product Image</label></td>
					<td><input type="file" name="image" placeholder="Product Image" /></td>
						
					</tr>
					<tr>
						<td colspan="2"><input type="checkbox" name="unique" value="1"> Unique</td>
					</tr>
					<tr>
					<td colspan="2">
					    <input type="submit" name="Submit" value="Add Product" />
					</td>
						
					</tr>
				</form>
				</table>
			</td>
			
		</tr>	
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
	</table>
	

</body>
</html>