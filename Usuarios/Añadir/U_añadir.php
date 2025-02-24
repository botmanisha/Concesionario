<?php
session_start();
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERCIÓN DE USUARIOS</title>
    <link rel="stylesheet" href="../../Estilos.css">
</head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> INSERCIÓN DE USUARIOS</h2>
    <nav class="nav">
        <ul>
            <li> <a href='../../Index.php'> Inicio </a> </li>
            <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
			echo " <li> <a href='../../Coches/Coches.php'> Coches </a> </li>";  } ?>
		    <li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a>	
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
			echo " <li> <a href='../../Alquileres/Alquileres.php'> Alquileres </a></li>";  } ?>
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
    //CONFIG DE LA BD 
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";

    // Crear conexión
    $conn =mysqli_connect ($servername, $username, $password, $dbname);
    
    // Comprobar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    
    }
    //INSERTAR DATOS EN LA BD
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $pass = $_REQUEST['password'];
    $dni = $_REQUEST['dni'];
    $saldo = $_REQUEST['saldo'];
    $user = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $tipous = $_REQUEST['tipo_usuario'];
    
    // Preparar la sentencia SQL
    $sql = "INSERT INTO usuarios (nombre, apellidos, password, dni, saldo,username,email,tipo_usuario)
    VALUES ('$nombre', '$apellidos', '$pass', '$dni', '$saldo', '$user', '$email', '$tipous')";

    // Ejecutar la sentencia SQL
    if (mysqli_query($conn, $sql)) {
        echo "<h5>Datos insertados correctamente</h5>";
    }
    else {
        echo "Error al insertar datos: " . mysqli_error($conn);
    }

    //cerrar conexion
    mysqli_close( $conn );
?>
    </body>
    </html>