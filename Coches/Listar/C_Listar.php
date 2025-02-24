<?php
session_start();
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>LISTADO DE COCHES</title>
        <link rel="stylesheet" href="../../Estilos.css">
    </head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> COCHES</h2>
    <nav class="nav">
        <ul>
        <li> <a href='../../Index.php'> Inicio </a> </li>
            <li> <a href='../Coches.php'> Coches </a>
            <ul>	
                <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
				echo "<li> <a href='../Añadir/CF_Añadir.php'>     Añadir    </a>  </li>
				    <li> <a href='../Modificar/CF_Modificar.php'> Modificar </a>  </li>
				    <li> <a href='../Borrar/F_Borrar.php'>        Borrar    </a>  </li>";  } ?>
                    <li> <a href='../Listar/C_Listar.php'>        Listar    </a>  </li>
				    <li> <a href='../Buscar/CF_Buscar.php'>       Buscar    </a>  </li>
		    	</ul>
            </li>
	º        <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' || $tipo == 'Comprador' ){ 
			echo " 	<li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a> 	</li>
		    <li> <a href='../../Alquileres/Alquileres.php'> Alquileres </a></li>";  } ?>
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
    <div class="main-content">
            <h3>Listado de Coches</h3>
            <div class='form-container '>

    <?PHP

   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot")
         or die ("No se puede conectar con el servidor");
		 
   // Seleccionar base de datos
      mysqli_select_db($conexion,"concesionario")
         or die ("No se puede seleccionar la base de datos");
   // Enviar consulta
      $instruccion = "select * from coches";
      $consulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");
   // Mostrar resultados de la consulta
      $nfilas = mysqli_num_rows($consulta);
      if ($nfilas > 0)
      {
         print ("<TABLE border=1>\n");
         print ("<TR>\n");
		 print ("<TH>ID</TH>\n");
         print ("<TH>Modelo</TH>\n");
         print ("<TH>Marca</TH>\n");
         print ("<TH>Color</TH>\n");
         print ("<TH>Precio</TH>\n");
         print ("<TH>Foto</TH>\n");
         print ("<TH>Alquilado</TH>\n");
         if  ($tipo == 'Comprador') {print ("<TH>Rerservar</TH>\n");}
         print ("</TR>\n");

         for ($i=0; $i<$nfilas; $i++)
         {
            $resultado = mysqli_fetch_array($consulta);
            if ($resultado['alquilado'] == 0){
               $boo = "No";
            }
            else{
                $boo = "Sí";
            }
            print ("<TR>\n");            
			print ("<TD>" . $resultado['id_coche'] . "</TD>\n");
            print ("<TD>" . $resultado['modelo'] . "</TD>\n");
            print ("<TD>" . $resultado['marca'] . "</TD>\n");
            print ("<TD>" . $resultado['color'] . "</TD>\n");
            print ("<TD>" . $resultado['precio'] . "</TD>\n");
            print ("<TD> <img src='../Añadir/Fotos/" . $resultado['foto'] ."' width=100 heigh=100></TD>\n");      
            print ("<TD>" . $boo . "</TD>\n");
            if  ($tipo == 'Comprador') { 
                if ($boo == 'No'){
                   echo " <TD> <form action='Alquiler.php' METHOD='POST'>
                        <input type='hidden' name='coche' value= ". $resultado['id_coche'] . ">             
                        <button type='submit'>Modificar</button>
                    </form> </td> ";
                }
                else {
                    echo "<TD> Reserva completada </td>";
                }
                
            }
            print ("</TR>\n");
         }

         print ("</TABLE>\n");
      }
      else
         print ("No hay coches disponibles");

// Cerrar 
mysqli_close ($conexion);

?>
</div>
    </body>
</html>