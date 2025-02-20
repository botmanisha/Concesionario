<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                border: 2px solidrgb(60, 36, 65);
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
<?PHP
    // CONFIGURACIÓN DE LA BD
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

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $busqueda = $_POST['buscador'];

        // Preparar la consulta SQL
        $sql = "SELECT * FROM coches WHERE Modelo LIKE '%$busqueda%' OR Marca LIKE '%$busqueda%' OR color LIKE '%$busqueda%' OR precio LIKE '%$busqueda%' OR alquilado LIKE '%$busqueda%'";

        // Ejecutar la consulta
        $resultado = mysqli_query($conn, $sql);

        // Mostrar resultados en forma de tabla
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Modelo</th><th>Marca</th><th>Color</th><th>Precio</th><th>Alquilado</th><th>Foto</th></tr>";
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['id_coche'] . "</td>";
                echo "<td>" . $fila['modelo'] . "</td>";
                echo "<td>" . $fila['marca'] . "</td>";
                echo "<td>" . $fila['color'] . "</td>";
                echo "<td>" . $fila['precio'] . "</td>";
                echo "<td>" . $fila['alquilado'] . "</td>";
                echo "<td>" . $fila['foto'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }

    // Cerrar conexión
    mysqli_close($conn);
?>

</body>
</html>s