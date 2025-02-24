<?php 
session_start();
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
				<li> <a href='./CheckLogin.php'> Log In </a>  </li>
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
		<h3>Crear una cuenta</h3>
		  <div class="form-container">
		
		<form method="post" action="Registrer.php" method="POST">	
			<label for="nombre" > Nombre:</label><br>
			<input type="text" name="nombre" placeholder="Introduce tu Nombre" required>		<br><br>		
			<label for="apellidos" > Apellidos:</label><br>
			<input type ="text" name="apellidos"  placeholder="Introduce tus Apellido">			<br><br>
			<label for="email" > Email:</label><br>
			<input type="email"  name="email"  placeholder="Introduce tu Email" required>		<br><br>
			<label for="username" > Username:</label><br>
			<input type="text"  name="username" placeholder="Introduce un Username" required>	<br><br>	
			<label for="password" > Password:</label><br>
			<input type="password"  name="password" placeholder="Introduce Password" required>  <br><br>
			<label for="dni" > DNI:</label><br>
			<input type="text" name="dni"  placeholder="Introduce DNI" required> 	            <br><br>
			<label for="Saldo" > Saldo (opcional)</label><br>
			<input type="text" name="saldo"  placeholder="Introduce Tu Saldo" >        			<br><br>
			<label for="tipo" > Tipo de usuario:</label><br>
			<select name="tipo" required> <br><br>
					<option value="comprador"> Comprador </option>
					<option value="vendedor" > Vendedor  </option>
			</select>																			<br><br>
  		    <button type="submit">Crear una cuenta</button>
		</form>		
		
			<h3>Log in</h3><hr />
			<p>¿Tienes ya una cuenta? <a href="CheckLogin.php" title="Login Here">Login Aquí!</a></p>
	</div></div>
	</body>
</html>