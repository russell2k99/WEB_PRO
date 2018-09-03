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
	<div class="signup">
	<?php require 'template/header.php'; ?>
		<?php //require 'template/header1.php'; ?>
		<?php require 'template/menu2.php'; ?>
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
<?php
$a="";
$b=$_SESSION["cat"];
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
	$ar[$i]=$row["discount"];
	$i=$i+1;
	 }
	}
}
rsort($ar);
$arrlength = count($ar);
$br=array();
$t=1;
$t2="";
$value="";
//$arrlength = count($ar);
for($x = 0; $x < $arrlength; $x++) {
$result1 = mysqli_query($conn, $sq2)or die(mysqli_error());
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
	while($row1 = mysqli_fetch_assoc($result1)) {
 if(($b==$row1["category_id"])&&($row1["discount"]==$ar[$x])){
	$t2=$row1["id"];
	 foreach($br as $value){
	 if($value==$row1["id"]){
	break;	 
	 }
else{	 

	 
	}
	 }
	  //break;
	if($value!=$row1["id"]){
	
	 ?>
<a href="singleProduct.php?product_id=<?php echo $row1["id"]?>">
					 <div class='product'>
					 	<div class="product_image">	
					 		<img src='<?php echo $row1["image"] ?>'width='200' height='200'>
				 		</div>
					 	<div class="product_info">
				 			<h4><?php echo $row1["name"] ?></h4>
					 		<p>Price :<?php echo $row1["price"] ?> </p>
					 		<p>Discount :<?php echo $row1["discount"]?> </p>						 	
						</div>
				 	</div></a>
	  <?php
	$br[$t]=$t2; 

	 $t=$t+1;
	}
	  }
	 }
	}
}
mysqli_close($conn);	

?>


</div>
</div>	
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
	</div>
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
