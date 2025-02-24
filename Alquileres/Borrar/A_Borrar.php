<?php
session_start();
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>LISTADO DE ALQUILERES</title>
        <link rel="stylesheet" href="../../Estilos.css">
    </head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> ALQUILERES</h2>
    <nav class="nav">
        <ul>
            <li> <a href='../../Index.php'> Inicio </a> </li>
        <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
				echo " <li> <a href='../../Coches/Coches.php'> Coches </a> </li>
		<li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a></li>
		<li> <a href='../Alquileres.php'> Alquileres </a>";  } ?>
             <ul>	
			 <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
				echo "<li> <a href='../Listar/A_Listar.php'> Listar </a>  </li>";  } ?>
             <?php if ( $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
				echo "<li> <a href='../Borrar/F_Borrar.php'> Borrar </a>  </li>";  } ?>
			</ul>
		</li>
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
	$sql = "DELETE FROM alquileres where id_alquiler in($ids_to_delete)";
	if (mysqli_query($conn,$sql)){
		echo "<h1> Los alquileres se han eliminados correctamente </h1>";
	}else  {
		"<h1> Los alquileres NO se han eliminado: " . mysqli_error($conn) . "</h1>";
	}
} else {
	echo "<h1> No se han seleccionado alquileres </h1>";
}
mysqli_close($conn);
echo "<a href='./F_Borrar.php'> Volver al listado</a>";
?>
    </body>
    </html>