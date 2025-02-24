<?php
session_start();
$tipo = $_SESSION['tipo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../Estilos.css">
</head>
<body>
    <header><h1>CONCESIONARIO</h1></header>
    <nav class="nav">
        <ul>
		<li> <a href='../Index.php'> Inicio </a> </li>
            <li> <a href='../Coches/Coches.php'> Coches </a></li>
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

        <?php
        // Connection info
        $conn = mysqli_connect("localhost", "root", "rootroot", "concesionario");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $_POST['username'];
            $password = $_POST['password'];

            $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE (username = '$user') and (password = '$password');");

            $row = mysqli_fetch_assoc($result);

            // Variable $hash holds the password hash from the database
            $hash = $row['password'];

            if ($password == $hash) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['iduser'] = $row['id_usuario'];
                $_SESSION['tipo'] = $row['tipo_usuario'];
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);

                header('Location: ../Index.php');
            } else {
                echo "<div>¡Correo o contraseña incorrectos!<p><a href='CheckLogin.php'><strong>¡Intentalo de nuevo!</strong></a></p></div>";
            }
        }
        ?>
    </div>
    <footer>
        <p>&copy; 2025 Concesionario. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
