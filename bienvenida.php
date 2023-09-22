<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: url("assets/images/bg1.jpg");
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
</head>
<body>
    <div class="container">
        <h1>¿LISTADO DE TAREAS?</h1>
        <div class="button-group">
            <a href="insertar.php">INSERTAR TAREAS</a>
            <a href="actualizar.php">MODOFICAR TAREAS</a>
            <a href="vizualizar.php" class="middle-button">Vizualizar</a>
            <a href="eliminar.php">ELIMINAR</a>
            <a href="index.php">Cerrar Cesión</a>
        </div>
    </div>
</body>
</html>