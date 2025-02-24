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
			echo " <li> <a href='../../Coches/Coches.php'> Coches </a></li>
		<li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a>	</li>
		<li> <a href='../Alquileres.php'> Alquileres </a> ";  } ?>
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
    // Seleccionar base de datos
       mysqli_select_db ($conn,"concesionario")
          or die ("No se puede seleccionar la base de datos");
    // Enviar consulta
       $instruccion = "select * from Alquileres";
       $consulta = mysqli_query ($conn,$instruccion)
          or die ("Fallo en la consulta");
    $id_usuario = $_SESSION['iduser'];
    if ($tipo == 'Comprador'){
         $con = "SELECT * FROM Alquileres WHERE id_usuario = '$id_usuario'";
         $consulta = mysqli_query ($conn,$con);
    }
    elseif ($tipo == 'Vendedor'){
        // $con = "select id_alquiler,id_usuario,id_coche,prestado,devuelto  from alquileres a join usuarios u on a.id_usuario=u.id_usuario join coches c on a.id_coche=c.id_coche join usuarios v on c.Vendedor=v.id_usuario where Vendedor ='$id_usuario'";
       $con = " SELECT a.id_alquiler, a.id_usuario, c.id_coche, c.modelo, c.marca, a.prestado, a.devuelto FROM alquileres a JOIN coches c ON a.id_coche = c.id_coche WHERE c.Vendedor ='$id_usuario'";
 
        $consulta = mysqli_query ($conn,$con);
    } else {
        $con = "SELECT * FROM Alquileres";
        $consulta = mysqli_query ($conn,$con); 
    }

       $nfilas = mysqli_num_rows ($consulta);
       if ($nfilas > 0) {   
          echo " <div class='main-content'><div class='form-container'> <h3>Listado de alquileres</h3>";
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
       echo "<h1> No hay Alquileres disponibles. </h1></div></div>";
 
 // Cerrar 
 mysqli_close ($conn);
 
 ?>
 
    </body>
</html>