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
    <title>ELIMINACIÓN DE USUARIOS</title>
</head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> ELIMINACIÓN DE USUARIOS</h2>
    <nav class="nav">
        <ul>
        <li> <a href='../../Index.php'> Inicio </a> </li>
        <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
		echo "<li> <a href='../../Coches/Coches.php'> Coches </a></li>
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
		echo "<li> <a href='../Alquileres.php'> Alquileres </a></li>";  } ?>
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
	$sql = "DELETE FROM usuarios where id_usuario in($ids_to_delete)";
	if (mysqli_query($conn,$sql)){
		echo "<h1> Usuarios Eliminados correctamente </h1>";
	}else  {
		"<h1> Los Usuarios NO se han eliminado: " . mysqli_error($conn) . "</h1>";
	}
} else {
	echo "<h1>SE DEBEN SELECCIONAR ALGÚN USUARIO </h1>";
}
mysqli_close($conn);
echo "<a href='./F_Borrar.php'> Volver al listado</a>";
?>
	</body>
	</html>