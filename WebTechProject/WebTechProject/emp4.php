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
$a=$_SESSION['userId'];
$b="";
if(isset($_POST["e1"])){
$b=$_POST["e1"];
//echo $i;	
	
}
$c="";
$d="";
if($b==""){
echo "you must select one"."</br>";	
	
	
}
else{
$conn = mysqli_connect("localhost", "root", "","sp1");

$sq1 = "SELECT payment.id,payment.userid,payment.location,payment.quantity,payment.days,payment.productname,payment.productid,users.firstName,users.lastName,payment.phonenumber,payment.email,payment.accountspay,payment.accountrec
FROM payment
INNER JOIN users
ON (payment.userid=users.id)";
//echo $sq1;
$result = mysqli_query($conn, $sq1)or die(mysqli_error());

if (mysqli_num_rows($result)> 0){
	//$x="";
while($row = mysqli_fetch_assoc($result)) {
if($row["id"]==$b){
echo "NAME:"." ".$row["firstName"]." ".$row["lastName"]."</br>";
 echo "PHONENUMBER:"." ".$row["phonenumber"]."</br>";
echo "PHONENUMBER:"." ".$row["phonenumber"]."</br>";
echo "LOCATION:"." ".$row["location"]."</br>";
echo "PRODUCTNAME:"." ".$row["productname"]."</br>";
echo "DAYS: ". "  ".$row["days"]."</br>";   
echo "quantity:  "." ".$row["quantity"]."</br>";
echo "PRIZE:"." ".$row["accountspay"]."</br>";	   
$c=$row["productid"];	   
$d=$row["accountspay"];	   
$_SESSION["payquan"]=$row["quantity"];	
        break;
		}
	}
}
$_SESSION["product"]=$c;
$sq2 = "SELECT * FROM products";
$result2 = mysqli_query($conn, $sq2)or die(mysqli_error());
if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
		if($row["id"]==$c){
		echo "CATEGORY:"." ".$row["category_id"]."</br>";
       echo '<img width="300px" height="300px" src="'.$row["image"].'">'."</br>";
	   }
	   
	}
}


$_SESSION["pay2"]=$d;
$_SESSION["pay3"]=$b;
$_SESSION["pro"]=$c;
mysqli_close($conn);

}
?>
<a href="emp5.php">PAID</a></br>
<a href="emp6.php">remove transection</a>
</td>
</tr>	
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
	</table>

</body>
</html>