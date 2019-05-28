<?php
session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "details";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $prop  = mysqli_real_escape_string($conn,$_POST['pid']); 
    $state = mysqli_real_escape_string($conn,$_POST['sta']); 
    $pin   = mysqli_real_escape_string($conn,$_POST['pin']); 
    $owner = mysqli_real_escape_string($conn,$_POST['own']); 
	$dis =   mysqli_real_escape_string($conn,$_POST['dis']);
	//$res="SELECT * FROM  inver WHERE pid='$prop' AND  state='$state'  AND pin='$pin'  AND owner='$owner';";
	$res1= "SELECT * FROM  inver1 where propertyifd = '$prop';";
	$res = "SELECT * FROM propertytax WHERE propertyid ='$prop' AND owner='$owner' AND district='$dis' AND pin='$pin' AND state = '$state' ;";
	$result = $conn->query($res);
	$result1 = $conn->query($res1);
	if ($result->num_rows >=1) {
    // output data of each row
    while($row = $result1->fetch_assoc())
{
    $_SESSION['unid']=$row['userid'];
	//echo $row['uni'];
	header("Location: signup.php");
}
    } 
else
{ 
        header("Location 1.html");
}		
	?>