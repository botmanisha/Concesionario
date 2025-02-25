<?php
session_start();
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title> LISTADO DE USUARIOS</title>
        <link rel="stylesheet" href="../../Estilos.css">
    </head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> USUARIOS</h2>
    <nav class="nav">
        <ul>
        <li> <a href='../../Index.php'> Inicio </a> </li>
         <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
		    echo "<li> <a href='../../Coches/Coches.php'> Coches </a> </li>
		    <li> <a href='../Usuarios.php'> Usuarios </a>";  } ?>
            <ul>	
                <?php if ($tipo == 'Admin'){ 
				echo "<li> <a href='../Añadir/UF_Añadir.php'>   Añadir </a>  </li>
                    <li> <a href='../Borrar/F_Borrar.php'>      Borrar </a>  </li>";  } ?>
				<?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
				echo "<li> <a href='../Listar/U_Listar.php'>    Listar </a>  </li>
				    <li> <a href='../Buscar/UF_Buscar.php'>     Buscar </a>  </li>";  } ?>
                <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
				echo "<li> <a href='../Modificar/UF_Modificar.php'> Modificar </a>  </li>";  } ?>
			</ul>				 		
		</li>
	    <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
		    echo "	<li> <a href='../../Alquileres/Alquileres.php'> Alquileres </a></li>";  } ?>
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
    </nav>
    <div class="main-content">
        <h3>Listado de Usuarios</h3>
<?PHP

// Conectar con el servidor de base de datos
   $conexion = mysqli_connect ("localhost", "root", "rootroot")
      or die ("No se puede conectar con el servidor");
      
// Seleccionar base de datos
   mysqli_select_db ($conexion,"concesionario")
      or die ("No se puede seleccionar la base de datos");
// Enviar consulta
if ($tipo == 'Admin' ){
   $instruccion = "select * from usuarios";
   $consulta = mysqli_query ($conexion,$instruccion)
      or die ("Fallo en la consulta");}
elseif ($tipo == 'Vendedor'){
    $instruccion = "select * from usuarios where tipo_usuario = 'Comprador'";
    $consulta = mysqli_query ($conexion,$instruccion)
       or die ("Fallo en la consulta");}

// Mostrar resultados de la consulta
   $nfilas = mysqli_num_rows ($consulta);
   if ($nfilas > 0)
   {
      print ("<TABLE border=1 align=center>\n");
      print ("<TR>\n");
      print ("<TH>Nombre</TH>\n");
      print ("<TH>Apellidos</TH>\n");
      print ("<TH>DNI</TH>\n");
      print ("<TH>Saldo</TH>\n");
      print ("<TH>Username</TH>\n");
      print ("<TH> Password</TH>\n");
      print ("<TH>Email</TH>\n");
      if ($tipo == 'Admin'){print ("<TH>Tipo</TH>\n");}
      print ("</TR>\n");

      for ($i=0; $i<$nfilas; $i++)
      {
         $resultado = mysqli_fetch_array($consulta);
         print ("<TR align=center>\n");            
         print ("<TD height=50px width=100>" . $resultado['nombre'] . "</TD>\n");
         print ("<TD height=50px width=100>" . $resultado['apellidos'] . "</TD>\n");
         print ("<TD height=50px width=100>" . $resultado['dni'] . "</TD>\n");
         print ("<TD height=50px width=100>" . $resultado['saldo'] . "</TD>\n");
         print ("<TD height=50px width=100>" . $resultado['username'] . "</TD>\n");
         $hashed_password = password_hash($row['password'], PASSWORD_DEFAULT);
         echo "<td>" . htmlspecialchars($hashed_password) . "</td>";
         print ("<TD height=50px width=100>" . $resultado['email'] . "</TD>\n");
        if ($tipo == 'Admin'){ print ("<TD height=50px width=100>" . $resultado['tipo_usuario'] . "</TD>\n");  }
        print ("</TR>\n");
      }

      print ("</TABLE>\n");
   }
   else {
      print ("No hay usuarios disponibles");
   }
// Cerrar 
mysqli_close ($conexion);

?>
    </div>
    </body>
</html>