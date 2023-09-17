<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <style>
        /* Agrega aquí el contenido del archivo.css que me proporcionaste */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-image: url(../images/bg3.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }

        .container {
            width: 100%;
            padding: 20px;
            margin: auto;
            margin-top: 100px;
        }

        .formulario {
            width: 100%;
            padding: 80px 20px;
            background: white;
            position: absolute;
            border-radius: 20px;
        }

        .formulario h1 {
            font-size: 30px;
            text-align: center;
            margin-bottom: 20px;
            color: #46A2FD;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .form-control label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #46A2FD;
        }

        .form-control input[type="text"],
        .form-control input[type="number"],
        .form-control textarea {
            width: 100%;
            margin-top: 5px;
            padding: 10px;
            border: none;
            background: #F2F2F2;
            font-size: 16px;
            outline: none;
        }

        .form-control input[type="submit"],
        .boton {
            padding: 10px 40px;
            margin-top: 20px;
            border: none;
            font-size: 14px;
            background: #46A2FD;
            font-weight: 600;
            cursor: pointer;
            color: white;
            outline: none;
        }

        .mensaje {
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            color: #46A2FD;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 14px;
            background: #46A2FD;
            font-weight: 600;
            cursor: pointer;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button:hover {
            background: #fff;
            color: #46A2FD;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Eliminar Producto</h1>
        <form action="" method="GET" class="formulario">
            <div class="form-control">
                <label for="id">ID del Producto:</label>
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

            $query = "SELECT * FROM productos WHERE id_producto = '$id'";
            $result = mysqli_query($conexion, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $nombre = $row['nombre'];
                $descripcion = $row['descripcion'];
                $precio = $row['precio'];
                $stock = $row['stock'];
        ?>
        <div class="producto">
            <h2>Datos del Producto</h2>
            <form action="eliminar.php" method="POST" class="formulario">
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
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" value="<?php echo $precio; ?>" readonly>
                </div>
                <div class="form-control">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" id="stock" value="<?php echo $stock; ?>" readonly>
                </div>
                <div class="form-control">
                    <input type="submit" value="Eliminar" class="boton">
                </div>
            </form>
        </div>
        <?php
            } else {
                echo "<p class='mensaje'>No se encontró el producto con el ID especificado.</p>";
            }
        }

        // Verificar si se envió el formulario de eliminación
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener el ID del producto a eliminar
            $id = $_POST["id"];

            // Realizar la lógica de eliminación en la base de datos
            $query = "DELETE FROM productos WHERE id_producto = '$id'";
            $result = mysqli_query($conexion, $query);

            // Verificar si la eliminación fue exitosa
            if ($result) {
                echo "<p class='mensaje'>Producto eliminado exitosamente.</p>";
            } else {
                echo "<p class='mensaje'>Error al eliminar el producto.</p>";
            }
        }
        ?>

        <a href="bienvenida.php" class="back-button">Regresar</a>

    </div>
</body>
</html>