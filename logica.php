<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Práctica 1 - Despliegue en sitio Render o Railway</title>
</head>
<body>
<?php

try{
    $imagenes = [
    "img1.jpg",
    "img2.jpg",
    "img3.jpg",
    "img4.jpg",
    "img5.jpg"
    ];
    $imagenAleatoria = $imagenes[array_rand($imagenes)];
?>
    <center>
        <h2>Bienvenido <?php echo $_POST["nombre"]; ?></h2>
        <img src="imagenes/<?php echo $imagenAleatoria; ?>" alt="Imagen aleatoria" width="800px">
    </center>

<?php
}
catch(exception $e){
    echo "<center><h3 style='border:1px solid red;background-color:rgb(213,57,48);color:white;padding:1%;'>Servidor ocupado, intente más tarde</h3></center>";
}

include "index.html";
?>
</body>
</html>
