<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $linea = "Nombre: " . $_POST['nombre'] . " | Tel: " . $_POST['telefono'] . " | Sug: " . $_POST['detalles'] . "\n";
    file_put_contents('sugerencias.txt', $linea, FILE_APPEND);
    header("Location: index.php?status=success");
}
?>