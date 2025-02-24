<?php
session_start();
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORRAR COCHES</title>
    <link rel="stylesheet" href="../../Estilos.css">
</head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> COCHES</h2>
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
			echo "<li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a></li>
	    	<li> <a href='../../Alquileres.php'> Alquileres </a></li>";  } ?>
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
$conn= mysqli_connect("localhost","root","rootroot","concesionario");
if (!$conn){
	die ("Connection failed: " . mysqli_connect_error());
}
if (isset($_REQUEST['delete_id']) && is_array($_REQUEST['delete_id'])){
	$ids_to_delete = implode(',', array_map('intval', $_REQUEST['delete_id']));

	/*ids_to_delete = []
	forech ($_REQUEST['delete_id'] as $id){
		$ids_to_delete[] = intval($id);
	}
	$ids_to_delete_string = implode(",", $ids_to_delete);*/
	
	//Eliminar pisos seleccionados
	$sql = "DELETE FROM coches where id_coche in($ids_to_delete)";
	if (mysqli_query($conn,$sql)){
		echo "<h3> Coches Eliminados correctamente </h3>";
	}else  {
		"<h3> Los Coches NO se han eliminado: " . mysqli_error($conn) . "</h3>";
	}
} else {
	echo "<h1>SE DEBE SELECCIONAR ALGÚN COCHE DEL CONSECIONARIO </h1>";
}
mysqli_close($conn);
?>
</body>
</html>