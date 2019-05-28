<?php
session_start();
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['pass'])){
 if (empty($_POST['mobile'])
 || empty($_POST['pass'])
 || empty($_POST['noofper'])
 || empty($_POST['email'])
 || empty($_POST['cpass'])
 || empty($_POST['cpass'])){ 
 // Setting error message
 $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: signup.php"); // Redirecting to first page 
 } else {
 // Sanitizing email field to remove unwanted characters.
 $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
 // After sanitization Validation is performed.
 if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
 // Validating Contact Field using regex.
 if (!preg_match("/^[0-9]{10}$/", $_POST['mobile'])){ 
 $_SESSION['error'] = "10 digit contact number is required.";
 header("location: signup.php");
 } else {
 if (($_POST['pass']) === ($_POST['cpass'])) {
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 //echo $te;
 //echo $value;
 ?>
<script>
console.log("<?php echo $value; ?>");
</script>
<?php
 }
 /*for($i=0;$i<$_POST['noofper'];$i++)
	{
		$te2=$_POST[100+$i];
		$_SESSION['post'][$_POST[100+$i]]=$te2;
		echo  $_SESSION['post'][$_POST[100+$i]];
		
		}?*/

 } else {
 $_SESSION['error'] = "Password does not match with Confirm Password.";
 header("location: signup.php"); //redirecting to first page
 }
 }
 } else {
 $_SESSION['error'] = "Invalid Email Address";
 header("location: signup.php");//redirecting to first page
 }
 }
} else {
 if (empty($_SESSION['error_page2'])) {
 header("location: signup.php");//redirecting to first page
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.js"></script>
    <style >
    body{
    background: #E9D460;
    }
    .btnn{
    width: 100%;
    border: 0px;
    background: black;
    color: white;
    padding: 5px;
    border-radius: 2%;
    }
    a{
        color: white;
    }
    div{
        margin-bottom: 10px;
    }
    .map{
        width: 100%;
        height: 350px;
        background: white;
    }
    </style>
    <title>Signup</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1><b>Signup</b></h1> <br>
        <div class="col-md-7 col-lg-7 col-sm-12 sol-xs-12">
            <h4><b>Choose your location</b></h4>
            <br><br>
            <div class="map">
               <head>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC9XaK-ZI3PmyNgCGBBgsnyAoeXZayqmk.exp&sensor=false"></script>
        <script>
		
            var map,
                mLat,
                mLng;
                
            function initialize() {
                var mapOptions = {
                    zoom: 12,
                    center: new google.maps.LatLng(11.397, 77.644),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById('map_canvas'),
                    mapOptions
                );
                // add a click event listener to
                // get the lat/lng from click event of map
                google.maps.event.addListener(map, 'click', function(event) {
                    mLat = event.latLng.lat();
                    mLng = event.latLng.lng();
                    document.getElementById('latMap').value = mLat;
                    document.getElementById('lngMap').value = mLng;
                });
            }
            function mapDivClicked (event) {
                var target = document.getElementById('map_canvas'),
                    posx = event.pageX - target.offsetLeft,
                    posy = event.pageY - target.offsetTop,
                    bounds = map.getBounds(),
                    neLatlng = bounds.getNorthEast(),
                    swLatlng = bounds.getSouthWest(),
                    startLat = neLatlng.lat(),
                    endLng = neLatlng.lng(),
                    endLat = swLatlng.lat(),
                    startLng = swLatlng.lng(),
                    lat = startLat + ((posy/350) * (endLat - startLat)),
                    lng = startLng + ((posx/500) * (endLng - startLng));

                document.getElementById('posX').value = posx;
                document.getElementById('posY').value = posy;
                document.getElementById('lat').value = lat; // calculated lat
                document.getElementById('lng').value = lng; // calculated lng

                // the error rate
                document.getElementById('latErr').value = ((mLat - lat) / (endLat - startLat) * 100).toFixed(2);
                document.getElementById('lngErr').value = ((mLng - lng) / (endLng - startLng) * 100).toFixed(2);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
		
    </head>
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC9XaK-ZI3PmyNgCGBBgsnyAoeXZayqmk&callback=initMap"
    async defer></script>
        <div id="map_canvas" onclick="mapDivClicked(event);" style="height: 450px; width: 650px;"></div>
        <div>
		 <input id="posX" type="hidden" />
       <input id="posY" type="hidden" />

        </div>  
            </div>
        </div>      
        <div class="col-md-1 col-lg-1"></div>
        <div class="col-md-4 col-lg-4 col-sm-12 sol-xs-12">
		<form method="post" action="val.php">
			<label for="lat">Latitude</label>
           <input type="text" name="lat" id="lat" class="form-control"><br>
		   <label for="lng">Longitude</label>
           <input type="text" name="lng" id="lng" class="form-control"><br>
            <label for="">Address</label>
            <textarea name="adr" id="" cols="30" rows="5" class="form-control"></textarea><br>
            <label for="">City</label>
            <input type="text" name="city" id="" class="form-control"><br>
            <label for="">State</label>
            <!--<input type="text" name="" id="" class="form-control"><br>-->
			<select name="state" class="form-control">
			<option value="Andhra Pradesh">Andhra Pradesh</option>
			<option value="Arunachal Pradesh">Arunachal Pradesh</option>
			<option value="Assam ">Assam </option>
			<option value="Bihar">Bihar </option>
			<option value="Chhattisgarh">Chhattisgarh</option>
			<option value="Goa">Goa</option>
			<option value="Gujarat">Gujarat</option>
			<option value="Haryana">Haryana</option>
			<option value="Himachal Pradesh">Himachal Pradesh</option>
			<option value="Jammu & Kashmir">Jammu & Kashmir</option>
			<option value="Jharkhand">Jharkhand</option>
			<option value="Karnataka ">Karnataka </option>
			<option value="Kerla">Kerla</option>
			<option value="Madhya Pradesh">Madhya Pradesh</option>
			<option value="Tamil Nadu">Tamil Nadu</option>
			<option value="Punjab">Punjab</option>
  </select><br>
            <label for="">Pincode</label>
            <input type="number" name="pin" id="" class="form-control"><br><br>
			<h2><input type="submit" class="btnn" value="Sign Up"></h2>
			</form>
            <!--<a href="#" id="btton"><button class="btnn"><h5><b>Signup</b></h5></button></a>-->
        </div>
    </div>
</div>
</body>
</html>