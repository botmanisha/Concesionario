<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>LISTADO DE ALQUILERES</title>
    </head>
    <style>
   body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
                color: #333;
            }
            header {
                background-color: #412B6A;
                color: white;
                padding: 20px 0;
                text-align: center;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }
            header h1 {
                margin: 0;
                font-size: 2.5rem;
            }
            .nav {
                display: flex;
                justify-content: center;
                background-color: #412B6A;
                margin: 0;
                padding: 0;
            }
            .nav ul {
                list-style: none;
                margin: 0;
                padding: 0;
                display: flex;
            }
            .nav li {
                position: relative;
            }
            .nav li a {
                text-decoration: none;
                padding: 15px 20px;
                color: white;
                display: block;
                transition: background-color 0.3s, color 0.3s;
            }
            .nav li a:hover {
                background-color: #C190CB;
                color: #fff;
            }
            .nav li ul {
                position: absolute;
                top: 100%;
                left: 0;
                display: none;
                background-color: #412B6A;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }
            .nav li:hover > ul {
                display: block;
            }
            .nav li ul li a {
                padding: 10px 15px;
            }
            .main-content {
                padding: 20px;
                text-align: center;
            }
            .main-content h3 {
                color: #412B6A;
            }
            footer {
                background-color: #412B6A;
                color: white;
                text-align: center;
                padding: 10px 0;
                margin-top: 20px;
            }
            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                border: 1px solid #ddd;
                text-align: center;
            }
            th, td {
                padding: 10px;
                border: 1px solid #ddd;
            }
            th {
                background-color: #412B6A;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            .contenedor {
                width: 80%;
                display: flex;
                justify-content: space-between;
                margin: 100px auto;
            }
            h2 {
                color: rgb(209, 105, 105);
                text-align: center;
            }
            h5 {
                color: rgb(209, 105, 105);
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                text-align: center;
            }
    </style>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> ALQUILERES</h2>
    <nav class="nav">
        <ul>
            <li> <a href='../../Index.php'> Inicio </a> </li>
            <li> <a href='../../Coches/Coches.php'> Coches </a>
            </li>
		<li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a>	
		</li>
		<li> <a href='../Alquileres.php'> Alquileres </a>
            <ul>	
				<li> <a href='../../Index.php'> Inicio </a>  </li>
				<li> <a href='../Listar/A_Listar.php'> Listar </a>  </li>
				<li> <a href='../Borrar/F_Borrar.php'> Borrar </a>  </li>
			</ul>
		</li>
	</ul>
    </nav><br>

<?php

$conn= mysqli_connect("localhost","root","rootroot","concesionario");

if (!$conn){
	die ("Connection failed: " . mysqli_connect_error());
}
$sql = "select * from alquileres";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0){
	echo " <div class='main-content'> <h3>Listado de coches</h3>";
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
	echo "<h1> No hay alquileres disponibles. </h1></div>";
} 
//Cerrar conexion
mysqli_close($conn);
?>