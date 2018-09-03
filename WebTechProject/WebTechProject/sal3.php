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
		<?php require 'template/menu1.php'; ?>
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
$salId=$_SESSION["editsal"];

$mysqli = new mysqli("localhost", "root","","sp1");
if ($mysqli->connect_errno) {
       die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

	$name  =  $_POST['name'];

if($name==""){
echo "you can't any field empty"."</br>";	
	
	
}
else{

	
		$sq2 = "UPDATE users SET salary   ='$name'
								WHERE id   =$salId";

	

	if ($mysqli->query($sq2) == true ) {
	    echo "update salary successfully"."</br>";
	} else {
		print 'Error : ('. $mysqli->errno .') '. $mysqli->error;die();
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
					 