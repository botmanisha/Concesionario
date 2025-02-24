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
    <title>MODIFICACIÓN DE COCHES</title>
</head>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
        <h2> MODIFICACIÓN DE COCHES </h2>
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
		    <li> <a href='../Alquileres.php'> Alquileres </a></li>";  } ?>
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
$id = $_REQUEST['id_coche'];

//Crear conexión
$conn= mysqli_connect($servername,$username,$password, $dbname)
or die('Conexión fallida: ' . mysqli_connect_error());
$id_usuario = $_SESSION['iduser'];
$sql = "SELECT * FROM coches WHERE Vendedor = '$id_usuario'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >0 ){
	while($row = mysqli_fetch_assoc($result)){
?>
<div class="main-content">
    <h4>MODIFICAR COCHES</h4>
<div class="form-container">
<form action='C_modificar2.php' method='post' enctype="multipart/form-data">
	<input type='text' readonly name='id_coche' value="<?php echo $row['id_coche']; ?>"><br><br>
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" value="<?php echo $row['modelo']; ?>" required><br>
        
        <label for="marca">Marca:</label>
        <input type="text" name="marca" value="<?php echo $row['marca']; ?>" required><br>
        
        <label for="alquilado">Alquilado:</label>
        <select name="alquilado">
            <option value="1" <?php if ($row['alquilado'] == '1') echo 'selected'; ?> >Sí</option>
            <option value="0" <?php if ($row['alquilado'] == '0') echo 'selected'; ?> >No</option>
        </select><br>
        
        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="<?php echo $row['precio']; ?>" required><br>
       
        <label for="color ">Color:</label>
        <input type="text" name="color" value="<?php echo $row['color']; ?>" required><br>

        <!--<label for="imagen">Selecciona una imagen:</label><br>
        <input type="file" name="imagen" accept="image/*"><br><br>
        <input type="submit" value="Enviar">
-->
        <input type="submit" value="Modificar">
    </form>
    </div></div>
</body>
</html>
<?php
}}
// Cerrar la conexión
mysqli_close($conn);
?>
</body>

</html>