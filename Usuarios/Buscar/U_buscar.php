<?php
session_start();
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BÚSQUEDA DE ALQUILERES</title>
    <link rel="stylesheet" href="../../Estilos.css">
</head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> BÚSQUEDA ALQUILERES</h2>
    <nav class="nav">
    <ul>
        <li> <a href='../../Index.php'> Inicio </a> </li>
        <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
		echo "<li> <a href='../../Coches/Coches.php'> Coches </a> </li>
		<li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a>	";  } ?>
            <ul>	
                <?php if ($tipo == 'Admin'){ 
				echo "<li> <a href='../Añadir/UF_Añadir.php'>   Añadir </a>  </li>
                    <li> <a href='../Borrar/F_Borrar.php'>      Borrar </a>  </li>";  } ?>
				<?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
				echo "<li> <a href='../Listar/U_Listar.php'>    Listar </a>  </li>
				    <li> <a href='../Buscar/UF_Buscar.php'>     Buscar </a>  </li>";  } ?>
                <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
				echo "<li> <a href='../Modificar/UF_Modificar.php'> Modificar </a>  </li>";  } ?>
			</ul>		
        </li>
	    <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
		    echo "	<li> <a href='../Alquileres.php'> Alquileres </a></li>";  } ?>
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
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprobar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $busqueda = $_POST['buscador'];
        if ($tipo == 'Admin' ){
            $sql = "SELECT * FROM usuarios WHERE nombre LIKE '%$busqueda%' OR apellidos LIKE '%$busqueda%' OR dni LIKE '%$busqueda%' OR saldo LIKE '%$busqueda%' OR username LIKE '%$busqueda%'";
            $resultado = mysqli_query($conn, $sql)
               or die ("Fallo en la consulta");}
         elseif ($tipo == 'Vendedor'){
            $sql = "SELECT * FROM usuarios WHERE (nombre LIKE '%$busqueda%' OR apellidos LIKE '%$busqueda%' OR dni LIKE '%$busqueda%' OR saldo LIKE '%$busqueda%' OR username LIKE '%$busqueda%') and (tipo_usuario = 'Comprador')";
            $resultado = mysqli_query($conn, $sql)
                or die ("Fallo en la consulta");}

        // Mostrar resultados en forma de tabla
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Nombre</th><th>Apellidos</th><th>DNI</th><th>Saldo</th></tr>";
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['nombre'] . "</td>";
                echo "<td>" . $fila['apellidos'] . "</td>";
                echo "<td>" . $fila['dni'] . "</td>";
                echo "<td>" . $fila['saldo'] . "</td>";
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
    </html >