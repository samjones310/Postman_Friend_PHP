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

    $newpid = mysqli_real_escape_string($conn, $_POST['pid']); 
    $newown = mysqli_real_escape_string($conn, $_POST['own']); 
    $newdis = mysqli_real_escape_string($conn, $_POST['dis']); 
    $newpin = mysqli_real_escape_string($conn, $_POST['pin']); 	
	$res1= "SELECT * FROM  inver1 where propertyifd = '$newpid';";
    $res ="SELECT * FROM propertytax WHERE propertyid ='$newpid' AND owner='$newown' AND district='$newdis' AND pin='$newpin';";
	$result = $conn->query($res);
	$result1 = $conn->query($res1);
    if ($result->num_rows >=1) {
    // output data of each row
    while($row = $result1->fetch_assoc())
{
    $_SESSION['fav']=$row['userid'];
	  //$_SESSION["fav"] = $newpid;
	 //  $_SESSION['disp'] = $res ;
       // echo "SELECT * FROM passname WHERE username='$newUsername' AND password='$newPassword'";
       // echo "login successfull";  
	    header("Location: 3.php");
    } 
	}
    else
    {   

        echo "login unsuccessfull,please try again"; 
            header("Location 1.php");	
    }
	?>
