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

		$stuName=$_POST["stuName"];
		$newMajor=$_POST["newMajor"];
		//Create query
		$sqlStu="UPDATE Students SET major='$newMajor' WHERE stuName='$stuName' ;" ;
		//Execute query
		$result = $conn->query($sqlStu) or die('Could not run query: '.$conn->error);
		echo "Record inserted";
		header("Location:editStus1.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
