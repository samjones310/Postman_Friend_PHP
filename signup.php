<?php
session_start();
echo $_SESSION['unid']; // Session starts here.
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
    width: 250px;
    border: 0px;
    background: black;
    color: white;
    padding: 5px;
    border-radius: 2%;
    }
    a{
        color: white;
    }
    .box{
        border-left: 2px solid black;
        padding: 10px;
    }
	#contr,#contr1{
	font-weight:bold;
	}
    div{
        margin-bottom: 10px;
    }
    </style>
	<script type='text/javascript'>
	 function addFields(){
            // Number of inputs to create
            var number = document.getElementById("member").value;
            // Container <div> where dynamic content will be placed
            var contr = document.getElementById("contr");
			 var contr1 = document.getElementById("contr1");
            // Clear previous contents of the container
            while (contr.hasChildNodes()) {
                contr.removeChild(contr.lastChild);
            }
			 while (contr1.hasChildNodes()) {
                contr1.removeChild(contr1.lastChild);
            }
            for (i=0;i<number;i=i+1){
                // Append a node with a random text
				contr1.appendChild(document.createTextNode("Name" + (i+1) +": "));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.type = "text";
                input.name = "name"+ i;
                contr1.appendChild(input);
                contr.appendChild(document.createTextNode("ID " + (i+1) +": "));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.type = "number";
                input.name = "number"+ i;
                contr.appendChild(input);
                // Append a line break 
				contr.appendChild(document.createElement("br"));
				contr.appendChild(document.createElement("br"));
				contr1.appendChild(document.createElement("br"));
				contr1.appendChild(document.createElement("br"));
            }
        }
    </script>
    <title>Signup</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1><b>Signup</b></h1> <br>
		<form method="post" action='next.php' >
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <label for="user">Mobile no</label><br>
            <input type="number" class="input_field form-control" id='user' name="mobile"><br>
            <label for="user">Password</label><br>
            <input type="password" class="input_field form-control" id='user' name="pass">
            <b>must contain 6 characters.</b><br>
            <br><br>
            <label for="user">No.Of.Persons</label><br>
			<input type="number"  class="input_field form-control" id="member" name="noofper" value="">
             <a href="#" id="filldetails" onclick="addFields()">Fill Details</a>
			  <div id="contr" >
			  </div>
            <!--<input type="number" class="input_field form-control" id='user' name="username"><br>
			<label for="number">Aadhar Number of Person 2</label><br>
            <input type="number" class="input_field form-control" id='user' name="username"><br>
            <label for="number">Aadhar Number of Person 4</label><br>
            <input type="number" class="input_field form-control" id='user' name="username"><br>-->
        </div>
       <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <label for="user">Email</label><br>
            <input type="text" class="input_field form-control" id='user' name="email"><br>
            <label for="password">Confirm your password</label><br>
            <input type="text" class="input_field form-control" id='user' name="cpass"><br><br><br>
			<label for="user">Unique Id</label><br>
            <input type="text" readonly="readonly" class="input_field form-control" id='user' name="uid" value="<?php echo $_SESSION['unid']; ?>"><br>
			<div id="contr1">
			</div>
			<input type="submit" class="btnn" value="Next">
			
			<!-- <a href="next.html" id="btton"><button class="btnn"><h5><b>Next</b></h5></button></a>
            <label for="user">Aadhar Number of Person 1</label><br>
            <input type="number" class="input_field form-control" id='user' name="username"><br>
            <label for="user">Aadhar Number of Person 3</label><br>
            <input type="number" class="input_field form-control" id='user' name="username"><br>
            <label for="user">Aadhar Number of Person 5</label><br>
            <input type="number" class="input_field form-control" id='user' name="username"><br>
            <br><br><br>-->  
        </div>
		 </form>
		 <a href="main.html" class="btnn">Already Have an account</a>
        <div class="col-md-1 col-lg-1 col-sm-12 col-xs-12"></div>
        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
            <div class="box">
            <h3><b>Rules to register</b></h3>
            <p>A prefix appearing in loanwords from Greek, most often attached to verbs and verbal derivatives, with the meanings “at or to one side of, beside, side by side” ( parabola; paragraph; parallel; paralysis), “beyond, past, by” ( paradox; paragogue); by extension from these senses.a prefix appearing in loanwords from Greek, most often attached to verbs and verbal derivatives, with the meanings “at or to one side of, beside, side by side” ( parabola; paragraph; parallel; paralysis), “beyond, past, by” ( paradox; paragogue); by extension from these senses,a prefix appearing in loanwords from Greek, most often attached to verbs and verbal derivatives, with the meanings “at or to one side of, beside, side by side” ( parabola; paragraph; parallel; paralysis), “beyond, past, by” ( paradox; paragogue); by extension from these senses,</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>