<?php
$hostName = "localhost";
			$userName = "root";
			$password = "";
			$databaseName = "rgxszumy_worshipcenter";
			 $conn = new mysqli($hostName, $userName, $password, $databaseName);
			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}
			   // GET CONNECTION ERRORS
			   if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

            ?>