<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página no encontrada | Red Solidaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --azul: #1e52ff; --verde: #63ff5e; }
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; height: 100vh; display: flex; align-items: center; }
        .error-container { background: white; border-radius: 20px; padding: 50px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: center; border-top: 8px solid var(--azul); }
        .error-code { font-size: 100px; font-weight: bold; background: linear-gradient(135deg, var(--azul), var(--verde)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .btn-back { background: linear-gradient(135deg, var(--azul) 0%, var(--verde) 100%); color: white; border: none; border-radius: 50px; padding: 12px 30px; font-weight: 600; text-decoration: none; transition: 0.3s; }
        .btn-back:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(30, 82, 255, 0.3); color: white; }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="col-md-6 error-container">
            <img src="Logo.jpeg" alt="Logo" height="80" class="mb-4">
            <div class="error-code">404</div>
            <h2 class="fw-bold">¡Ups! Ruta no encontrada</h2>
            <p class="text-muted mb-4">Lo sentimos, la página que buscas no existe o ha sido movida.</p>
            <a href="index.php" class="btn-back">
                <i class="fas fa-home me-2"></i> Volver al Inicio
            </a>
        </div>
    </div>
</body>
</html>