<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Producto</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: url("assets/images/bg3.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            text-align: center;
        }
        h1 {
            font-size: 40px;
            margin-bottom: 30px;
            color: #fff;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            font-size: 18px;
            color: #fff;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 300px;
            padding: 10px;
            border-radius: 4px;
            border: none;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 15px 30px;
            background-color: #6c63ff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #524de6;
        }
        .back-button {
            margin-top: 20px;
            padding: 15px 30px;
            background-color: #ff6c6c;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #e65252;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Insertar Producto</h1>

        <?php
        // Verificar si se envió el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $descripcion = $_POST["descripcion"];
            $stock = $_POST["stock"];

            // Realizar la lógica de inserción en la base de datos
            // Aquí debes agregar tu código para interactuar con la base de datos y realizar la inserción del producto

            // Ejemplo de conexión a la base de datos y consulta INSERT (debes adaptarlo a tus necesidades)
            $conexion = mysqli_connect("localhost", "root", "emiliafGG.lW13", "ProyectoFinal");
            $query = "INSERT INTO productos (nombre, precio, descripcion, stock) VALUES ('$nombre', '$precio', '$descripcion', '$stock')";
            mysqli_query($conexion, $query);

            // Verificar si la inserción fue exitosa
            if (mysqli_affected_rows($conexion) > 0) {
                echo "<p>Producto insertado exitosamente.</p>";
            } else {
                echo "<p>Error al insertar el producto.</p>";
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);
        }
        ?>

        <!-- Formulario de inserción -->
        <form action="insertar.php" method="POST">
            <label for="nombre">Tareas que desees Realizar:</label>
            <input type="text" name="nombre" id="nombre" required>
            <br>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" required>
            <br>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="5" required></textarea>
            <br>
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" required>
            <br>
            <input type="submit" value="Insertar Producto">
        </form>
        
        <a href="bienvenida.php" class="back-button">Regresar</a>
    </div>
</body>
</html>