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
        <h2> MODIFICACIÓN DE USUARIOS</h2>
    <nav class="nav">
        <ul>
            <li> <a href='../../Index.php'> Inicio </a> </li>
            <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador'){ 
		    echo "<li> <a href='../../Coches/Coches.php'> Coches </a> </li>
		<li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a>	";  } ?>
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
		    echo "<li> <a href='../../Alquileres/Alquileres.php'> Alquileres </a> </li>";  } ?>
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

//Crear conexión
$conn= mysqli_connect($servername,$username,$password, $dbname)
or die('Conexión fallida: ' . mysqli_connect_error());
 
//ECHO $sql;
$users = $_POST['users'];
$sql = "SELECT * FROM usuarios WHERE id_usuario = '$users'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >0 ){
	while($row = mysqli_fetch_assoc($result)){

?>
 <div class='main-content'>
 <h3>Modificación de usuario: </h3>
 <div class="form-container"><form action='U_modificar2.php' method='post' enctype="multipart/form-data">
	<input type='text' readonly name='id_usuario' value="<?php echo $row['id_usuario']; ?>"><br><br>
        <label for="password">Password:</label>
        <input type="text" name="password" value="<?php echo $row['password']; ?>" required><br>
        
        <label for="nombre">Nombre:</label>
        <input type="text"  name="nombre" value="<?php echo $row['nombre']; ?>" required><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" value="<?php echo $row['apellidos']; ?>" required><br>
       
        <label for="dni ">DNI:</label>
        <input type="text" name="dni" value="<?php echo $row['dni']; ?>" required><br>
        
        <label for="saldo ">Saldo:</label>
        <input type="text" name="saldo" value="<?php echo $row['saldo']; ?>" required><br>
        <label for="username" > Username:</label>
        <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br>

        <label for="email" > Email:</label>
        <input type="text" name="email"value="<?php echo $row['email']; ?>" required><br>
         <?php if ( $tipo == 'Admin'){ 
			echo " <label for='tipo_usuario'> Tipo Usuario:</label>
            <select name='tipo_usuario'required> <br><br>
                <option value='Comprador'>Comprador</option>
                <option value='Vendedor' >Vendedor</option>
                <option value='Admin' >Administrador</option>
            </select>"; } ?>
        <input type="submit" value="Modificar">
    </form>
    </div></div>
 <?php   } }


// Cerrar la conexión
mysqli_close($conn);
?>
</body>
</html>