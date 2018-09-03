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
	<tr>
	    <td>
	<?php require 'template/header.php'; ?>
		<?php //require 'template/header1.php'; ?>
		<?php require 'template/menu2.php'; ?>
<table class="maincontent">
        <tr>
        <td>
            
<div class="sidebar">
			<?php require 'template/sidemenu.php'; ?>
			    
			</div>
        </td>
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
$a="";
$a=$_SESSION["buypro"];
/*if(isset($_GET["id"])){
$a=$_GET["id"];

}*/

$b=$_SESSION["user_id"];
//echo $a;

$conn = mysqli_connect("localhost", "root", "","sp1");
$sq3 = "SELECT * FROM  products WHERE id=$a";
$sq4 = "SELECT * FROM buylist";


$result3 = mysqli_query($conn, $sq3)or die(mysqli_error());
$result4 = mysqli_query($conn, $sq4)or die(mysqli_error());
$proname="";
if (mysqli_num_rows($result4) > 0) {
    // output data of each row
    while($row4 = mysqli_fetch_assoc($result4)) {
if(($row4["user_id"]==$b)&&($row4["product_id"]==$a)){
	
	break;
	
   }				
  }
if(($row4["user_id"]==$b)&&($row4["product_id"]==$a)){
echo "you have already added tobuylist!"."</br>";
}
else{
if (mysqli_num_rows($result3) > 0) {
    // output data of each row
    while($row3 = mysqli_fetch_assoc($result3)) {
$proname=$row3["name"];		
		
		
		
	}
}
$sq1 = "INSERT INTO buylist(user_id,pro_name,product_id)
VALUES ('$b','$proname','$a')";
mysqli_query($conn, $sq1)or die(mysqli_error()); 

	echo "ADDED SUCESSFULLY!"; 
}
}
mysqli_close($conn);	


?>
</td>
</tr>	
<tr>
    <td>
        
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
    </td>
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