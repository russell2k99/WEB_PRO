
<table class="mainmenu" width="100%">
	<tr>
		<td><a href="index.php">Home</a></td>
		<?php 
			$mysqli = new mysqli("localhost","root","","sp1");
			if ($mysqli->connect_errno) {
			   die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
			}
			// for all category select
			$menusql = "SELECT * FROM category";

			$menuCategory = $mysqli->query($menusql);

			$check_menuCategory = $menuCategory->num_rows;

			if ($check_menuCategory > 0) { 	
			    /* fetch object array */
			    while ($menuCategories = $menuCategory->fetch_object()) { ?>
		    		<td><a href="categoryProduct.php?id=<?php echo $menuCategories->id; ?>"><?php echo $menuCategories->category_name; ?></a></td>	
	  			<?php }
			} 
		?>
				
		<td><a href="">Contact</a></td>			
	</tr>
	
</table>	