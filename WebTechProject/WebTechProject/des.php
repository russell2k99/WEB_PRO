<!DOCTYPE html>
<html>
<head>
	<title>PayGo</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">
</head>
<form action="des1.php" method="post">
<?php
session_start();
if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}?>
	<body>
	<table class="signup">
		<?php require 'template/header1.php'; ?>
		<?php require 'template/menu.php'; ?>
<tr class="maincontent">
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
$count=0;
$a=$_SESSION['userId'];
$conn = mysqli_connect("localhost", "root", "","sp1");

$sq2 = "SELECT * FROM category";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
echo "category:"."</br>"; 
 while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		echo '<input type="radio" name="e1" value="'.$row["id"].'">'.$row["category_name"]."</br>"."</br>"; 
       $count=$count+1;
	   
    }
	   if($count==0){
	
	echo "no orders!"."</br>";
	
}

	
}
mysqli_close($conn);
?>
<input type="submit" value="open">
</form>
</td>
</tr>	
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
	</table>

</body>
</html>
