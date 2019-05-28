<?php
session_start();
if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    header('Location: MAIN.html');
}
?>
<?php
session_start();
//if(isset($_POST["submit"])){
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

    $uid = mysqli_real_escape_string($conn,$_POST['uid']); 
    $adr = mysqli_real_escape_string($conn,$_POST['adr']); 
	$lat = mysqli_real_escape_string($conn,$_POST['lat']); 
    $lng = mysqli_real_escape_string($conn,$_POST['lng']); 
	$city = mysqli_real_escape_string($conn,$_POST['city']); 
    $state = mysqli_real_escape_string($conn,$_POST['state']); 
	$pin = mysqli_real_escape_string($conn,$_POST['pin']);
	
	$phn=$_SESSION["user"];
	$result ="UPDATE postman_details set address='$adr',latitude='$lat',longitude='$lng',city='$city',state='$state',pincode='$pin' where phone_number='$phn';";
	echo $result;
	$res = $conn->query($result);
	//if ($conn->query($result) === TRUE)
if ($res)		{
    //echo "New record created successfully";
	header("Location: 2.php");

}
else{
	header("Location:3.php");
}

	//UPDATE Customers SET ContactName='Alfred Schmidt', City='Frankfurt' WHERE CustomerID=1;
	?>