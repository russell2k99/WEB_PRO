<!DOCTYPE html>
<html>
<head>
<title>PayGo</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
$("#selectall").click(function(){
        //alert("just for check");
        if(this.checked){
            $('.checkboxall').each(function(){
                this.checked = true;
            //this.style.visibility="visible";
			})
        
		   $('.checkboxall1').each(function(){
                //this.checked = true;
            this.style.visibility="visible";
			})
		
		}else{
            $('.checkboxall').each(function(){
                this.checked = false;
              
                //this.style.visibility="hidden";			  
			})
        
		 $('.checkboxall1').each(function(){
                //this.checked = false;
              
                 this.style.visibility="hidden";			  
			})
		
		
		}
    });
});
function myFunction(val){
	val2=val;
	val3=val-1;
//document.forms[0].val2.style.visibility= "visible";;	
	//document.getElementById(b).innerHTML = 'none';
	//x=document.getElementByName(val2);
	 //alert(val3);
	 x=document.getElementById(val3).checked;
	//alert(x);
	if(x==true){
	document.getElementById(val2).style.visibility= "visible";
	}
	else{
		
	document.getElementById(val2).style.visibility="hidden";	
		
	}
	//alert(val2);
}
</script>

		</head>
<?php
session_start();
	if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}?>
		<body>
	<table class="signup" width="100%">
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
$conn = mysqli_connect("localhost", "root", "","sp1");
$sq2 = "SELECT * FROM  buylist";

$result2 = mysqli_query($conn, $sq2)or die(mysqli_error());

$i=1;

$productId="";
$productQuan="";
?>
<form action="buy2.php"  method="POST" >	

<input type="checkbox" id="selectall" class="css-checkbox " name="selectall"/>Selectall</br>
<?php
if (mysqli_num_rows($result2) > 0) {
	$k=2;
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {

?>

					<div>
<?php
$productId=$row["product_id"];	
$val=$i+1;
echo '<input  id="'.$i.'" class="checkboxall" type="checkbox"   name="'.$i.'"  value="'.$row["id"].'" onclick="myFunction('.$val.')" />'.$row["pro_name"] ; 	

$i=$i+1;						
$sq3="SELECT * FROM  products";
$result3 = mysqli_query($conn, $sq3)or die(mysqli_error());				
if (mysqli_num_rows($result3) > 0) {
    // output data of each row
    while($row1= mysqli_fetch_assoc($result3)) {
if($productId==$row1["id"]){
$productQuan=$row1["quantity"];	
   
        echo ' <select name="'.$i.'" id="'.$i.'" class="checkboxall1" style="visibility:hidden">';
 for($j=0;$j<=$productQuan;$j++){	
        echo    ' <option value="'.$j.'">'.$j.'</option>'; 	
}
        echo ' </select>';	
 $i=$i+1; 
	}
		
		}
}
	?>
</div>
						 
<?php

//$k=$k+1;		  
	  }
	  
$parm=$i=$i-1;	  
	  ?>			
	<div>
<input type="submit" name="Submit" value="click!"/>
					</div>
				</form>
        </td>
<?php
	$_SESSION["count"]=$i;
	}
  mysqli_close($conn);
?>
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