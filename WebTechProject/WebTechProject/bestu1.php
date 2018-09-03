<!DOCTYPE html>
<html>
<head>
	<title>PayGo</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">
</head>
<body>
	<table class="signup">
	<?php require 'template/header.php'; ?>
		<?php require 'template/menu2.php'; ?>
<table class="maincontent">
        <tr>
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
session_start();
$a="";
if(isset($_POST["e1"])){
	$a=$_POST["e1"];
	}
if($a==""){
	echo "you must provide all info!"."</br>";
}
else{

$_SESSION["cat2"]=$a;
header("Location:bestu2.php");
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
      	
	}
   
  }
 
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}


</script>
</body>
</html>
