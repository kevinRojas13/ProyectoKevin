<!DOCTYPE html>
<html lang="es">
<head>
    <!-- ... (código existente) ... -->
</head>
<body>
    <div class="container">
        <h1>Insertar Tareas</h1>

        <?php
        // Verificar si se envió el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $nombre = $_POST["nombre"];
            $fecha = $_POST["fecha"]; // Cambio del campo "precio" a "fecha"
            $descripcion = $_POST["descripcion"];
            $stock = $_POST["stock"];

            // Verificar si la fecha ingresada es menor que la fecha actual
            $fecha_actual = date("Y-m-d");
            if ($fecha < $fecha_actual) {
                echo "<p>Error: La fecha ingresada es menor que la fecha actual.</p>";
            } else {
                // Realizar la lógica de inserción en la base de datos
                // Aquí debes agregar tu código para interactuar con la base de datos y realizar la inserción de la tarea

                // Ejemplo de conexión a la base de datos y consulta INSERT (debes adaptarlo a tus necesidades)
                $conexion = mysqli_connect("localhost", "root", "emiliafGG.lW13", "ProyectoFinal");
                $query = "INSERT INTO tareas (nombre, fecha, descripcion, stock) VALUES ('$nombre', '$fecha', '$descripcion', '$stock')";
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

        <!-- Formulario de inserción -->
        <form action="insertar.php" method="POST">
            <label for="nombre">Tareas que desees Realizar:</label>
            <input type="text" name="nombre" id="nombre" required>
            <br>
            <label for="fecha">Fecha:</label> <!-- Cambio del campo "precio" a "fecha" -->
            <input type="date" name="fecha" id="fecha" required> <!-- Utilizamos un campo de fecha -->
            <br>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="5" required></textarea>
            <br>
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" required>
            <br>
            <input type="submit" value="Insertar Tarea">
        </form>
        
        <a href="bienvenida.php" class="back-button">Regresar</a>
    </div>
</body>
</html>