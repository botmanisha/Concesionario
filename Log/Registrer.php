<!doctype html>
<html lang="en">
  <head>
    <title>Create account on database</title>
   <meta charset="utf-8">
  </head>
<body>

<div class="container">

	<?php
	$conn= mysqli_connect("localhost","root","rootroot","concesionario");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$name = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$dni = $_POST['dni'];
	$saldo = $_POST['saldo'];
	$tipo = $_POST['tipo'];
	
	$query = "INSERT INTO usuarios (username, Email, Password,nombre,apellidos,dni,saldo,tipo_usuario) VALUES ('$name', '$email', '$pass','$nombre', '$apellidos', '$dni','$saldo', '$tipo')";

	if (mysqli_query($conn, $query)) {
		echo "<div><h3>La cuenta sido creada.</h3>
		<a href='./Check-Login.html'>Login</a></div>";		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}		
	mysqli_close($conn);
	?>
</div>
Que pasa

  </body>
</html>