<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Galería 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <form action="logica.php?galeria=2" method="post">
        <div class="mb-3">
            <label class="form-label">Ingrese su nombre:</label>
            <input type="text" name="nombre" required class="form-control">
        </div>
        <button type="submit" class="btn btn-secondary">Ver Galería 2</button>
        <a href="index.php" class="btn btn-link">Volver al inicio</a>
    </form>
</body>
</html>