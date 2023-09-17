<?php
require_once "assets/php/conexion_be.php";
require('fpdf.php');

if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];

    $query = "SELECT * FROM T_LOGIN WHERE usuario = '$usuario'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nombre_completo = $row['nombre_completo'];
        $correo = $row['correo'];

        // Crear PDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Estilos
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetFillColor(46, 162, 253);
        $pdf->SetTextColor(255, 255, 255);

        // Título
        $pdf->Cell(0, 10, 'Fotocheck', 0, 1, 'C', true);

        // Agregar imagen
        $pdf->Image('ruta/de/la/foto/'.$usuario.'.jpg', 10, 30, 50, 50, 'JPG');

        // Datos del usuario
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Nombre Completo: '.$nombre_completo, 0, 1);
        $pdf->Cell(0, 10, 'Correo Electrónico: '.$correo, 0, 1);
        $pdf->Cell(0, 10, 'Usuario: '.$usuario, 0, 1);

        // Salida del PDF
        $pdf->Output();
        exit();
    } else {
        echo "<p class='mensaje'>No se encontró el usuario con el nombre de usuario especificado.</p>";
    }
}
?>