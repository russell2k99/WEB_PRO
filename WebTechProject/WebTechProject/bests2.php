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
	<tr>
	    <td>
	<?php require 'template/header.php'; ?>
		<?php require 'template/menu2.php'; ?>
<table class="maincontent">
	<tr>
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
$a="";
$b=$_SESSION["cat1"];
//echo $b;
if(isset($_SESSION['userId'])){
$a=$_SESSION['userId'];
//echo $i;	
$ar=array();	
$i=0;
}?>
<?php
$conn = mysqli_connect("localhost", "root", "","sp1");
$sq2 = "SELECT * FROM products";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	if($b==$row["category_id"]){
	$ar[$i]=$row["id"];
	$i=$i+1;
	 }
	}
}
$ar1=array();
$count=0;
$sq3="SELECT * FROM payment";
$arrlength = count($ar);
for($x = 0; $x < $arrlength; $x++) {
$result1 = mysqli_query($conn, $sq3)or die(mysqli_error());
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
	while($row1 = mysqli_fetch_assoc($result1)) {
 if(($row1["productid"]==$ar[$x])&&($row1["accountrec"]!=0)){
$quan=$row1["quantity"];
 $count=$count+$quan;
 $ar1[$row1["productid"]]=$count;	

	  }
	 }
	$count=0;
	}
}
arsort($ar1); 
$sq4 = "SELECT payment.productname,products.id,products.image,products.price,products.discount,payment.productid
FROM payment
INNER JOIN products
ON (payment.productid=products.id)";
echo "best sell product:"."</br>";	
foreach($ar1 as $k => $id){

$result2 = mysqli_query($conn, $sq4)or die(mysqli_error());

if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
		if($k==$row["productid"]){
	
		
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
					<?php
		break;
		}
	}
 }
}
mysqli_close($conn);	

?>

</td>
</tr>	
    <tr>
        <td>
            
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
        </td>
    </tr>
	</table>
<script>
function showUser(str) {
  
  if (str.length==0) { 
    document.getElementById("txtHint").innerHTML="";
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
  
      	
	}
   
  
  }
 
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}


</script>
</body>
</html>
