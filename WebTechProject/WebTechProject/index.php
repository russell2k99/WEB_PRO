<?php session_start();$mysqli = new mysqli("localhost","root","","sp1"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>PayGo</title>
	
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">
</head>
<body>
	<table class="signup" width="100%">
<?php 
if (isset($_SESSION["admin"])){
	$b=$_SESSION['admin'];
//echo $b;

if($b==0){
		 require 'template/header.php'; 

		 require 'template/menu2.php'; 
	}?>
	
		<tr class="slider"  width="100%">
		<td>
			<button class="" onclick="plusDivs(-1)">&#10094;</button>
		</td>
            <td>
			<img class="mySlides" src="images/slider.jpg" width="100%" height="400">
			<img class="mySlides" src="images/slider1.jpg" width="100%" height="400">
			<img class="mySlides" src="images/slider2.jpg" width="100%" height="400">
			</td>
			<td>
			<button class="" onclick="plusDivs(1)">&#10095;</button>
			</td>
		</tr>	
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
			if ($mysqli->connect_errno) {
			   header("Location: signup.php");
			}
				$sql = "SELECT * FROM products";

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
	
	<?php
	
	
	}
}
}
}
else{
	  
?>	
        </tr>
<?php require 'template/header.php'; ?>


	<?php require 'template/menu3.php'; ?>
<table class="slider"  width="100%">
        <tr>
		<td>
			<button class="" onclick="plusDivs(-1)">&#10094;</button>
		</td>
            <td>
			<img class="mySlides" src="images/slider.jpg" width="100%" height="400">
			<img class="mySlides" src="images/slider1.jpg" width="100%" height="400">
			<img class="mySlides" src="images/slider2.jpg" width="100%" height="400">
			</td>
			<td>
			<button class="" onclick="plusDivs(1)">&#10095;</button>
			</td>
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
			<table>
			<tr>
			    <td><?php 
					if(isset($_SESSION['a_p_message'])) {
						echo $_SESSION['a_p_message'];
						unset($_SESSION['a_p_message']);
					}
				 ?>
				 </td>
			</tr>
				
			</table>
			
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
				
				$sql = "SELECT * FROM products";

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
					 		<img src='<?php echo $product->image ?>'width='180' height='180'>
				 		</div></td>
					 </tr>
					 <tr>
					     <td>
					 	<div class="product_info">
				 			<h4><?php echo $product->name ?></h4>
					 		<p>Price :<?php echo $product->price ?> </p>
					 		<p>Discount :<?php echo $product->discount ?> </p>						 	
						</div></td>
					 </tr>
				 	</table></a></td>
				<?php }
				} 
}
				$mysqli->close();
			 }?>
            </tr>
            </table>
    <tr><td>

		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div></td></tr>
    </table>
	
<script>
 var slideIndex = 1;
 showDivs(slideIndex);
 
 function plusDivs(n) {
   showDivs(slideIndex += n);
}
 
 function showDivs(n) {
   var i;
   var x = document.getElementsByClassName("mySlides");
   if (n > x.length) {slideIndex = 1}    
   if (n < 1) {slideIndex = x.length}
   for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
   }
   x[slideIndex-1].style.display = "block";  
 }
</script>
	
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