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
$a="";
if (isset($_POST["v2"])) { 
	    $a=$_POST["v2"];
	}

if($a==""){
	
	echo "you must select one!"."</br>";
}
else{	
$conn = mysqli_connect("localhost", "root", "","sp1");

$sq1 = "SELECT * FROM category";
$result = mysqli_query($conn, $sq1)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($row["id"]==$a){
			
$sq2 = "DELETE FROM category WHERE id=$a";

if (mysqli_query($conn, $sq2))?>
<h1><?php	echo "record is deleted successfully!"."</br>";?> </h1>    
<?php
break;

		  }
		}
}
  mysqli_close($conn);
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