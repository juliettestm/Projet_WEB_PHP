<?php	
	$servername ='localhost'; 
	$username ='root'; 
	$password ='root'; 
	$database ='projetweb';
	
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	
?>