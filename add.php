
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add or Remove</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.js"></script>
    <style>
        body{
            background: #E9D460;
        } 
        input{
            width: 250px;
            background: ;
            border:0px;
            height: 40px;
            padding: 10px;
            border-radius: 2%;
        }
		select
		{
		width: 250px;
            background: ;
            border:0px;
            height: 40px;
            padding: 10px;
            border-radius: 2%;
		}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Add or Remove</h1>
        </div>
        <div class="row">
            <div class="col-md-3 col-lg-3"></div>
            <div class="col-md-9 col-lg-9">
                <h1>Add</h1><br>
				<form method="post" action="add2.php">
                <input type="text" name="name" id="" placeholder="Name"><br><br>
                <input type="text" name="number" id="" placeholder="Aadhar Id"><br><br>
                <input  class="btn btn-success" type="submit" value="Add"></form>
            </div>
        </div><br>
        <div class="row">
                <div class="col-md-3 col-lg-3"></div>
                <div class="col-md-9 col-lg-9">
                    <h1>Remove</h1><br>
					<form method="post" action="remove.php">
					<select name="name">
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
	$user=$_SESSION['user'];
	$res1 = $conn->query("SELECT * FROM POSTMAN_DETAILS WHERE phone_number='$user';");
			if ($res1) {
			// output data of each row
			while($row=$res1->fetch_assoc())
           {
                echo "<option value=".$row["aadhar_number"].">".$row["name"]."</option>";
           }
			}
		   ?>
		   <option value="sam">"Remove"</option>"
		   </select>
                    <br><br><input type="submit" class="btn btn-danger" value="Remove"></form>
                </div>
            </div>
    </div>
</body>
</html>