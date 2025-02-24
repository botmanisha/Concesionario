<?php
session_start();

$conn= mysqli_connect("localhost","root","rootroot","concesionario");

if (!$conn){
	die ("Connection failed: " . mysqli_connect_error());
}
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICACIÓN DE COCHES</title>
    <link rel="stylesheet" href="../../Estilos.css">
</head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2>  COCHES </h2>
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
    <div class="main-content">
    <div class="form-container">
        <h3>Modificación mediante ID:</h3>
        <?PHP
   
   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot")
         or die ("No se puede conectar con el servidor");
         
   // Seleccionar base de datos
      mysqli_select_db ($conexion,"concesionario")
         or die ("No se puede seleccionar la base de datos");
   // Enviar consulta
       $id_usuario = $_SESSION['iduser'];
       if ($tipo =="Admin"){
       $instruccion = "select * from coches";
       }else {
           $instruccion = "select * from coches where Vendedor = '$id_usuario'";
       }
      $consulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");
   // Mostrar resultados de la consulta
      $nfilas = mysqli_num_rows ($consulta);
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
        print ("<TH>Modificar</TH>\n");
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
            print ("<TR align=center>\n");            
            print ("<TD>" . $resultado['id_coche'] . "</TD>\n");
            print ("<TD>" . $resultado['modelo'] . "</TD>\n");
            print ("<TD>" . $resultado['marca'] . "</TD>\n");
            print ("<TD>" . $resultado['color'] . "</TD>\n");
            print ("<TD>" . $resultado['precio'] . "</TD>\n");
            print ("<TD> <img src='../Añadir/Fotos/" . $resultado['foto'] ."' width=100 heigh=100></TD>\n");      
            print ("<TD>" . $boo . "</TD>\n");
            print ("<TD height=50px width=100> 
               <form action='./C_Modificar1.php' METHOD='POST'>
                   <input type='hidden' name='vendedor' value= ". $resultado['Vendedor'] . ">             
                   <button type='submit'>Modificar</button>
                </form>  
           </TD>\n");
            
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