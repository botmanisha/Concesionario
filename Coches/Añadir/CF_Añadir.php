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
    <title>AÑADIR COCHES</title>
    <link rel="stylesheet" href="../../Estilos.css">
</head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> COCHES</h2>
    <nav class="nav">
        <ul>
        <li> <a href='../../Index.php'> Inicio </a> </li>
            <li> <a href='../Coches.php'> Coches </a>
                <ul>	
                <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
				echo "<li> <a href='../Añadir/CF_Añadir.php'>     Añadir    </a>  </li>
				    <li> <a href='../Modificar/CF_Modificar.php'> Modificar </a>  </li>
				    <li> <a href='../Borrar/F_Borrar.php'>        Borrar    </a>  </li>";  } ?>
                    <li> <a href='../Listar/C_Listar.php'>        Listar    </a>  </li>
				    <li> <a href='../Buscar/CF_Buscar.php'>       Buscar    </a>  </li>
		    	</ul>
            </li>
		 <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
			echo "<li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a> </li>
		    <li> <a href='../../Alquileres/Alquileres.php'> Alquileres </a></li>";  } ?>

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
    <h3>Añadir un nuevo coche</h3>
    <form action="C_añadir.php" method="post" enctype="multipart/form-data">      
        <label for="modelo"> Modelo:</label>
        <input type="text" name="modelo" required> <br><br>
        
        <label for ="Marca"> Marca:</label>
        <input type ="text" name="marca" required> </input><br><br>

        <label for ="Color"> Color:</label>
        <input type ="text" name="color" required> </input><br><br>

        <label for= "Precio"> Precio:</label>
        <input type="text" name="precio" required> <br><br>

        <label for="Alquilado" > Alquilado:</label>
        <select name="alquilado" required> <br><br>
                <option value="1">Si</option>
                <option value="0" selected>No</option>
        </select>
        <label for="imagen">Selecciona una imagen:</label><br>
        <input type="file" name="imagen" accept="image/*"><br><br>
        <input type="submit" value="Enviar">
    </form>
</div>
</div>
    <footer>
        <p>Gracias por elegirnos. ¡Esperamos poder ayudarte pronto!</p>
    </footer>
</body>
</html>