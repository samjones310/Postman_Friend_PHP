<?php   
session_start(); //to ensure you are using same session
$_SESSION["authenticated"] = 'false';
session_destroy(); //destroy the session
header("location: main.html"); //to redirect back to "index.php" after logging out
exit();
?>