<?php

include ('conexion_be.php'); 

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$query = "INSERT INTO USUARIOS (nombre_completo,correo,usuario,contrasena)
        VALUES('$nombre_completo','$correo','$usuario','$contrasena')";

$verificar_correo = mysqli_query($conexion,"SELECT*FROM USUARIOS  WHERE correo= '$correo'");
if(mysqli_num_rows($verificar_correo)>0){
    echo'
        <script>
            alert("Correo ya existente"); // CONDICIONAL
            window.location = "../../index.php";
        </script>
    ';
    exit();
}
$verificar_usuario = mysqli_query($conexion,"SELECT*FROM USUARIOS  WHERE usuario= '$usuario'");
if(mysqli_num_rows($verificar_usuario)>0){
    echo'
        <script>
            alert("usuario ya existente");
            window.location = "../../index.php";
        </script>
    ';
    exit();
}
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
        <script>
            alert("Usuario Registrado");
            window.location = "../../index.php";
        </script>';
} else {
    echo '
        <script>
            alert("ERROR");
            window.location = "../../index.php";
        </script>';
}

mysqli_close($conexion);

?>