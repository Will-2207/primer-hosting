<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<?php
$galeria = $_GET['galeria'];
// Definimos los arrays según la galería
$imagenes = ($galeria == 1) ? ["img1.jpg", "img2.jpg"] : ["p1.jpg", "p2.jpg"];
$imagenAleatoria = $imagenes[array_rand($imagenes)];
?>

<center>
    <h2>Bienvenido <?php echo htmlspecialchars($_POST["nombre"]); ?></h2>
    <img src="imagenes/<?php echo $imagenAleatoria; ?>" alt="Imagen" width="500px">
    <br><br>
    <a href="index.php" class="btn btn-info">Ir al Inicio</a>
</center>
</body>
</html>