<script src="3.js" type="text/javascript">

</script>
<?php session_start(); 
 if(isset($_GET["id"])){
 $a=$_GET["id"]; 
$_SESSION["id1"]=$a;
 }
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
	<table class="signup" width="100%">
	   
		<tr>
		    <td>
		<?php require 'template/header1.php'; ?>

		<?php //require 'template/menu.php'; ?>
		<table>
		<tr class="maincontent">
			<td class="content">
			
				<b>SignUp :</b>
				<table>
				
				<form action="postSignup.php" method="POST">
					<tr class="single">
						<td><label for="firstName">First Name: </label></td>
						<td><input type="text" id="firstName" name="firstName" placeholder="First Name"></td>
					</tr>
					<tr class="single">
					<td><label for="lastName">Last Name: </label></td>
					<td>
						<input type="text" id="lastName" name="lastName" placeholder="Last Name"></td>
						
					</tr>
					<tr class="single">
					<td><label for="email">Email: </label></td>
					<td><input type="email" id="email" name="email" placeholder="Email" onkeyup="test4()"><span id="value4"></span></td>
						
						
					</tr>
					<tr class="single">
						<td><label for="password">Password: </label></td>
						<td>
						<input type="password" id="password" name="password" placeholder="Password" onkeyup="test6()"><span id="value6" ></span></td>
						
					</tr>
					<tr class="single">
					<td><label for="conpass">Confirm Password: </label></td>
					<td>
						<input type="password" id="conpass" name="conpass" placeholder="Confirm Password"onkeyup="test7()"><span id="value7" ></span></td>
						
					</tr>
					<tr class="single">
					<td colspan="2">
						<label >Birth: </label>
						<select name="birthDate">
							<?php $i = 1; while ($i <= 31) { ?>
								<option value=" <?php echo $i; ?>"><?php echo $i; ?></option>
							<?php $i++; } ?>

						</select>
						<select name="birthMonth">
							<?php $i = 1; while ($i <= 12) { ?>
								<option value=" <?php echo $i; ?>"><?php echo $i; ?></option>
							<?php $i++; } ?>

						</select>
						<select name="birthYear">
							<?php $i = 1960; while ($i <= 2016) { ?>
								<option value=" <?php echo $i; ?>"><?php echo $i; ?></option>
							<?php $i++; } ?>

						</select></td>
					</tr>
					<tr class="single">
					 <td>
						<label for="gender">Gender: </label></td>
					 <td>
						<input type="radio" id="gender" name="gender" value="1" onclick="test5()"> Male <span id="value5" style="color:blue"></span></td>
					 <td>
						<input type="radio" id="gender" name="gender" value="0" onclick="test5()"> Female</td>
					</tr>
					<tr class="single">
					 <td>
						<label for="phone">Phone: </label></td>
					 <td>
						<input type="text" id="phone" name="phone" placeholder="Phone"onkeyup="test3()"><span id="value3" style="color:blue"></span></td>
					</tr>
					<tr>
					    <td>
					<input type="submit" name="submit" value="submit" onclick="return check()"></br>
				<a href="index.php">Go Back<a>	</td>
					</tr>
				</form>
                   </table>
                    </td>
			</tr>
		<!--	<div class="sidebar">
			<?php //require 'template/sidemenu.php'; ?>
			</div>-->
		</div>	
            </table>
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
		</td>
		</tr>
	</table>


</body>
</html>