<!DOCTYPE html>
<html>
<head>
	<title>PayGo</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">
</head>


<form action="user4.php" method="post">
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

$a=$_SESSION['userId'];
echo $a;
$conn = mysqli_connect("localhost", "root", "","sp1");

$sq2 = "SELECT * FROM payment";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());
echo "order product:"."</br>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["cgpa"]. "<br>";
		if($row["userid"]==$a){
		echo '<input type="radio" name="e1" value="'.$row["id"].'">'.$row["productname"]."</br>"."</br>"; 
       
	   
	   }
	   
	}
}





mysqli_close($conn);
?>
<input type="submit" value="open">
</form>
</td>	
       
        </td>
        </tr>
        <tr>
            <td>
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div></td>
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