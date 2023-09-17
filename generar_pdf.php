<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Usuarios Registrados</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <style>
        body {
            background-image: url("assets/images/bg.jpg");
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
            max-width: 800px;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .form-control label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-control input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .form-control input[type="submit"] {
            background-color: #46A2FD;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-control input[type="submit"]:hover {
            background-color: #3079d8;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #46A2FD;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #3079d8;
        }

        .usuario {
            margin-top: 30px;
        }

        .usuario h2 {
            margin-bottom: 20px;
        }

        .formulario .form-control:last-child {
            text-align: center;
        }

        .boton-generar {
            background-color: #46A2FD;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .boton-generar:hover {
            background-color: #3079d8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Buscar Usuarios Registrados</h1>
        
        <form action="" method="GET" class="formulario">
            <div class="form-control">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" required>
            </div>
            <div class="form-control">
            <input type="submit" value="Buscar" class="botón">
</form>

<?php
require_once "assets/php/conexion_be.php";

if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];

    $query = "SELECT * FROM T_LOGIN WHERE usuario = '$usuario'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nombre_completo = $row['nombre_completo'];
        $correo = $row['correo'];
?>
<div class="usuario">
    <h2>Datos del Usuario</h2>
    <form action="#" method="POST" class="formulario">
        <div class="form-control">
            <label for="nombre">Nombre Completo:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre_completo; ?>" readonly>
        </div>
        <div class="form-control">
            <label for="correo">Correo Electrónico:</label>
            <input type="text" name="correo" id="correo" value="<?php echo $correo; ?>" readonly>
        </div>
        <div class="form-control">
            <a href="fotocheck.php" class="boton-generar">GENERAR FOTOCHECK</a>
        </div>
    </form>
</div>
<?php
} else {
    echo "<p class='mensaje'>No se encontró el usuario con el nombre de usuario especificado.</p>";
}
}
?>

<a href="bienvenida.php" class="back-button">Regresar</a>

</div>
</body>
</html>
            