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
    <title>Inicio de Sesión</title>
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
            transition: background-color 0.3s;
        }
        .nav li a:hover {
            background-color: #C190CB;
        }
        .main-content {
            padding: 20px;
            text-align: center;
        }
        .form-container {
            width: 100%;
            max-width: 400px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-container label {
            display: block;
            font-size: 1rem;
            margin: 10px 0 5px;
        }
        .form-container input {
            width: 100%;
            padding: 8px;
            border: 2px solid #e5d5e7;
            border-radius: 5px;
        }
        .form-container button {
            background-color: #412B6A;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        .form-container button:hover {
            background-color: #C190CB;
        }
        footer {
            background-color: #412B6A;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header><h1>CONCESIONARIO</h1></header>
    <nav class="nav">
        <ul>
            <li> <a href='../Index.php'> Inicio </a> </li>
            <li> <a href='../Coches/Coches.php'> Coches </a>
                    <?php if ($tipo == 'Vendedor' ||  $tipo == 'Admin'){ 
                    echo "<li> <a href='../Coches/Añadir/CF_Añadir.php'>     Añadir    </a>  </li>
                        <li> <a href='../Coches/Modificar/CF_Modificar.php'> Modificar </a>  </li>
                        <li> <a href='../Coches/Borrar/F_Borrar.php'>        Borrar    </a>  </li>";  } ?>
                        <li> <a href='../Coches/Listar/C_Listar.php'>        Listar    </a>  </li>
                        <li> <a href='../Coches/Buscar/CF_Buscar.php'>       Buscar    </a>  </li>
            </li>
        </ul>
    </nav>
    <div class="main-content">
        <div class="form-container">
            <h2>Log in</h2>
            <form action="Check-Login.php" method="post">                            
                <label for="username">Username:</label>
                <input type="text" name="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <button type="submit">Log in</button>
            </form>
            <p>¿No tienes cuenta? <a href="F_Registrer.php" title="Create an account">Crear una cuenta</a>.</p>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Concesionario. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
