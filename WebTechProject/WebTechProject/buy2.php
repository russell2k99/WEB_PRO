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
$c=array();
$j=0;
$k="";
$i=1;
$count=$_SESSION["count"];
foreach($_POST as $key=>$value)
{
$c[$key]=$value;
	}
$ar=array();
$j=1;
foreach($c as $key1=>$value1)
{
	if($i==$key1){
  if($value1==0){
	  echo "you give wrong quanty"."</br>";
  foreach ($ar as $key4 => $value4) {
    unset($ar[$key4]);
}
  break;
  }
  $ar[$j]=$value1;
  $j=$j+1;
	$i=$i+1;
}
else{
	$i=$key1;
	$i=$i+1;
}		
	}
if(empty($ar)){
echo "you must select correctly" ."</br>";	
	
	
}	
elseif($ar!=""){
	foreach($ar as $key2=>$value2){
		echo $value2;
		
	}
$conn = mysqli_connect("localhost", "root", "","sp1");		
		

$_SESSION["idbuy2"]=$ar;
header("Location:user1.php");
mysqli_close($conn);	
	}
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