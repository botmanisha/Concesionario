<?php
session_start();

$conn= mysqli_connect("localhost","root","rootroot","concesionario");

if (!$conn){
	die ("Connection failed: " . mysqli_connect_error());
}
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AÑADIR USUARIOS</title>
    <link rel="stylesheet" href="../../Estilos.css">
</head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> AÑADIR UN USUARIO</h2>
    <nav class="nav">
        <ul>
            <li> <a href='../../Index.php'> Inicio </a> </li>
            <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
			echo " <li> <a href='../../Coches/Coches.php'> Coches </a></li>
		    <li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a>	";  } ?>
            <ul>	
                <?php if ($tipo == 'Admin'){ 
				echo "<li> <a href='../Añadir/UF_Añadir.php'>   Añadir </a>  </li>
                    <li> <a href='../Borrar/F_Borrar.php'>     Borrar </a>  </li>";  } ?>
				<?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
				echo "<li> <a href='../Listar/U_Listar.php'>    Listar </a>  </li>
				    <li> <a href='../Buscar/UF_Buscar.php'>     Buscar </a>  </li>";  } ?>
                <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
				echo "<li> <a href='../Modificar/UF_Modificar.php'> Modificar </a>  </li>";  } ?>
			    </ul>		
	    	</li>
		     <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
			echo "<li> <a href='../../Alquileres/Alquileres.php'> Alquileres </a> </li>";  } ?>
            <li>  <a href="../../Log/F_Registrer.php"><img  class="loginn" src="../../Imagenes/login.png"></a>
			<ul>	
				<li> <a href='../../Log/CheckLogin.php'> Log In </a>  </li>
				<li> <a href='../../Log/F_Registrer.php'> Registrarse </a>  </li>
			</ul>
		    </li>
            <li> <a href='../../Log/Logout.php'> <img  class="loginn" src="../../Imagenes/logout.png"></a>
                <ul>
                    <li> <a href='../../Log/Logout.php'> Cerrar Sesión </a>  </li>
                </ul>
            </li>
	    </ul>
    </nav><br>
    <div class="main-content">
        <div class="form-container">
            <h3>Añadir un usuario</h3>

    <form action="U_añadir.php" method="post">
       
        <label for="Nombre"> Nombre:</label>
        <input type="text" name="nombre" required> <br><br>
        
        <label for ="Apellidos"> Apellidos:</label>
        <input type ="text" name="apellidos" required> </input><br><br>

        <label for ="Password"> Contraseña:</label>
        <input type ="password" name="password" required> </input><br><br>

        <label for= "dni"> DNI:</label>
        <input type="text" name="dni" required> <br><br>

        <label for="saldo" > Saldo:</label>
        <input type="text" name="saldo" required> <br><br>

        <label for="username" > Username:</label>
        <input type="text" name="username" required> <br><br>

        <label for="email" > Email:</label>
        <input type="text" name="email" required> <br><br>  
     
        <label for="tipo_usuario" > Tipo Usuario:</label>
        <select name="tipo_usuario" required> <br><br>
                <option value="Comprador">Comprador</option>
                <option value="Vendedor" >Vendedor</option>
                <option value="Admin" >Administrador</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
    </div></div>
</body>
</html>