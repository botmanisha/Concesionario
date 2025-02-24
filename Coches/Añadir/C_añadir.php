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
<?PHP
    //CONFIG DE LA BD 
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
    
    //INSERTAR DATOS EN LA BD
    $modelo = $_REQUEST['modelo'];
    $marca = $_REQUEST['marca'];
    $color = $_REQUEST['color'];
    $precio = $_REQUEST['precio'];
    $alquilado = $_REQUEST['alquilado'];
   

    $target_dir = "./Fotos/";
    $file = $_FILES['imagen'];  
    $target_file = $target_dir . basename($file["name"]);
    $foto =  basename($file["name"]);
   
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        echo "La imagen ". htmlspecialchars($foto) . " se ha subido correctamente.<br>";
      
    } else {
        die ("Hubo un error al subir el archivo.");
    }
    // Preparar la sentencia SQL
    $sql = "INSERT INTO coches(modelo, marca, color, precio, alquilado, foto)
    VALUES ('$modelo', '$marca', '$color', '$precio', '$alquilado','$foto')";
    // Ejecutar la sentencia SQL
    if (mysqli_query($conn, $sql)) {
        echo "Datos insertados correctamente";
    }
    else {
        echo "Error al insertar datos: " . mysqli_error($conn);
    }
    echo "<br><a href='../Listar/C_Listar.php'> Volver a Listar </a>";
    //cerrar conexion
    mysqli_close( $conn );
?>
    </body>
    </html>