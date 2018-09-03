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
?>
	<body>
	<div class="signup">
		<?php require 'template/header1.php'; ?>
		<?php require 'template/menu.php'; ?>
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
$target_dir = "images/product/";
$target_file = $target_dir . $_FILES["image"]["name"]; 

$mysqli = new mysqli("localhost", "root","", "sp1");
if ($mysqli->connect_errno) {
   header("Location: signup.php");
}
   $name  =  $_POST['name'];
	$quantity   =  $_POST['quantity'];
	$price      =  $_POST['price'];
		$buyingPrice=  $_POST['price1'];
	$discount   =  $_POST['discount'];
	$category_id    =  "";
	$supplier_id="";
	if(isset($_POST['category_id'])){
		$category_id =$_POST['category_id'];
		
		
	}
		if(isset($_POST['supplier_id'])){
		$supplier_id =$_POST['supplier_id'];
		
	}
	$discount1="";
$unique="";
$uploadOk = 1;
if(!isset($_POST['unique'])){
		$unique =  0;
	} else {
		$unique =  $_POST['unique'];
	}
	
if(($name=="") || ($quantity=="") || ($price=="") ||($category_id=="" ) || ($target_file=="")||($buyingPrice=="")||($supplier_id==""))
{
echo 'Please fill the field';
}	
else{
	
			$sql = "SELECT * FROM products WHERE category_id   =$category_id";
$row;

$productValue=strtolower($name);
	// insert category
	
	$result = mysqli_query($mysqli,$sql)or die(mysqli_error());
		 if (mysqli_num_rows($result) > 0) {
    // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
			if(strtolower($row["name"])==$productValue){
break;
		}	
    }
 }
	if(strtolower($row["name"])==$productValue){?>
	<div class="content">
	<h1><?php	echo "product  already exist in this category!"."</br>";?> </h1>
		</div>
	<?php
	}
	else{
if($discount != 0){
	$discount=($discount*$price)/100;
	$discount1=$price-$discount;
	
}
else{
	$discount=0;
	$discount1=$price-$discount;
}
	
if (file_exists($target_file)) {
    echo "Sorry, file already exists<br>";
    $uploadOk = 0;
}
if ($_FILES["image"]["size"] > 500000) {
    echo "File size exceeded<br>";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded<br>";
}
else{
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			$sql = "INSERT INTO products (name, quantity,price,buying_price,supplier_id,category_id,image,discount,uniqueP)
		VALUES ('".strtoupper($name)."','".$quantity."','".$price."','".$buyingPrice."','".$supplier_id."','".$category_id."','".$target_file."','".$discount1."','".$unique."')";
		//echo $sql."<br>"; //your file is uploaded into server,now execute the sql to keep record in db
       // echo "The file ".  $_FILES["fileToUpload"]["name"]. " has been uploaded<br>";
    
	
	if ($mysqli->query($sql)) {
	    //header("Location: addproduct.php");
	    
		echo "addproduct successfully!";
		//$_SESSION['a_p_message'] = 'Add product successfully.';
	}
	}
	else {
	   
	   
	   // $_SESSION['a_p_message'] = 'Something wrong.';
		echo "Sorry, there was an error uploading your file<br>";
    }

	$mysqli->close();

}
}
}
?>

</div>
</div>	
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
	</div>

</body>
</html>