<?php 
session_start();
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
	  <style>
		  body {
			  font-family: Arial, sans-serif;
			  margin: 0;
			  padding: 0;
			  background-color: #f4f4f4;
			  color: #333;
		  }
		  header {
			  background-color: #412B6A;
			  color: white;
			  padding: 20px 0;
			  text-align: center;
			  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
		  }
		  header h1 {
			  margin: 0;
			  font-size: 2.5rem;
		  }
		  .nav {
			  display: flex;
			  justify-content: center;
			  background-color: #412B6A;
		  }
		  .nav ul {
			  list-style: none;
			  margin: 0;
			  padding: 0;
			  display: flex;
		  }
		  .nav li {
			  position: relative;
		  }
		  .nav li a {
			  text-decoration: none;
			  padding: 15px 20px;
			  color: white;
			  display: block;
			  transition: background-color 0.3s;
		  }
		  .nav li a:hover {
			  background-color: #C190CB;
		  }
		  .main-content {
			  padding: 20px;
			  text-align: center;
		  }
		  .form-container {
			  width: 100%;
			  max-width: 400px;
			  margin: 30px auto;
			  padding: 20px;
			  background-color: white;
			  border-radius: 8px;
			  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
		  }
		  .form-container label {
			  display: block;
			  font-size: 1rem;
			  margin: 10px 0 5px;
		  }
		  .form-container input {
			  width: 100%;
			  padding: 8px;
			  border: 2px solid #e5d5e7;
			  border-radius: 5px;
		  }
		  .form-container button {
			  background-color: #412B6A;
			  color: white;
			  border: none;
			  padding: 10px 15px;
			  font-size: 1rem;
			  cursor: pointer;
			  border-radius: 5px;
			  transition: background-color 0.3s;
			  margin-top: 10px;
		  }
		  .form-container button:hover {
			  background-color: #C190CB;
		  }
		  footer {
			  background-color: #412B6A;
			  color: white;
			  text-align: center;
			  padding: 10px 0;
			  margin-top: 20px;
		  }
	  </style>
  </head>
  <body>
	  <header><h1>CONCESIONARIO</h1></header>
	  <nav class="nav">
		<ul>
			<li> <a href='../Index.php'> Inicio </a> </li>
			<li> <a href='../Coches/Coches.php'> Coches </a>
                    <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
                    echo "<li> <a href='../Coches/Añadir/CF_Añadir.php'>     Añadir    </a>  </li>
                        <li> <a href='../Coches/Modificar/CF_Modificar.php'> Modificar </a>  </li>
                        <li> <a href='../Coches/Borrar/F_Borrar.php'>        Borrar    </a>  </li>";  } ?>
                        <li> <a href='../Coches/Listar/C_Listar.php'>        Listar    </a>  </li>
                        <li> <a href='../Coches/Buscar/CF_Buscar.php'>       Buscar    </a>  </li>
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