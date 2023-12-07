<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Student</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbName = "sofsecproj";

		$conn = new mysqli($servername, $username, $password, $dbName );
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$stuName = $_POST["stuName"];
		$newMajor = $_POST["newMajor"];
		
		//Create query
		$cleanMajor = filter_var($newMajor, FILTER_SANITIZE_STRING);
		$sqlStu="UPDATE Students SET major='$cleanMajor' WHERE stuName='$stuName' ;" ;
		//Execute query
		$result = $conn->query($sqlStu) or die('Could not run query: '.$conn->error);
		echo "Record inserted";
		header("Location:SAFEeditStus1.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
