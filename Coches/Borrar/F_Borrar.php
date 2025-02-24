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

$conn= mysqli_connect("localhost","root","rootroot","concesionario");
if (!$conn){
	die ("Connection failed: " . mysqli_connect_error());
}
$id_usuario = $_SESSION['iduser'];
if ($tipo == 'Vendedor'){
	$sql = "SELECT * FROM Coches WHERE Vendedor = '$id_usuario'";
	$result = mysqli_query ($conn,$sql);
}else {
$sql = "select * from coches";
$result = mysqli_query($conn,$sql);}
if (mysqli_num_rows($result) > 0){
	echo " <div class='main-content'><div class='form-container'> <h3>Eliminación de coches</h3>";
	echo "<form action='C_Borrar.php' method='post'>";
	echo "<table border='1'>";
	echo"<tr><th> Seleccionar </th><th> ID Coche </th><th> Modelo </th><th> Marca </th><th> Color </th><th> Precio </th><th> Alquilado </th><th> Foto </th></tr>";
	//Mostrar cada piso con checkbox
	while ($row = mysqli_fetch_assoc($result)){
		if (htmlspecialchars($row['alquilado']) == 0){
			$boo = "No";
		 }
		 else{
			 $boo = "Sí";
		 }
		echo "<tr>";
		echo "<td><input type='checkbox' name=delete_id[] value=' " . $row['id_coche'] . "'> </td>";
		echo "<td>" . htmlspecialchars($row['id_coche']) . "</td>";
		echo "<td>" . htmlspecialchars($row['modelo']) . "</td>";
		echo "<td>" . htmlspecialchars($row['marca']) . "</td>";
		echo "<td>" . htmlspecialchars($row['color']) . "</td>";
		echo "<td>" . htmlspecialchars($row['precio']) . "</td>";
		echo "<td>" . $boo . "</td>";		
		echo "<td>" . htmlspecialchars($row['foto']) . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</br>";
	echo "<button type='submit'> Eliminar Coches </button>";
	echo "</form>";	
} else {
	echo "<h1> No hay Coches disponibles. </h1></div></div>";
} 
//Cerrar conexion
mysqli_close($conn);

?>
</body>
</html>