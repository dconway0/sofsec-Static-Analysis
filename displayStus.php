<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Display Student</title>
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
		$stuPass=$_POST["pass"];
		//Create query
		
		$sqlStu="SELECT stuName, major, credits, SSN, city FROM Students WHERE stuName= '$stuName' and pass= '$stuPass' ;" ;
		//Execute query
		$result = $conn->query($sqlStu) or die('Could not run query: '.$conn->error);
		
		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h3> Student </h3>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Student Name </th>
					<th> Major </th>
					<th> Credits </th>
					<th> SSN </th>
					<th> City </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["stuName"]. "</td>
					<td>". $row["major"]. "</td>
					<td>". $row["credits"]. "</td>
					<td>". $row["SSN"]. "</td>
					<td>". $row["city"]. "</td>
				</tr>";
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
	</body>
</html>
