<?php
session_start();
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELIMINACIÓN DE USUARIOS</title>
    <link rel="stylesheet" href="../../Estilos.css">
</head>

    <body>
    <header><h1>CONCESIONARIO</h1></header>
    <h2> ELIMINACIÓN DE USUARIOS</h2>
    <nav class="nav">
        <ul>
            <li> <a href='../../Index.php'> Inicio </a> </li>
            <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
			echo "	<li> <a href='../../Coches/Coches.php'> Coches </a></li>
		    <li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a>";  } ?>
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
			echo "	<li> <a href='../../Alquileres/Alquileres.php'> Alquileres </a></li>";  } ?>
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
</style>
<?php
$conn= mysqli_connect("localhost","root","rootroot","concesionario");
if (!$conn){
	die ("Connection failed: " . mysqli_connect_error());
}
$sql = "select * from Usuarios";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0){
	echo " <div class='main-content'> <h3>Listado de usuarios</h3>";
	echo "<form action='U_Borrar.php' method='post'>";
	echo "<table border='1'>";
	echo"<tr><th> Seleccionar </th><th> ID Usuario </th><th> Password </th><th> Nombre </th><th> Apellidos </th><th> DNI </th><th> Saldo </th></tr>";
	//Mostrar cada piso con checkbox
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td><input type='checkbox' name=delete_id[] value=' " . $row['id_usuario'] . "'> </td>";
		echo "<td>" . htmlspecialchars($row['id_usuario']) . "</td>";
		$hashed_password = password_hash($row['password'], PASSWORD_DEFAULT);
		echo "<td>" . htmlspecialchars($hashed_password) . "</td>";
		echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
		echo "<td>" . htmlspecialchars($row['apellidos']) . "</td>";
		echo "<td>" . htmlspecialchars($row['dni']) . "</td>";
		echo "<td>" . htmlspecialchars($row['saldo']) . "</td>";		
		echo "</tr>";
	}
	echo "</table>";
	echo "</br>";
	echo "<button type='submit' align='center'> Eliminar Seleccionados </button>";
	echo "</form>";	
} else {
	echo "<h1> No hay usuarios disponibles. </h1></div>";
} 
//Cerrar conexion
mysqli_close($conn);
?>
</body>
</html>