<?php
$q = $_REQUEST['q'];

$con = mysqli_connect('localhost','root','','sp1');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM products" ;

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    $result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    
        if (stristr($q, substr($row["name"], 0, $len))) {
       echo '<ul>';
	   echo '<li><a href="singleProduct.php?product_id='. $row['id'] . '">' . $row['name'] . '</a></li>'."</br>";
		echo '</ul>'."</br>";
		
		}
    
	}
}

$str="";for($i=0;$i<100000;$i++){$str.="slowing down";}
mysqli_close($con);
?>