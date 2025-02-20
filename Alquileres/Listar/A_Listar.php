
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
    <div class="main-content">
            <h3>Listado de Alquileres</h3>
        </div>
    <?PHP

    // Conectar con el servidor de base de datos
       $conexion = mysqli_connect ("localhost", "root", "rootroot")
          or die ("No se puede conectar con el servidor");
          
    // Seleccionar base de datos
       mysqli_select_db ($conexion,"concesionario")
          or die ("No se puede seleccionar la base de datos");
    // Enviar consulta
       $instruccion = "select * from Alquileres";
       $consulta = mysqli_query ($conexion,$instruccion)
          or die ("Fallo en la consulta");
    // Mostrar resultados de la consulta
       $nfilas = mysqli_num_rows ($consulta);
       if ($nfilas > 0)
       {
          print ("<TABLE border=1 >\n");
          print ("<TR>\n");
          print ("<TH height=50px width=100>ID Alquiler</TH>\n");
          print ("<TH height=50px width=100>ID Usuario</TH>\n");
          print ("<TH height=50px width=100>ID Coche</TH>\n");
          print ("<TH height=50px width=200>Prestado</TH>\n");
          print ("<TH height=50px width=200>Devuelto</TH>\n");
         
          print ("</TR>\n");
 
          for ($i=0; $i<$nfilas; $i++)
          {
             $resultado = mysqli_fetch_array($consulta);
             print ("<TR align=center>\n");            
             print ("<TD height=100px >" . $resultado['id_alquiler'] . "</TD>\n");
             print ("<TD>" . $resultado['id_usuario'] . "</TD>\n");
             print ("<TD>" . $resultado['id_coche'] . "</TD>\n");
             print ("<TD>" . $resultado['prestado'] . "</TD>\n");
             print ("<TD>" . $resultado['devuelto'] . "</TD>\n");
 
             
             print ("</TR>\n");
          }
 
          print ("</TABLE>\n");
       }
       else
          print ("No hay alquileres disponibles");
 
 // Cerrar 
 mysqli_close ($conexion);
 
 ?>
 
    </body>
</html>