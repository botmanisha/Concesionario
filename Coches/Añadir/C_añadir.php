<?PHP
    //CONFIG DE LA BD 
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "concesionario";

    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Comprobar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    
    }
    
    //INSERTAR DATOS EN LA BD
    $modelo = $_REQUEST['modelo'];
    $marca = $_REQUEST['marca'];
    $color = $_REQUEST['color'];
    $precio = $_REQUEST['precio'];
    $alquilado = $_REQUEST['alquilado'];
   

    $target_dir = "./Fotos/";
    $file = $_FILES['imagen'];  
    $target_file = $target_dir . basename($file["name"]);
    $foto =  basename($file["name"]);
   
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        echo "La imagen ". htmlspecialchars($foto) . " se ha subido correctamente.<br>";
      
    } else {
        die ("Hubo un error al subir el archivo.");
    }
    // Preparar la sentencia SQL
    $sql = "INSERT INTO coches(modelo, marca, color, precio, alquilado, foto)
    VALUES ('$modelo', '$marca', '$color', '$precio', '$alquilado','$foto')";
    // Ejecutar la sentencia SQL
    if (mysqli_query($conn, $sql)) {
        echo "Datos insertados correctamente";
    }
    else {
        echo "Error al insertar datos: " . mysqli_error($conn);
    }
    echo "<br><a href='../Listar/C_Listar.php'> Volver a Listar </a>";
    //cerrar conexion
    mysqli_close( $conn );
?>
