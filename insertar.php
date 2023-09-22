<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Tareas</title>
    
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
        input[type="date"],
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

        /* Estilos personalizados para el mensaje de error */
        .error-message {
            font-size: 18px;
            color: #ff0000;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Insertar Tareas</h1>

        <?php
        // Verificar si se envió el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $nombre = $_POST["nombre"];
            $fecha = $_POST["fecha"];
            $descripcion = $_POST["descripcion"];

            // Verificar si la fecha ingresada es menor que la fecha actual
            $fecha_actual = date("Y-m-d");
            if ($fecha < $fecha_actual) {
                echo '<p class="error-message">Error: La fecha ingresada es menor que la fecha actual.</p>';
            } else {
                // Realizar la lógica de inserción en la base de datos
                // Aquí debes agregar tu código para interactuar con la base de datos y realizar la inserción de la tarea

                // Ejemplo de conexión a la base de datos y consulta INSERT (debes adaptarlo a tus necesidades)
                $conexion = mysqli_connect("localhost", "root", "", "login_register_db");
                $query = "INSERT INTO tareas (nombre, fecha, descripcion) VALUES ('$nombre', '$fecha', '$descripcion')";
                mysqli_query($conexion, $query);

                // Verificar si la inserción fue exitosa
                if (mysqli_affected_rows($conexion) > 0) {
                    echo "<p>Tarea insertada exitosamente.</p>";
                } else {
                    echo "<p>Error al insertar la tarea.</p>";
                }

                // Cerrar la conexión a la base de datos
                mysqli_close($conexion);
            }
        }
        ?>

        <!-- Formulario de inserción sin el campo "Stock" -->
        <form action="insertar.php" method="POST">
            <label for="nombre">Tareas que desees Realizar:</label>
            <input type="text" name="nombre" id="nombre" required>
            <br>
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" required>
            <br>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="5" required></textarea>
            <br>
            <input type="submit" value="Insertar Tarea">
        </form>
        
        <a href="bienvenida.php" class="back-button">Regresar</a>
    </div>
</body>
</html>