<?php session_start(); 
//$a=$_GET["id]; 
if (isset($_SESSION['userId'])) { 
    header("Location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PayGo</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">
</head>
<body>

<?php
if(isset($_GET["id"])){
 $a=$_GET["id"]; 
$_SESSION["id1"]=$a;
//echo $a;

}?>


	<table class="signup" width="100%">
	<tr>
	    <td>
		<?php require 'template/header1.php'; ?>

		<?php// require 'template/menu3.php'; ?>
	
		<table class="maincontent">
		 <tr>
		     <td>
			<div class="sidebar">
			<?php //require 'template/sidemenu.php'; ?>
			    
			</div></td>
		     <td>
		         
			<div class="content">
			
				<b>Login :</b>
				<form action="postLogin.php" method="post">
					<div>
						<label for="useremail" >UserName</label><br>
						<input type="email" name="useremail" id="useremail" placeholder="email" /><br>
					</div>
					<div>
						<label for="password" >Password</label><br>
						<input type="password" name="password" id="password" placeholder="Password" /><br>
						<input type="submit" name="Submit" value="Login" /></br>
				<a href="index.php">Go Back<a>	
					</div>
				
				</form>
				<a href="signup.php">create a acount<a>
			</div>
		         
		     </td>
		 </tr>
		
		</table>	
		
		<div class="footer">
			<?php echo"<p>PayGo 2017</p>"?> 
		</div>
   </td>
	</tr>
    </table>

</body>
</html>