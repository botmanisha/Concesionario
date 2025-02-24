<?php
session_start();
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSCAR COCHES</title>
     <link rel="stylesheet" href="../../Estilos.css">
</head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> COCHES </h2>
    <nav class="nav">
        <ul>
            <li> <a href='../../Index.php'> Inicio </a> </li>
            <li> <a href='../../Coches/Coches.php'> Coches </a>
                <ul>	
                <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
				echo "<li> <a href='../Añadir/CF_Añadir.php'>     Añadir    </a>  </li>
				    <li> <a href='../Modificar/CF_Modificar.php'> Modificar </a>  </li>
				    <li> <a href='../Borrar/F_Borrar.php'>        Borrar    </a>  </li>";  } ?>
                    <li> <a href='../Listar/C_Listar.php'>        Listar    </a>  </li>
				    <li> <a href='../Buscar/CF_Buscar.php'>       Buscar    </a>  </li>
		    	</ul>
            </li>
            <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' || $tipo == 'Comprador' ){ 
			        echo " <li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a>	</li>
		            <li> <a href='../../Alquileres/Alquileres.php'> Alquileres </a> </li>";  } ?>
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
<?PHP
    // CONFIGURACIÓN DE LA BD
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";

    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Comprobar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $busqueda = $_POST['buscador'];

        // Preparar la consulta SQL
        $sql = "SELECT * FROM coches WHERE Modelo LIKE '%$busqueda%' OR Marca LIKE '%$busqueda%' OR color LIKE '%$busqueda%' OR precio LIKE '%$busqueda%' OR alquilado LIKE '%$busqueda%'";

        // Ejecutar la consulta
        $resultado = mysqli_query($conn, $sql);

        // Mostrar resultados en forma de tabla
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Modelo</th><th>Marca</th><th>Color</th><th>Precio</th><th>Alquilado</th><th>Foto</th></tr>";
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['id_coche'] . "</td>";
                echo "<td>" . $fila['modelo'] . "</td>";
                echo "<td>" . $fila['marca'] . "</td>";
                echo "<td>" . $fila['color'] . "</td>";
                echo "<td>" . $fila['precio'] . "</td>";
                echo "<td>" . $fila['alquilado'] . "</td>";
                echo "<td>" . $fila['foto'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }

    // Cerrar conexión
    mysqli_close($conn);
?>

</body>
</html>