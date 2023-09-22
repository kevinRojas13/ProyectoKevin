<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <style>
        body {
            background-image: url("assets/images/R.jpeg");
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
            margin-top: -100px;
        }
        h1 {
            font-size: 40px;
            margin-bottom: 30px;
            color: #fff;
        }
        .button-group {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap; /* Agregamos esta propiedad para que los botones se envuelvan en caso de que no quepan en una sola línea */
            margin-top: 20px;
        }
        a {
            display: block;
            margin: 10px;
            padding: 20px;
            background-color: #6c63ff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 18px;
            transition: background-color 0.3s;
            width: 200px; /* Agregamos esta propiedad para fijar el ancho de los botones */
        }
        a:hover {
            background-color: #524de6;
        }
        .middle-button {
            order: 2; /* Cambiamos el orden del botón "Vizualizar" para que aparezca después del botón "Actualizar" */
        }
    </style>
    </style>
</head>
<body>
    <div class="container">
        <h1>Eliminar Tarea</h1>
        <form action="" method="GET" class="formulario" onsubmit="return buscarTarea()">
            <div class="form-control">
                <label for="id">Nombre Tarea:</label>
                <input type="text" name="id" id="id" required>
            </div>
            <div class="form-control">
                <input type="submit" value="Buscar" class="boton">
            </div>
        </form>

        <?php
        require_once "assets/php/conexion_be.php";

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "SELECT * FROM tareas WHERE nombre = '$id'";
            $result = mysqli_query($conexion, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $nombre = $row['nombre'];
                $descripcion = $row['fecha'];
                $precio = $row['descripcion'];
        ?>
        <div class="tareas">
            <h2>Datos del Producto</h2>
            <form action="eliminar.php" method="POST" class="formulario" onsubmit="return confirmarEliminar()">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-control">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" readonly>
                </div>
                <div class="form-control">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" rows="5" readonly><?php echo $descripcion; ?></textarea>
                </div>
                <div class="form-control">
                    <input type="submit" value="Eliminar" class="boton">
                    </div>
    </form>
</div>
<?php
        } else {
            // Mostrar alerta si no se encontró la tarea
            echo "<p class='mensaje' id='alertaNoEncontrado'>No se encontró la tarea.</p>";
        }
    }

    // Verificar si se envió el formulario de eliminación
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el ID del producto a eliminar
        $id = $_POST["id"];

        // Realizar la lógica de eliminación en la base de datos
        $query = "DELETE FROM tareas WHERE nombre = '$id'";
        $result = mysqli_query($conexion, $query);

        // Verificar si la eliminación fue exitosa
        if ($result) {
            echo "<p class='mensaje'>TAREA ELIMINADA.</p>";
        } else {
            echo "<p class='mensaje'>Error al eliminar la tarea.</p>";
        }
    }
    ?>

    <a href="bienvenida.php" class="back-button">Regresar</a>

</div>
<script>
    function confirmarEliminar() {
        return confirm("¿Estás seguro de que deseas eliminar esta tarea?");
    }

    function buscarTarea() {
        var alertaNoEncontrado = document.getElementById("alertaNoEncontrado");
        if (alertaNoEncontrado) {
            alertaNoEncontrado.style.display = "none";
        }
        return true;
    }
    <a href="bienvenida.php" class="back-button">Regresar</a>
    
</script>
</body>
</html>