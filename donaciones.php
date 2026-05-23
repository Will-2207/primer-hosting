<?php
// Ejemplo: Si quieres desactivar la página temporalmente o si algo falla
$mantenimiento = false; // Cambia a true para probar el error

if ($mantenimiento) {
    // Esto le dice al navegador que la página "no existe" para efectos prácticos
    include("404.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Donaciones - Red Solidaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: #f4f7f6; }
        .header-section { background: white; padding: 40px 0; border-bottom: 3px solid #63ff5e; margin-bottom: 40px; }
        
        /* Estilo para que la tarjeta funcione como botón */
        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .card-categoria {
            background: white; border: none; border-radius: 20px;
            padding: 30px; transition: 0.3s; border-top: 6px solid #1e52ff;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            cursor: pointer;
        }
        
        .card-categoria:hover { 
            transform: scale(1.03); 
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .btn-regresar { border-radius: 10px; padding: 10px 25px; font-weight: 600; }
    </style>
</head>
<body>
    <div class="header-section text-center">
        <div class="container">
            <h2 class="fw-bold">Categorías de Donación</h2>
            <a href="index.php" class="btn btn-outline-primary btn-regresar mt-3">
                <i class="fas fa-arrow-left"></i> Volver al Panel
            </a>
        </div>
    </div>

    <div class="container">
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <a href="404.php" class="card-link">
                    <div class="card-categoria" style="border-top-color: #51cf66;">
                        <i class="fas fa-apple-whole fa-3x text-success mb-3"></i>
                        <h4>Alimentos</h4>
                        <p class="text-muted">Control de inventario de productos básicos.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4 text-center">
                <a href="404.php" class="card-link">
                    <div class="card-categoria" style="border-top-color: #339af0;">
                        <i class="fas fa-comments-dollar fa-3x text-primary mb-3"></i>
                        <h4>Transacciones</h4>
                        <p class="text-muted">Registro de aportes monetarios y gastos.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4 text-center">
                <a href="404.php" class="card-link">
                    <div class="card-categoria" style="border-top-color: #fcc419;">
                        <i class="fas fa-shirt fa-3x text-warning mb-3"></i>
                        <h4>Ropa</h4>
                        <p class="text-muted">Ropa y textiles clasificados por estado.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>