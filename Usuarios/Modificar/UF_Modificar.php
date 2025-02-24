<?php
session_start();

$conn= mysqli_connect("localhost","root","rootroot","concesionario");

if (!$conn){
	die ("Connection failed: " . mysqli_connect_error());
}
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
            .main-content h3 {
                color: #412B6A;
                font-size: 2rem;
            }
            .form-container {
                width: 100%;
                max-width: 850px;
                margin: 30px auto;
                text-align: center; 
                padding: 10px;
                background-color: white;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }
            .form-container label {
                display: block;
                font-size: 0.9rem;
                margin: 10px 0 5px;
            }
            .form-container input, .form-container select {
                width: 60%;
                padding: 8px;
                margin: auto 0;
                text-align: center;
                align-items: center;
                border: 3px solid #e5d5e7;
                border-radius: 5px;
                font-size: 0.9rem;
                

            }
            .form-container input[type="file"] {
                padding: 5px;
            }
            .form-container input[type="submit"] {
                background-color: #412B6A;
                color: white;
                border: none;
                padding: 10px 15px;
                font-size: 1rem;
                cursor: pointer;
                border-radius: 5px;
                transition: background-color 0.3s;
                margin: 30px;
            }
            .form-container input[type="submit"]:hover {
                background-color: #C190CB;
            }
            footer {
                background-color: #412B6A;
                color: white;
                text-align: center;
                padding: 10px 0;
                margin-top: 40px;
            }
            label{
                text-align: center;
                font-style: italic;
                font-family: Arial, sans-serif;
                color: darkblue;
                font-size: 10px;

            }
            .loginn {
                width: 20px;
                height: 20px;
            }
    </style>
    <body>
    <header><h1>CONCESIONARIO</h1></header>
	<h2>Modificar usuario por ID </h2>
    <nav class="nav">
    <ul>
        <li> <a href='../../Index.php'> Inicio </a> </li>
         <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
        echo "<li> <a href='../../Coches/Coches.php'> Coches </a> </li>
		<li> <a href='../../Usuarios/Usuarios.php'> Usuarios </a>	";  } ?>
            <ul>	
                <?php if ($tipo == 'Admin'){ 
				echo "<li> <a href='../Añadir/UF_Añadir.php'>   Añadir </a>  </li>
                    <li> <a href='..//Borrar/F_Borrar.php'>      Borrar </a>  </li>";  } ?>
				<?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
				echo "<li> <a href='../Listar/U_Listar.php'>    Listar </a>  </li>
				    <li> <a href='../Buscar/UF_Buscar.php'>     Buscar </a>  </li>";  } ?>
                <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
				echo "<li> <a href='../Modificar/UF_Modificar.php'> Modificar </a>  </li>";  } ?>
			</ul>		
		</li>
		<?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
        echo "<li> <a href='../../Alquileres/Alquileres.php'> Alquileres </a> </li>";  } ?>
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
    <div class="main-content">
        <div class="form-container">
            <h3> ID del Usuario a actualizar:</h3>
	<form action='U_modificar1.php' method='post' >
		<input type='text' name='id_usuario' required><br>
		<input type='submit' value='Buscar'>
	</form>
    </div></div>
</body>
</html>
