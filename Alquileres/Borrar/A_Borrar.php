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