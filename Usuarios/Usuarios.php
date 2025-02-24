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
        <title> USUARIOS</title>
        <link rel="stylesheet" href="../Estilos.css">
    </head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> USUARIOS </h2>
    <nav class="nav">
        <ul>
        <li> <a href='../Index.php'> Inicio </a> </li>
        <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
        echo " <li> <a href='../Coches/Coches.php'> Coches </a> </li>
		<li> <a href='Usuarios.php'> Usuarios </a> ";  } ?>
            <ul>	
                <?php if ($tipo == 'Admin'){ 
				echo "<li> <a href='./Añadir/UF_Añadir.php'>   Añadir </a>  </li>
                    <li> <a href='./Borrar/F_Borrar.php'>      Borrar </a>  </li>";  } ?>
				<?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
				echo "<li> <a href='./Listar/U_Listar.php'>    Listar </a>  </li>
				    <li> <a href='./Buscar/UF_Buscar.php'>     Buscar </a>  </li>";  } ?>
                <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
				echo "<li> <a href='./Modificar/UF_Modificar.php'> Modificar </a>  </li>";  } ?>
			</ul>			 		
		</li>
        <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
        echo "<li> <a href='../Alquileres/Alquileres.php'> Alquileres </a></li>";  } ?>
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
	</ul><br></nav>
    </body>
</html>