<!DOCTYPE html>
<html>
<head>
	<title>PayGo</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">
</head>

<?php 
session_start(); 

//$productId = $_GET['id'];


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
$catId=$_SESSION["editcat"];
$mysqli = new mysqli("localhost", "root","","sp1");
if ($mysqli->connect_errno) {
       die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

	$name  =  $_POST['name'];

if($name==""){
echo "you can't any field empty"."</br>";	
	
	
}
else{
		$sql = "SELECT * FROM category";


$categoryValue=strtolower($name);
	// insert category
	
	$result = mysqli_query($mysqli,$sql)or die(mysqli_error());
		 if (mysqli_num_rows($result) > 0) {
    // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
		if(strtolower($row["category_name"])==$categoryValue){
break;
		}
    }
 }
	if(strtolower($row["category_name"])==$categoryValue){?>
	<div class="content">
	<h1><?php	echo "category already exist!"."</br>";?> </h1>
		</div>
	<?php
	}
	else{
	
		$sq2 = "UPDATE category SET category_name   ='".strtoupper($categoryValue)."'
								WHERE id   =$catId";

	

	if ($mysqli->query($sq2) == true ) {
	    echo "update category successfully"."</br>";
	} else {
		print 'Error : ('. $mysqli->errno .') '. $mysqli->error;die();
	} 
	}
	
$mysqli->close();

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