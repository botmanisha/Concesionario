<!doctype html>
<html lang="en">
  <head>
    <title>Create account on database</title>
   <meta charset="utf-8">
  </head>
<body>

<div class="container">

	<?php

	include 'conn.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
		
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	
	
	$query = "INSERT INTO users (Name, Email, Password) VALUES ('$name', '$email', '$pass')";

	if (mysqli_query($conn, $query)) {
		echo "<div><h3>La cuenta sido creada.</h3>
		<a href='login.html' >Login</a></div>";		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}		
	mysqli_close($conn);
	?>
</div>
Que pasa

  </body>
</html>