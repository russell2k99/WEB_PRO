<?php session_start(); 
$mysqli = new mysqli("localhost", "root", "","sp1");
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
	
	<?php 
	
	if(isset($_SESSION["admin"])){
		$b=$_SESSION["admin"];
	//require 'template/header.php'; 

		//require 'template/menu2.php';
	if($b==2){?>
		<?php require 'template/header.php'; ?>

		<?php require 'template/menu.php'; ?>
	<?php}
	elseif($b==1){?>
		<?php require 'template/header.php'; ?>

		<?php require 'template/menu1.php'; ?>
	<?php }
	else{?>
			<?php require 'template/header.php'; ?>

	<?php require 'template/menu2.php';} ?>
				
		<table class="slider" width="100%">
		<tr>
		    <td>
			<img src="images/slider.jpg" width="100%" height="400" /></td>
		</tr>
		</table>
		
		<table class="maincontent">
		<tr>
			<td class="content">
			

			<?php 
			
			if ($mysqli->connect_errno) {
			   header("Location: signup.php");
			}
			
							$productseacrh ="";
				if(isset($_GET['search'])){
				$productseacrh=$_GET['search'];	
				
$sql = "SELECT * FROM products";

				$products = $mysqli->query($sql);
				$check = $products->num_rows;

				 if ($check > 0) {

			    /* fetch object array */
			    while ($product = $products->fetch_object()) {  
				
				if($product->name==$productseacrh){
				?>
				
			    	<a href="singleProduct.php?product_id=<?php echo $product->id ?>">
					 <div class='product'>
					 	<div class="product_image">	
					 		<img src='<?php echo $product->image ?>'width='200' height='200'>
				 		</div>
					 	<div class="product_info">
				 			<h4><?php echo $product->name ?></h4>
					 		<p>Price :<?php echo $product->price ?> </p>
					 		<p>Discount :<?php echo $product->discount ?> </p>						 	
						</div>
				 	</div></a>
				<?php }
				}
				
				} 		
	
	
	}	
else{			
			$id = $_GET['id'];
				$sql = "SELECT * FROM products WHERE category_id='".$id."'";
//echo $id;
				$products = $mysqli->query($sql);
				$check = $products->num_rows;

				 if ($check > 0) {

				    /* fetch object array */
				    while ($product = $products->fetch_object()) {  ?>
				<td>
			    	<a href="singleProduct.php?product_id=<?php echo $product->id ?>">
					 <table class='product'>
					 <tr>
					     <td>
					 	<div class="product_image">	
					 		<img src='<?php echo $product->image ?>' width='200' height='200'>
				 		</div>
				 		</td>
					 </tr>
					 <tr>
					     <td>
					 	<div class="product_info">
				 			<h4><?php echo $product->name ?></h4>
					 		<p>Price :<?php echo $product->price ?> </p>
					 		<p>Discount :<?php echo $product->discount ?> </p>						 	
						</div>
						</td>
					 </tr>
				 	</table></a>
				 	</td>
			  		 <?php }
				} else {
					echo " No product Found for this category";
				}
		
		
		
	//<?php 
	}
	}
else{
		require 'template/header.php'; 

		require 'template/menu3.php'; 
?>

<table class="slider" width="100%">
        <tr>
            <td><img src="images/slider.jpg" width="100%" height="400" /></td>
        </tr>
			
		</table>	
		<table class="maincontent">
		<tr>
		
		<!--	<td class="sidebar">
			<?php //require 'template/sidemenu.php'; ?>
			    
			</td> -->
		<td class="sidebar">
			<?php require 'template/sidemenu.php'; ?>
			    
			</td>
		
			<td class="content">
			<?php 
			//$mysqli = new mysqli("localhost", "root", "","sp1");
			if ($mysqli->connect_errno) {
			   header("Location: signup.php");
			}
			
							$productseacrh ="";
				if(isset($_GET['search'])){
				$productseacrh=$_GET['search'];	
				
$sql = "SELECT * FROM products";

				$products = $mysqli->query($sql);
				$check = $products->num_rows;

				 if ($check > 0) {

			    /* fetch object array */
			    while ($product = $products->fetch_object()) {  
				
				if($product->name==$productseacrh){
				?>
				
			  
				<td>
			    	<a href="singleProduct.php?product_id=<?php echo $product->id ?>">
					 <table class='product'>
					 <tr>
					     <td>
					 	<div class="product_image">	
					 		<img src='<?php echo $product->image ?>' width='200' height='200'>
				 		</div>
				 		</td>
					 </tr>
					 <tr>
					     <td>
					 	<div class="product_info">
				 			<h4><?php echo $product->name ?></h4>
					 		<p>Price :<?php echo $product->price ?> </p>
					 		<p>Discount :<?php echo $product->discount ?> </p>						 	
						</div>
						</td>
					 </tr>
				 	</table></a>
				 	</td>
				<?php }
				}
				
				} 
}
else{
				$id = $_GET['id'];
				$sql = "SELECT * FROM products WHERE category_id='".$id."'";
//echo $id;
				$products = $mysqli->query($sql);
				$check = $products->num_rows;

				 if ($check > 0) {

				    /* fetch object array */
				    while ($product = $products->fetch_object()) {  ?>
					
				<td>
			    	<a href="singleProduct.php?product_id=<?php echo $product->id ?>">
					 <table class='product'>
					 <tr>
					     <td>
					 	<div class="product_image">	
					 		<img src='<?php echo $product->image ?>' width='200' height='200'>
				 		</div>
				 		</td>
					 </tr>
					 <tr>
					     <td>
					 	<div class="product_info">
				 			<h4><?php echo $product->name ?></h4>
					 		<p>Price :<?php echo $product->price ?> </p>
					 		<p>Discount :<?php echo $product->discount ?> </p>						 	
						</div>
						</td>
					 </tr>
				 	</table></a>
				 	</td>
			  		 <?php }
				} else {
					echo " No product Found for this category";
				}

	}
				$mysqli->close();
}			
			 ?>
				
			</td>
			</tr>
		</table>	
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
		
	</table>
<script>
function showUser(str) {
  
  if (str.length==0) { 
    document.getElementById("txtHint").innerHTML="";
    //document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    document.getElementById("result").innerHTML=this.responseText;
  
	
	
   //document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      	
	}
   
      //document.onload=this.responseText;
  
  }
 
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}


</script>

</body>
</html>