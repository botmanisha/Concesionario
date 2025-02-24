<?php
session_start();
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos.css">
    <title>MODIFICACIÓN DE COCHES</title>
</head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> MODIFCACIÓN DE COCHES </h2>
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
		    <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
			echo "<li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a>	</li>
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
<?php
$servername='localhost';
$username='root';
$password = 'rootroot';
$dbname='concesionario';
$id = $_REQUEST['id_coche'];
$conn= mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die('Conexión fallida: ' . mysqli_connect_error());
}

//Recuperar datos del formulario
$id= $_REQUEST['id_coche'];
$modelo= $_REQUEST['modelo'];
$marca= $_REQUEST['marca'];
$color= $_REQUEST['color'];
$precio= $_REQUEST['precio'];
$alquilado= $_REQUEST['alquilado'];

$sql = "UPDATE coches SET modelo='$modelo', marca='$marca',color='$color',precio='$precio', alquilado='$alquilado'
WHERE id_coche='$id'";
if(mysqli_query($conn,$sql)){
	echo'<h5>Coche modificado con éxito.</h5>';
    echo "<br><a href='./CF_Modificar.php'> Volver al listado de coches. </a></div>";
	mysqli_close($conn);
}else {
	echo 'Error al modificar: ' . mysqli_error($conn);
}

?>
	</body>
	</html>