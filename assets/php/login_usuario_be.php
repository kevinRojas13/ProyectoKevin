<?php
session_start();
include('conexion_be.php');

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$validar_login = mysqli_query($conexion, "SELECT * FROM T_LOGIN WHERE correo='$correo' AND contrasena='$contrasena'"); // CONSULT SQL

if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['usuario'] = $correo;
    header("Location: ../../bienvenida.php");
    exit();
} else {
    echo '
        <script>
            alert("ERROR NO EXISTE, VERIFIQUE BIEN SUS DATOS");
            window.location = "../../index.php";
        </script>';
    exit;
}
?>
