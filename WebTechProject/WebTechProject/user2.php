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
$user=$_SESSION['userId'];
$a="";
$b="";
$c="";
$e="";	
	if(isset($_POST["loc"])){
		$a=$_POST["loc"];
		
		
	}
	if(isset($_POST["num"])){
		$b=$_POST["num"];
		
		
	}
	
	
	if(isset($_POST["email"])){
		$c=$_POST["email"];
		
		
	}
	
	
		if(isset($_POST["days"])){
		$e=$_POST["days"];
		
		
	}
	$phone=strlen($b);
	
	$email=filter_var($c,FILTER_VALIDATE_EMAIL);
$d="";

$price=array();
$pidar=array();
$pquanar=array();
$pname=array();
$pquan=array();
$buylist=array();
$price=$_SESSION["price"];
 $pidar=$_SESSION["pidar"];
$pquanar=$_SESSION["pquanar"];
$pname=$_SESSION["pname"];
$pquan=$_SESSION["pquan"];
$conn = mysqli_connect("localhost", "root", "","sp1");
if($a==""||$b==""||$c==""||$e==""){
	echo "you must provide all info!"."</br>";
}
elseif($phone==11 &&($email)){
	$i=1;
$j=1;
$k=1;
$l=1;
$m=1;
foreach($pidar as $key=>$value){
	//echo $value."</br>";
foreach($pquanar as $key1=>$value1){
	
	if(($i==$j)&&($j==$key1)){
		//echo $value1."</br>";
		$j=$j+1;
break;
}
}
	foreach($price as $key2=>$value2){
	if(($i==$k)&&($k==$key2)){
		//echo $value2."</br>";
		$k=$k+1;
	
break;
	}	

	}	
foreach($pname as $key3=>$value3){
	if(($i==$l)&&($l==$key3)){
		//echo $value3."</br>"."</br>";
$l=$l+1;
	break;

	}
}
foreach($pquan as $key4=>$value4){
	if(($i==$m)&&($m==$key4)){
		//echo $value4."</br>"."</br>";
$m=$m+1;
	break;

	}
}

$sq1 = "INSERT INTO payment (userid,location,phonenumber,email,days,productid,quantity,productname,accountspay)
VALUES ('$user','$a','$b','$c','$e','$value','$value1','$value3','$value2')";
mysqli_query($conn, $sq1)or die(mysqli_error());
		

$value4=$value4-$value1;
$sq3="UPDATE products
SET quantity='$value4' WHERE id='$value'";
if (mysqli_query($conn, $sq3)); 
$i=$i+1;
}	
echo "sir,your purchased successfully!we will contact with you very recently! you can  cancel your order within 24 hours 'cancel order' in the menu bar list.thank you! :)"."</br>";
$buylist=$_SESSION["idbuy2"];

foreach($buylist as $key5=>$value5){
		//echo $value5."</br>"."</br>";
$sq4= "DELETE FROM buylist WHERE id=$value5";
if (mysqli_query($conn, $sq4));
}
//$sq4= "DELETE FROM buylist WHERE id=$buylist";
//if (mysqli_query($conn, $sq4));*/
//echo $d;

$_SESSION["idbuy2"]="";
$_GET["id"]="";


mysqli_close($conn);
}
else{
	echo "you email or phone number is incorrect!"."</br>";
}

?>
<a href="profile2.php">GO BACK</a>

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