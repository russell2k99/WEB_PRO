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
$productId=$_SESSION["edit"];
$mysqli = new mysqli("localhost", "root","","sp1");
if ($mysqli->connect_errno) {
       die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

	$name  =  $_POST['name'];
	$quantity   =  $_POST['quantity'];
	$price      =  $_POST['price'];
	$discount1   =  $_POST['discount'];
	$buyingPrice=$_POST['price1'];
	$category_id = ""; 
	$supplier_id="";
	
	if(isset($_POST['category_id'])){
		$category_id=$_POST['category_id'];
	}
	if(isset($_POST['supplier_id'])){
		$supplier_id=$_POST['supplier_id'];
	}
	if(!isset($_POST['unique'])){
		$unique =  0;
	} else {
		$unique =  $_POST['unique'];
	}

$productValue="";
if($name==""||$quantity==""||$price==""||$discount1==""||$category_id==""||$buyingPrice==""||$supplier_id==""){
echo "you can't any field empty"."</br>";	
	
	
}
else{
				$sql = "SELECT * FROM products WHERE category_id=$category_id";


$productValue=strtolower($name);
	// insert category
	
	$result = mysqli_query($mysqli,$sql)or die(mysqli_error());
		 if (mysqli_num_rows($result) > 0) {
    // output data of each row
 while($row1 = mysqli_fetch_assoc($result)) {
			if((strtolower($row1["name"])==$productValue)&&($row1["id"]!=$productId)){
break;
		}	
    }
}
	if((strtolower($row1["name"])==$productValue)&&($row1["id"]!=$productId)){?>
	<div class="content">
	<h1><?php	echo "product  already exist in this category!"."</br>";?> </h1>
		</div>
	<?php
	
	}
else{	
	$discount2=$discount1*$price/100;
	$discount=$price-$discount2;
	if(is_uploaded_file($_FILES['image']['tmp_name']) == false){
	
		$sql = "UPDATE products SET name   ='".strtoupper($name)."',
								quantity   ='".$quantity."',
								price      ='".$price."',
								buying_price ='".$buyingPrice."',
								supplier_id='".$supplier_id."',
								category_id='".$category_id."',
								discount   ='".$discount."',
								uniqueP    ='".$unique."'
								WHERE id   =$productId";

	} else {
		$errors= array();
		$file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$im = $file_ext;
		$productImage = uniqid().'.'.$file_ext;

		$expensions= array("jpeg","jpg","png");

		if(in_array($file_ext,$expensions) === false){
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		 header("Location: editproduct3.php");
			$_SESSION['a_p_message'] = 'Sorry, only JPG, JPEG & PNG files are allowed.';
		}

		if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
			header("Location: editproduct3.php");
			$_SESSION['a_p_message'] = 'File size must be excately 2 MB';
		}

		if( empty($errors) ){
		 	move_uploaded_file($file_tmp,"images/product/".$productImage);
		}else{
		 	header("Location: editproduct3.php");
			$_SESSION['a_p_message'] = 'Something wrong.';
		}
$productValue=strtoupper($productValue);
			$sql = "UPDATE products SET name='".$productValue."',
								quantity='".$quantity."',
								price='".$price."',
								buying_price ='".$buyingPrice."',
								supplier_id ='".$supplier_id."',
								category_id='".$category_id."',
								discount='".$discount."',
								image='".$productImage."',
								uniqueP='".$unique."'
								WHERE id=$productId";
	}

	if ($mysqli->query($sql) == true ) {
	    echo "update product successfully"."</br>";
		//header("Location: singleProduct.php");
	    //$_SESSION['a_p_message'] = 'update product successfully.';
	// echo strtoupper($productValue);

	} else {
		print 'Error : ('. $mysqli->errno .') '. $mysqli->error;die();
	    header("Location: editproduct3.php");
	    $_SESSION['a_p_message'] = 'Something wrong.';
	}

	$mysqli->close();

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
