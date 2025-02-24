<?php
session_start();

$conn= mysqli_connect("localhost","root","rootroot","concesionario");

if (!$conn){
	die ("Connection failed: " . mysqli_connect_error());
}
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <link rel="stylesheet" href="../Estilos.css">
    <title>COCHES</title>
    </head>
    <header><h1>CONCESIONARIO</h1></header>
    <h2> COCHES </h2>
        <?php // if(isset($_SESSION["loggedin"])){echo '<h2>COCHES '. $_SESSION['username'] .' </h2> ';}?> 
    <nav class="nav">
        <ul>
            <li> <a href='../Index.php'> Inicio </a> </li>
            <li> <a href='Coches.php'> Coches </a>
               <ul>	
                <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
				echo "<li> <a href='./Añadir/CF_Añadir.php'>     Añadir    </a>  </li>
				    <li> <a href='./Modificar/CF_Modificar.php'> Modificar </a>  </li>
				    <li> <a href='./Borrar/F_Borrar.php'>        Borrar    </a>  </li>";  } ?>
                    <li> <a href='./Listar/C_Listar.php'>        Listar    </a>  </li>
				    <li> <a href='./Buscar/CF_Buscar.php'>       Buscar    </a>  </li>
		    	</ul>
            </li>
		 <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'|| $tipo == 'Comprador'){ 
				echo "<li> <a href='../Usuarios/Usuarios.php'> Usuarios </a> 		</li>
		<li> <a href='../Alquileres/Alquileres.php'> Alquileres </a></li>"; } ?>
        <li> <a href="../Log/F_Registrer.php"><img  class="loginn" src="../Imagenes/login.png"></a>
			<ul>	
				<li> <a href='../Log/CheckLogin.php'> Log In </a>  </li>
				<li> <a href='../Log/F_Registrer.php'> Registrarse </a>  </li>
			</ul>
		</li>
		<li>  <a href='../Log/Logout.php'> <img  class="loginn" src="../Imagenes/logout.png"></a>
            <ul>
                <li> <a href='./Log/Logout.php'> Cerrar Sesión </a>  </li>
            </ul>
	</ul></nav><br>


    </body>
</html>