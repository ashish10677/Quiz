<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=ashish", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully <br>"; 
		$uid = $_POST['unm'];
		$nm = $_POST['nm'];
		$pss = $_POST['pass'];
		$gen = $_POST['sx'];
		$em = $_POST['em'];
		$sql = "insert into users values('$nm','$uid','$pss','$gen','$em')";
		$conn->exec($sql);
		header('Location:http://localhost/html/Quiz/login.html');
	 }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>