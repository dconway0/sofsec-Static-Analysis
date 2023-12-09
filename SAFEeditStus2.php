<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Student</title>
		<link rel="stylesheet" href="sofStyle.css">
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
		$sqlStuPrepared="UPDATE Students SET major= ? WHERE stuName= ? " ;
		$stmt = $conn->prepare($sqlStuPrepared);
		$stmt->bind_param("ss", $cleanMajor, $stuName);
		$stmt->execute();
		//Execute query
		$result = $stmt->get_result();
		echo "Record inserted";
		header("Location:SAFEeditStus1.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
