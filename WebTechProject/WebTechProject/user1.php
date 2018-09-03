<!DOCTYPE html>
<html>
<head>
	<title>PayGo</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">
</head>
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "","sp1");
	if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}?>
		<body>
	<table class="signup" width="100%" >
	<tr>
	    <td>
	<?php require 'template/header.php'; ?>
		<?php //require 'template/header1.php'; ?>
		<?php require 'template/menu2.php'; ?>
<table class="maincontent" width="100%">
       <tr> 
        
<td class="sidebar">
			<?php require 'template/sidemenu.php'; ?>
			    
			</td>
        
			<td class="content">
				<table>
				<tr>
				    <td>
					<?php 
						if(isset($_SESSION['a_p_message'])) {
							echo $_SESSION['a_p_message'];
							unset($_SESSION['a_p_message']);
						}
					 ?></td>
				</tr>
					 </table> 
<?php

$idbuy=array();
if(isset($_SESSION["idbuy2"])){
$idbuy=$_SESSION["idbuy2"];
}

if(empty($idbuy))
{
echo "you have nothing to purchase"."</br>";	
}
else{
$a="";
$b="";
$c="";
$d="";
$e="";
$f="";
$g="";
$h="";
$k="";


?>
<form action="user2.php"  method="post">
<h1>PAYMENT ISSUSE:</h1>	

location:
<div>
<input value="" type="text" name="loc" />
</div>

phone number:
<div>
<input value="" type="text" name="num" />
</div>
	
email address:
<div>
<input value="" type="text" name="email" />
</div>		

  
order time:
<div>
<select name="days">
<option value="1">1 Week</option>
<option value="2">2 Week</option>
<option value="3">3 week</option>
<option value="4">4 week</option>
</select>
</div>
</br>
<input type="submit" value="submit"/></br>
</form>	


<?php
$i=1;
$j=2;	
$pid="";
$k=1;
$l=1;
$pidar=array();
$pquanar=array();
$price=array();
$pname=array();
$pquan=array();
foreach($idbuy as $key=>$value){
if($i==$key){	
$sq6 = "SELECT * FROM buylist";
$result6 = mysqli_query($conn, $sq6)or die(mysqli_error());
//if (mysqli_num_rows($result) > 0) {   
   while($row6 = mysqli_fetch_assoc($result6)){   
		if($row6["id"]==$value){
	$pidar[$k]=$row6["product_id"];			
		break;	
		}
   }


$pid=$pidar[$k];	

  $pid1=trim($pid);
  
  
//echo $pid." ".$pid1;  
$sq2 = "SELECT * FROM products";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());
   while($row = mysqli_fetch_assoc($result)){   
		if($row["id"]==$pid1){
   
       //$row["name"];
	$b=$row["name"];	
		$c=$row["quantity"];
		$d=$row["price"];
		$e=$row["category_id"];
		$f=$row["image"];
		$g=$row["discount"];
		$h=$row["uniqueP"];
	break;
       }
	   
	}
	

$sq3 = "SELECT * FROM category";
$result2 = mysqli_query($conn, $sq3)or die(mysqli_error());

if (mysqli_num_rows($result2) > 0) {
//echo $e; 
 // output data of each row
    while($row2 = mysqli_fetch_assoc($result2)) {
		if($row2["id"]==$e){
echo "category name:"."  ".$row2["category_name"]."</br>";
       }
	   
	}
}
$price[$k]=$g;
$pname[$k]=$b;
$pquan[$k]=$c;
echo "product name:".$b."</br>";	
echo "product price:".$d."</br>";	
echo "product discount:".$g."</br>";
echo '<img width="300px" height="300px" src="'.$f.'">'."</br>"."</br>"; 
$k=$k+1;
$i=$i+2;

}
elseif($j==$key){
$pquanar[$l]=$value;	
$l=$l+1;	
$j=$j+2;	
}
}
  //echo $pid;
$_SESSION["price"]=$price;
 $_SESSION["pidar"]=$pidar;
$_SESSION["pquanar"]=$pquanar;
 $_SESSION["pname"]=$pname;
$_SESSION["pquan"]=$pquan;
	
}
mysqli_close($conn);
if($idbuy){
?>
<a href="user6.php">CANCEL TRANSECTION</a></br>

<?php
}
?>
<a href="profile2.php">GO BACK</a>
</td>
 </tr>  
 </table>
		<tr class="footer">
		<td><p>&copy; PayGo 2017</p></td>
           
            </tr>
	</table>
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