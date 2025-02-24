<?php 
session_start();
$conn= mysqli_connect("localhost","root","rootroot","concesionario");

if (!$conn){
	die ("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['tipo'])){  
    $_SESSION['tipo'] = 'in';
}
$tipo =  $_SESSION['tipo'] ;
?>
<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<title> Menu Concesionario </title>
    <link rel="stylesheet" href="./Index.css">
</head>


<body>
	<div class="banner">	
		<header>
            <h1> CONCESIONARIO </h1>
        </header>	
        
	</div>
	<nav class="nav">
	<ul >
		<li> <a href='Index.php'> Inicio </a> </li>
		<li> <a href='./Coches/Coches.php' > Coches </a>
			<ul>	
                <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
				echo "<li> <a href='./Coches/Añadir/CF_Añadir.php'>     Añadir    </a>  </li>
				    <li> <a href='./Coches/Modificar/CF_Modificar.php'> Modificar </a>  </li>
				    <li> <a href='./Coches/Borrar/F_Borrar.php'>        Borrar    </a>  </li>";  } ?>
                    <li> <a href='./Coches/Listar/C_Listar.php'>        Listar    </a>  </li>
				    <li> <a href='./Coches/Buscar/CF_Buscar.php'>       Buscar    </a>  </li>
			</ul>
		</li>
		<li> <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' || $tipo == 'Comprador' ){ 
				echo " <a href='./Usuarios/Usuarios.php' > Usuarios </a> ";  } ?>
			<ul>	
                <?php if ($tipo == 'Admin'){ 
				echo "<li> <a href='./Usuarios/Añadir/UF_Añadir.php'>   Añadir </a>  </li>
                    <li> <a href='./Usuarios/Borrar/F_Borrar.php'>      Borrar </a>  </li>";  } ?>
				<?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
				echo "<li> <a href='./Usuarios/Listar/U_Listar.php'>    Listar </a>  </li>
				    <li> <a href='./Usuarios/Buscar/UF_Buscar.php'>     Buscar </a>  </li>";  } ?>
                <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
				echo "<li> <a href='./Usuarios/Modificar/UF_Modificar.php'> Modificar </a>  </li>";  } ?>
			</ul>		
		</li>
        <li> <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' || $tipo == 'Comprador' ){ 
            echo "<a href='./Alquileres/Alquileres.php' > Alquileres </a>";  } ?>
			<ul>	
			 <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
				echo "<li> <a href='./Alquileres/Listar/A_Listar.php'> Listar </a>  </li>";  } ?>
				<?php if ( $tipo == 'Admin' ||  $tipo == 'Comprador' ){ 
				echo "<li> <a href='./Alquileres/Borrar/F_Borrar.php'> Borrar </a>  </li>";  } ?>
			</ul>
		</li>
		<li>  <a href="Log/F_Registrer.php"><img  class="loginn" src="Imagenes/login.png"></a>
			<ul>	
				<li> <a href='./Log/CheckLogin.php'> Log In </a>  </li>
				<li> <a href='./Log/F_Registrer.php'> Registrarse </a>  </li>
			</ul>
		</li>
		<li>  <a href='Log/Logout.php'> <img  class="loginn" src="Imagenes/logout.png"></a>
            <ul>
                <li> <a href='./Log/Logout.php'> Cerrar Sesión </a>  </li>
            </ul>
        </li>
	</ul>	
</nav>
<div class="main-content">
<?php  if(isset($_SESSION["loggedin"])){echo '<h2>Bienvenido '. $_SESSION['username'] .' </h2> ';}?>
	<h3>Encuentra el coche de tus sueños</h3>
	<p>Explora nuestra amplia selección de vehículos, desde coches nuevos hasta autos usados de calidad garantizada.</p>
</div>

<div class="contenedor">
	<div class="mapita"> 
	<h5> No dudes en ponerte en contacto </h5>
	<div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
		<div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
        var setting = {"query":"Madrid, España","width":400,"height":400,"satellite":false,"zoom":12,"placeId":"ChIJgTwKgJcpQg0RaSKMYcHeNsQ","cid":"0xc436dec1618c2269","coords":[40.41672790000001,-3.7032905],"cityUrl":"/spain/madrid","cityAnchorText":"Map of Madrid, Community of Madrid, Spain","lang":"es-es","queryString":"Madrid, España","centerCoord":[40.41672790000001,-3.7032905],"id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"1179319"};
        var d = document;
        var s = d.createElement('script');
        s.src = 'https://1map.com/js/script-for-user.js?embed_id=1179319';
        s.async = true;
        s.onload = function (e) {
          window.OneMap.initMap(setting)
        };
        var to = d.getElementsByTagName('script')[0];
        to.parentNode.insertBefore(s, to);
      })();</script><a href="https://1map.com/es-es/map-embed">1 Map</a></div>
	</div>
	<div class="contacto">
	<h3> CONTACTA CON NOSOTROS</h3>
	<P>En nuestro concesionario, nos dedicamos a ofrecerte una experiencia única y satisfactoria en la compra de tu nuevo vehículo. Ya sea que busques un automóvil confiable, una camioneta robusta o un SUV con estilo, estamos aquí para ayudarte a encontrar el vehículo perfecto que se ajuste a tus necesidades y presupuesto.

		Nuestro Compromiso:
	<ul> 
		<li>Amplia Variedad de Modelos y Marcas.</li>	
		<li>Asesoramiento Personalizado por Expertos.</li>	
		<li>Financiamiento Flexible para Todos.</li>	
		<li>Garantía y Servicios Postventa de Primera Calidad.</li>	
	</ul><br><br><br>
	No solo vendemos coches, sino que te brindamos confianza. Nos comprometemos a ofrecerte un servicio excepcional antes, durante y después de tu compra. Queremos que te sientas seguro y satisfecho con tu elección, porque tu satisfacción es nuestra prioridad.
	</P>
	</div>
</div>                 	
<footer>
    <div class="footer-banner">
        <h5>Gracias por visitar nuestro concesionario</h5>
    </div>
</footer>

</body>

