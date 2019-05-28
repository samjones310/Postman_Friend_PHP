<?php
session_start();
if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    header('Location: MAIN.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <style>
        body{
            background: #E9D460;
        }    
        .qrcode{
            width:350px;
            height:350px;
			left:20px;;
            position:absolute;
            top:20px;
        }
        .mem{
            position:absolute;
            top: 0px;
            left:250px;
        }
        .mini{
            background: white;
			left:250px;
            width:350px;
            height:350px;
        }
        .b1{
            position:absolute;
            top:300px;
    }
        .b2{
            position:absolute;
            top:340px; 
        }
        .b3{
            position:absolute;
            top:380px;
        }
		#Layer1 {
	position:absolute;
	width:200px;
	height:10px;
	z-index:1;
	left: 69px;
	top: 22px;
           }
    </style>
</head>
<body>
<div id=Layer1>
   
	</div>
	 <div class="container">
        <br><br><br><br>
        <div class="row">
            <div class="col-md-2 col-lg-8">
			 <b>LOGIN SUCCESSFUL</b></div>
            <div class="col-md-4 col-lg-1 box">
                <br>
	<a class="btn btn-danger" href="logout.php">Log Out</a><br>
	</DIV>
	</div>
	</div>
    <div class="container">
        <br><br><br><br>
        <div class="row">
            <div class="col-md-2 col-lg-2"></div>
            <div class="col-md-4 col-lg-4 box">
                <br>
                <div class="qrcode">
				<b>The QRcode for your location:</b>
				<head>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="qrcode.js"></script>
</head>
<body>
<input id="text" type="hidden" value="<?php echo $_SESSION['lat']; ?>"  >
<div id="qrcode" style="width:100px; height:100px; margin-top:25px;"></div>
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 200,
	height : 200
});

function makeCode () {		
	var elText = document.getElementById("text");
	
	if (!elText.value) {
		alert("Input a text");
		elText.focus();
		return;
	}
	
	qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});
</script>
</body>
                <div class="mem" id="mem">
                    <h4><b>Members:</b></h4>
                    <div class="mini" id="mini">
					 <?php
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
	$user= $_SESSION["user"];
	$res1 = $conn->query("SELECT  NAME FROM POSTMAN_DETAILS where phone_number= $user ;");
			if ($res1) {
			// output data of each row
			while($row = $res1->fetch_assoc())
			{
				echo "    ";
				echo "<strong>".$row['NAME']."</strong><br>";
			   
			}
			
			}
	?>
					</div>
                </div>
				 </div>
				 <a class="btn btn-primary b1" href="#">Share</a><br>
                <!--<button class="btn btn-primary b1" type="submit">Share</button><br>-->
				 <a class="btn btn-success b2" href="1b.php">Update</a><br>
                <!--<button class="btn btn-success b2">Update</button><br>-->
				 <a class="btn btn-danger b3" href="add.php">Add or Remove</a><br>
				 
				 
				 
                <!--<button class="btn btn-danger b3">Add or Remove</button>-->
           
        </div>
    </div>
</body>
</html>