<?php
$conn= mysqli_connect("localhost","root","rootroot","concesionario");
if (!$conn){
	die ("Connection failed: " . mysqli_connect_error());
}
$sql = "select * from alquileres";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0){
	echo "<h1>Listado de alquileres</h1>";
	echo "<form action='A_Borrar.php' method='post'>";
	echo "<table border='1'>";
	echo"<tr><th> Seleccionar </th><th> ID Alquiler </th><th> ID Usuario </th><th> ID Coche </th><th> Prestado </th><th> Devuelto </th></tr>";
	//Mostrar cada piso con checkbox
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td><input type='checkbox' name=delete_id[] value=' " . $row['id_alquiler'] . "'> </td>";
		echo "<td>" . htmlspecialchars($row['id_alquiler']) . "</td>";
		echo "<td>" . htmlspecialchars($row['id_usuario']) . "</td>";
		echo "<td>" . htmlspecialchars($row['id_coche']) . "</td>";
		echo "<td>" . htmlspecialchars($row['prestado']) . "</td>";
		echo "<td>" . htmlspecialchars($row['devuelto']) . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</br>";
	echo "<button type='submit'> Eliminar Seleccionados </button>";
	echo "</form>";	
} else {
	echo "<h1> No hay alquileres disponibles. </h1>";
} 
//Cerrar conexion
mysqli_close($conn);
?>