<?php
 session_start();
 if (isset($_POST['state'])) {
 if (!empty($_SESSION['post'])){
 if (empty($_POST['lat'])
 || empty($_POST['lng'])
 || empty($_POST['adr'])
 || empty($_POST['city'])
 ||empty($_POST['state'])
 || empty($_POST['pin'])){ 
 // Setting error for page 3.
 $_SESSION['error_page2'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: next.php"); // Redirecting to third page.
 } else {
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 echo $value;
 
 } 
 extract($_SESSION['post']); // Function to extract array.
 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "details";

    // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 for($i=0;$i<$noofper;$i++)
 {
$name=${"name".$i};
$number=${"number".$i};
echo $name0;
 $sql1= "insert into postman_details (PHONE_NUMBER,AADHAR_NUMBER,NAME,EMAIL,LATITUDE,LONGITUDE,ADDRESS,CITY,STATE,PINCODE,UNIQUEID) values($mobile,'$number','$name','$email','$lat','$lng','$adr','$city','$state','$pin','$uid');";
 if ($conn->query($sql1) === TRUE) {
    echo "New record ";
   //header("Location: signup.php");
} else {
	echo "error";
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
 }
 $sql1= "insert into password (MOBILE_NUMBER,PASSWORD) values($mobile,'$pass');";
 if ($conn->query($sql1) === TRUE) {
    echo "New record ";
  // header("Location: signup.php");
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
 if ($dbname) {
 echo '<p><span id="success">Form Submitted successfully..!!</span></p>';
 header("Location: main.html");
 /*echo $pin;
 echo $mobile;
 echo $pass;
 echo $email;
 echo $city;*/
 } else {
 echo '<p><span>Form Submission Failed..!!</span></p>';
 echo $pin;
 } 
 unset($_SESSION['post']); // Destroying session.
 }
 } else {
 header("location: next.php"); // Redirecting to first page.
 }
 } else {
 header("location: next.php"); // Redirecting to first page.
 }
 
$conn->close();
 ?>