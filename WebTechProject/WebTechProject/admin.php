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
	<table class="signup" width="100%">
	<tr>
	    <td>
		<?php require 'template/header1.php'; ?>
		<?php require 'template/menu1.php'; ?>
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


	$conn = mysqli_connect("localhost", "root", "","sp1");
	
$sq2 = "SELECT * FROM users";
$result = mysqli_query($conn, $sq2)or die(mysqli_error());
//echo "order product:"."</br>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	?>
	<table width="100%">
  <tr>
    <th>First Name</th>
    <th>LastName</th>
	<th>Email</th>
	<th>Gender</th>
	<th>Phone</th>
	<th>Salary</th>
	<th>SignUpDate</th>
	<th>Option</td>
	</tr>
	<?php
    while($row = mysqli_fetch_assoc($result)) {
	
		if($row["role"]==2){?>
	<tr>
	 <td><?php echo $row["firstName"]; ?> </td>
   <td><?php echo $row["lastName"];?> </td>
 <td><?php echo $row["email"];?> </td>  
  <td><?php if($row["gender"]==1){
				echo "Male";
				}
				else{
				echo "Female";	
				}?> </td>
		 <td><?php echo $row["phone"];?> </td>
 <td><?php echo $row["salary"];?> </td>		 
  <td><?php echo $row["signup_date"];?> </td>		
  
  <td><a href="sal2.php?emp_id=<?php echo $row["id"] ?>">edit salary</a></td>
  </tr>
 

<?php
				
	   
	   }
}
}	
mysqli_close($conn);
?>
<tr>
    <td>
<a href="profile.php">GO BACK</a></td>
</tr>
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
        </td>
        </tr>
                    </table>
</body>
</html>