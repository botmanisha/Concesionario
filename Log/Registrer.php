<?php
session_start();
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de Cuenta</title>
    <link rel="stylesheet" href="../Estilos.css">
</head>
<body>
    <header><h1>CONCESIONARIO</h1></header>
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
    </nav>
    <div class="main-content">
        <div class="form-container">
            <h3>Crear Cuenta</h3>
            <?php
            $conn = mysqli_connect("localhost", "root", "rootroot", "concesionario");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['username'];
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $dni = $_POST['dni'];
                $saldo = $_POST['saldo'];
                $tipo = $_POST['tipo_usuario'];

                $query = "INSERT INTO usuarios (username, Email, Password, nombre, apellidos, dni, saldo, tipo_usuario) 
                          VALUES ('$name', '$email', '$pass', '$nombre', '$apellidos', '$dni', '$saldo', '$tipo')";

                if (mysqli_query($conn, $query)) {
                    echo "<div><h3>La cuenta ha sido creada.</h3>
                    <a href='./CheckLogin.php'>Login</a></div>";        
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
            }
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Concesionario. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
