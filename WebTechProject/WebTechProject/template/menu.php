<?php if ( isset($_SESSION['userId']) && isset($_SESSION['admin']) && $_SESSION['admin'] == true ) { ?> 

	<table class="adminMenu" width="100%">
	
		<tr>	
			<td><a href="addCategory.php">Categories</a></td>
		     <td><a href="deleteCategory.php">Delete Categories</a></td>
           <td><a href="editCategory.php">Edit Categories</a></td>			 
			<td><a href="addproduct.php">Add Product</a></td>			
			<td><a href="profile1.php">My Profile</a></td>
			<td><a href="editProduct0.php">Edit Product</a></td>
			<td><a href="deleteProduct.php">Delete Product</a></td>
			<td><a href="emp3.php">Check Transection</a></td>  
	  <td><a href="des.php">Product Description</a></td>
		 <td><a href="sup.php">ADD SUPPLIER</a></td>
		 <td><a href="sup1.php">Edit SUPPLIER</a></td>		
		<td><a href="sup4.php">Delete SUPPLIER</a></td>		
		</tr>
	
	</table>

 <?php
 
 
 
 } 

?>
