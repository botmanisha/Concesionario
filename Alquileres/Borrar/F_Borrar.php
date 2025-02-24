<?php
session_start();
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>ELIMINACIÓN DE ALQUILERES</title>
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
$id_usuario = $_SESSION['iduser'];
if ($tipo == 'Comprador'){
	 $sql = "SELECT * FROM Alquileres WHERE id_usuario = '$id_usuario'";
	 $result = mysqli_query ($conn,$sql);
}else {
$sql = "select * from alquileres";
$result = mysqli_query($conn,$sql);}
if (mysqli_num_rows($result) > 0){
	echo " <div class='main-content'> <div class='form-container '> <h3>Eliminación de alquileres</h3>";
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
	echo "<h1> No hay alquileres disponibles. </h1></div></div>";
} 
//Cerrar conexion
mysqli_close($conn);
?>
    </body>
    </html>