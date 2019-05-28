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
    /*$user=$_POST['user'];
	$pass=$_POST['pass'];
	echo $user;
	echo $pass;*/
    $user = mysqli_real_escape_string($conn,$_POST['user']); 
    $pass = mysqli_real_escape_string($conn,$_POST['pass']); 
/*echo $user;
echo $pass;	*/
	$_SESSION['phn']=$user;
    $result ="SELECT * FROM password WHERE mobile_number='$user' AND password='$pass';";
	$sql =   "SELECT  * FROM postman_details WHERE phone_number='$user';";
	$res = $conn->query($sql);
	$res1 = $conn->query($result);
	  echo "login successfull";  
    if ($res1->num_rows > 0) {
	//header("Location: .php");
    if ($res->num_rows > 0) {
    // output data of each row
    while($row = $res->fetch_assoc())
	$t7="https://www.google.co.in/maps/@".$row["LONGITUDE"].",".$row["LATITUDE"]."18z"; 
     echo $t7;
	   //$T5=$t1.','.$t2;
  $_SESSION['lat']=$t7;
}
	}
 else {
    /*echo "0 results";*/
	header("Location: main.html");
}
 
  
	 /*$res = $conn->query("SELECT NAME FROM QR_DETA WHERE username ='$newUsername' AND password='$newPassword';");
      $_SESSION['username'] =$_POST['username'] ;
	  $_SESSION['disp'] = $res ;
	  echo $res ;
	  echo "login successfull";  */

    if ($res1->num_rows >0) {
	   $_SESSION["user"] =$user;
	   /*$_SESSION['disp'] = $res ;
        echo "SELECT * FROM passname WHERE username='$newUsername' AND password='$newPassword'";
        echo "login successfull";  */
	$_SESSION["authenticated"] = 'true';
	header("Location: 2.php");
    } 
    else
    {   

        /*echo "login unsuccessfull, please try again";*/ 
            header("Location index.php");	
    }
	?>