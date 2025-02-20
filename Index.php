<?php 
session_start();
$conn= mysqli_connect("localhost","root","rootroot","concesionario");

if (!$conn){
	die ("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['tipo'])){
    $_SESSION['tipo'] = '';
}
?>
<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<title> Menu Concesionario </title>
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
    padding: 15px 0;  /* Reducido el padding */
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
    padding: 20px; /* Reducido padding */
    text-align: center;
}

.main-content h3 {
    color: #412B6A;
}

.mapita {
    margin-left: 20px;
    width: 400px;
    height: 700px;
    color: rgb(209, 105, 105);
    text-transform: uppercase;
    align-items: left;
}

.contacto {
    align-items: right;
    width: 700px;
    margin-right: 100px;
}

.contenedor {
    width: 80%;
    display: flex;
    justify-content: space-between;
    margin: 50px auto; /* Reducido margen */
}

h3 {
    color: rgb(209, 105, 105);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    text-align: center;
}

#map-9cd199b9cc5410cd3b1ad21cab2e54d3 {
    width: 100%;
    max-width: 400px;
    margin: 20px;
}

h5 {
    color: rgb(209, 105, 105);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    text-align: center;
}

footer {
    background-image: url('Imagenes/fxk4.gif');
    background-size: cover;
    background-position: center;
    color: white;
    text-align: center;
    padding: 20px 0; /* Reducido padding */
    margin-top: 40px; /* Reducido margen */
}

footer .footer-banner h5 {
    font-size: 1.5rem;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
}
.loginn {
    width: 20px;
    height: 20px;
  
}
</style>
	
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
				<li> <a href='Index.php'> Inicio </a>  </li>
				<li> <a href='./Coches/Añadir/CF_Añadir.php'> Añadir </a>  </li>
				<li> <a href='./Coches/Listar/C_Listar.php'> Listar </a>  </li>
				<li> <a href='./Coches/Buscar/CF_Buscar.php'> Buscar </a>  </li>
				<li> <a href='./Coches/Modificar/CF_Modificar.php'> Modificar</a></li>
				<li> <a href='./Coches/Borrar/F_Borrar.php'> Borrar </a>  </li>
			</ul>
		</li>
		<li> <a href='./Usuarios/Usuarios.php' > Usuarios </a> 
			<ul>	
				<li> <a href='Index.php'> Inicio </a>  </li>
				<li> <a href='./Usuarios/Añadir/UF_Añadir.php'> Añadir </a>  </li>
				<li> <a href='./Usuarios/Listar/U_Listar.php'> Listar </a>  </li>
				<li> <a href='./Usuarios/Buscar/UF_Buscar.php'> Buscar </a>  </li>
				<li> <a href='./Usuarios/Modificar/UF_Modificar.php'> Modificar </a>  </li>
				<li> <a href='./Usuarios/Borrar/F_Borrar.php'> Borrar </a>  </li>
			</ul>		
		</li>
        <li> <a href='./Alquileres/Alquileres.php' > Alquileres </a>
			<ul>	
				<li> <a href='Index.php'> Inicio </a>  </li>
				<li> <a href='./Alquileres/Listar/A_Listar.php'> Listar </a>  </li>
				<li> <a href='./Alquileres/Borrar/F_Borrar.php'> Borrar </a>  </li>
			</ul>
		</li>
		<li>  <a href="Log/Registrer.html"><img  class="loginn" src="Imagenes/login.png"></a>
			<ul>	
				<li> <a href='Index.php'> Inicio </a>  </li>
				<li> <a href='./Log/Check-Login.html'> Log In </a>  </li>
				<li> <a href='./Log/Registrer.html'> Registrarse </a>  </li>
                <li> <a href='./Log/Logout.php'> Cerrar Sesión </a>  </li>
			</ul>
		</li>
		<li>  <a href='./Log/Logout.php'> </a><img  class="loginn" src="Imagenes/logout.png"></a>
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

