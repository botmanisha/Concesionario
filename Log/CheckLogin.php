<?php
session_start();

$conn= mysqli_connect("localhost","root","rootroot","concesionario");

if (!$conn){
	die ("Connection failed: " . mysqli_connect_error());
}
$tipo = $_SESSION['tipo'];

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Create an account or Login</title>
        <meta charset="utf-8">
  </head>
  <!DOCTYPE html>
  <html lang="en">
  <head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Inicio de Sesión</title>
      <link rel="stylesheet" href="../Estilos.css">
  </head>
  <body>
	  <header><h1>CONCESIONARIO</h1></header>
	  <nav class="nav">
        <ul>
            <li> <a href='../Index.php'> Inicio </a> </li>
            <li>  <a href="./F_Registrer.php"><img  class="loginn" src="../Imagenes/login.png"></a>
			<ul>	
				
                <li> <a href='./F_Registrer.php'> Registrarse </a>  </li>
			</ul>
		    </li>
            <li> <a href='./Logout.php'> <img  class="loginn" src="../Imagenes/logout.png"></a>
                <ul>
                    <li> <a href='./Log/Logout.php'> Cerrar Sesión </a>  </li>
                </ul>
            </li>
	    </ul>
	  </nav>
    <div class="main-content">
    <h2>Log in</h2>
        <div class="form-container">
            <form action="Check-Login.php" method="post">                            
                <label for="username">Username:</label>
                <input type="text" name="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" required><br><br>
                <button type="submit">Log in</button>
            </form>
            <p>¿No tienes cuenta? <a href="F_Registrer.php" title="Create an account">Crear una cuenta</a>.</p>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Concesionario. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
