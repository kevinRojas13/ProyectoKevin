<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url("assets/images/bg2.jpg");
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
            background: white;
            padding: 20px;
            border-radius: 10px;
        }
        
        h1 {
            color: #46A2FD;
        }
        
        .formulario {
            margin-top: 20px;
        }
        
        .form-control {
            margin-bottom: 10px;
        }
        
        .form-control label {
            display: block;
            font-weight: 500;
        }
        
        .form-control input[type="text"],
        .form-control input[type="number"],
        .form-control textarea {
            width: 100%;
            padding: 10px;
            border: none;
            background: #F2F2F2;
            font-size: 16px;
            outline: none;
        }
        
        .boton {
            padding: 10px 40px;
            margin-top: 10px;
            border: none;
            font-size: 14px;
            background: #46A2FD;
            font-weight: 600;
            cursor: pointer;
            color: white;
            outline: none;
            transition: background-color 0.3s;
        }
        
        .boton:hover {
            background-color: #2196F3;
        }
        
        .producto {
            margin-top: 20px;
            background: #F2F2F2;
            padding: 20px;
            border-radius: 10px;
        }
        
        .producto h2 {
            color: #46A2FD;
        }
        
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            background: #46A2FD;
            font-weight: 600;
            cursor: pointer;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .back-button:hover {
            background-color: #2196F3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Actualizar Producto</h1>
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
            <form action="actualizar.php" method="POST" class="formulario">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-control">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" required>
                </div>
                <div class="form-control">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" rows="5" required><?php echo $descripcion; ?></textarea>
                </div>
                <div class="form-control">
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" value="<?php echo $precio; ?>" required>
                </div>
                <div class="form-control">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" id="stock" value="<?php echo $stock; ?>" required>
                </div>
                <div class="form-control">
                    <input type="submit" value="Actualizar" class="boton">
                </div>
            </form>
        </div>
<?php
    } else {
        echo "No se encontró el producto con el ID especificado.";
    }
}

// Verificar si se envió el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    // Realizar la lógica de actualización en la base de datos
    $query = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', stock = '$stock' WHERE id_producto = '$id'";
    $result = mysqli_query($conexion, $query);

    // Verificar si la actualización fue exitosa
    if ($result) {
        echo "<p>Producto actualizado exitosamente.</p>";
    } else {
        echo "<p>Error al actualizar el producto.</p>";
    }
}
?>

<a href="bienvenida.php" class="back-button">Regresar</a>

</div>
</body>
</html>
        
        
        