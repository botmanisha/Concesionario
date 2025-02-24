<?php
session_start();
$tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos.css">
    <title>Document</title>
</head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> MODIFICACION DE USUARIOS</h2>
    <nav class="nav">
        <ul>
            <li> <a href='../../Index.php'> Inicio </a> </li>
        <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
        echo "<li> <a href='../../Coches/Coches.php'> Coches </a> </li>
		<li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a>";  } ?>
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
          <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
        echo "<li> <a href='../Alquileres.php'> Alquileres </a></li>";  } ?>
        <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
		    echo "<li> <a href='../Alquileres.php'> Alquileres </a> </li>";  } ?>
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
$servername='localhost';
$username='root';
$password = 'rootroot';
$dbname='concesionario';
$id = $_REQUEST['id_usuario'];
$conn= mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die('Conexión fallida: ' . mysqli_connect_error());
}

//Recuperar datos del formulario
$id= $_REQUEST['id_usuario'];
$pass= $_REQUEST['password'];
$nombre= $_REQUEST['nombre'];
$apellidos= $_REQUEST['apellidos'];
$dni= $_REQUEST['dni'];
$saldo= $_REQUEST['saldo'];

$user= $_REQUEST['username'];
$email= $_REQUEST['email'];
$tipous= $_REQUEST['tipo_usuario'];
$sql = "UPDATE usuarios SET password='$pass', nombre='$nombre',apellidos='$apellidos',dni='$dni' ,saldo='$saldo', username='$user', email='$email', tipo_usuario = '$tipo' where id_usuario='$id'";
if(mysqli_query($conn,$sql)){
	echo'<div class="main-content"> Usuario actualizado con éxito.';
	echo "<br><a href='./UF_Modificar.php'> Volver al listado de users. </a></div>";
	mysqli_close($conn);
}else {
	echo 'Error al actualizar el user: ' . mysqli_error($conn);
}

?>
    </body>
</html>