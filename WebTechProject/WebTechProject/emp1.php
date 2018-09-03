
<?php
session_start();
if (!isset($_SESSION['userId']) && !isset($_SESSION['admin'])) { 
	    header("Location: login.php");
	}
?>
<script src="2.js" type="text/javascript">
</script>
<!DOCTYPE html>
<html>
<head>
	<title>PayGo</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.png">
</head>
<body>
	<table class="signup">
		<?php require 'template/header1.php'; ?>
<?php require 'template/menu1.php'; ?>
		<?php //require 'template/menu.php'; ?>
		<tr class="maincontent">
			<td class="content">
			
<table>
    
<form action="emp2.php"  method="post">

<tr class="single">
<td>First name:</td>
<td>
<input value="" type="text" name="uname" onkeyup="test()" /><span id ="value1" style="color:blue"></span></td>

</tr>
<tr class="single">
<td>Last name:</td>
<td>
<input value="" type="text" name="uname2" onkeyup="test2()"/><span id="value2" style="color:blue"></span></td>

</tr>
<tr class="single">
<td><h3>DOB:</h3>
<table>
    <tr>
        <td>
        <h4>Date</h4>
<select name="date">
<?php
	for($i=1;$i<=31;$i++){	?>
	 <option value="<?php echo $i?>"><?php echo $i; ?></option>
<?php 	}
	?>
</select>
       </td>
        <td>
        <h4>Month</h4>
<select name="month">
<option value="january">january</option>
<option value="february">february</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
</select>
       </td>
        <td>
    <h4>Year</h4>
<select name="year">
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
</select>
   </td>
    </tr>
</table>



</td>

</tr>
<tr class="single">
<td>gender:</td>
<td><input type="radio" name="gender"value="1"  onclick="test5()" >male <span id="value5" style="color:blue"></span><br>

<input type="radio" name="gender"value="2" onclick="test5()">female</td>




</tr>
<tr class="single">
<td>phone:</td>
<td><input type="Text" name="phone" onkeyup="test3()"><span id="value3" style="color:blue"></span></td>

</tr>
<tr class="single">
<td>Emailid:</td>
<td><input type="Text" name="emailid" onkeyup="test4()"><span id="value4" style="color:blue"></span></td>

</tr>
<tr class="single">
<td>Password:</td>
<td><input type="Text" name="password" onkeyup="test6()"><span id="value6" style="color:blue"></span></td>

</tr>
<tr class="single">
<td>ConfirmPassword:</td>
<td><input type="Text" name="confirmpassword" onkeyup="test7()"><span id="value7" style="color:blue"></span></td>

</tr>
<tr class="single">
<td>Salary:</td>
<td><input type="Text" name="sal"></td>

</tr>
<tr>
    <td colspan="2">
<input type="submit" value="add employee" onclick="return check()"/></td>
</tr>
</form>
</table>			

</td>		
		
		</tr>	
		<div class="footer">
			<p>&copy; PayGo 2017</p>
		</div>
	</table>


</body>
</html>