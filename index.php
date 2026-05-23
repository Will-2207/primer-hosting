<?php
// Conexión desactivada por restricciones de red en el despliegue
// El sistema ahora utiliza persistencia en archivo plano (sugerencias.txt)
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Solidaria - Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --azul-solidario: #1e52ff; --verde-solidario: #63ff5e; --fondo-gris: #f8f9fa; }
        body { background-color: var(--fondo-gris); font-family: 'Segoe UI', sans-serif; margin: 0; display: flex; flex-direction: column; min-height: 100vh; }
        .navbar-custom { background: white; padding: 12px 0; box-shadow: 0 4px 20px rgba(0,0,0,0.08); position: sticky; top: 0; z-index: 1000; }
        .btn-nav-custom { background: linear-gradient(135deg, var(--azul-solidario) 0%, var(--verde-solidario) 100%); color: white; border: none; border-radius: 50px; padding: 10px 28px; font-weight: 600; transition: 0.4s ease; text-decoration: none; display: inline-flex; align-items: center; cursor: pointer; box-shadow: 0 4px 15px rgba(30, 82, 255, 0.3); }
        .btn-nav-custom:hover { transform: scale(1.05); color: white; }
        .header-dashboard { background: linear-gradient(135deg, var(--azul-solidario) 0%, var(--verde-solidario) 100%); border-radius: 24px; padding: 60px 40px; color: white; margin-top: 30px; position: relative; overflow: hidden; box-shadow: 0 15px 35px rgba(30, 82, 255, 0.2); }
        .logo-circle-container img { width: 135px; height: 135px; border-radius: 50%; border: 5px solid white; object-fit: cover; background: white; padding: 3px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
        .menu-card { background: white; border-radius: 22px; padding: 45px; text-align: center; text-decoration: none; color: #333; display: block; transition: 0.4s; border: 1px solid rgba(0,0,0,0.05); }
        .menu-card:hover { transform: translateY(-15px); box-shadow: 0 20px 40px rgba(0,0,0,0.12); }
        .modal-header { background: linear-gradient(135deg, var(--azul-solidario) 0%, var(--verde-solidario) 100%); color: white; }
    </style>
</head>
<body>

    <div class="container mt-4">
        <?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div class="alert alert-success">¡Sugerencia guardada correctamente!</div>
        <?php endif; ?>

        <nav class="navbar navbar-custom rounded-pill px-4">
            <a href="index.php"><img src="Logo.jpeg" alt="Logo" height="40"></a>
            <button class="btn-nav-custom" data-bs-toggle="modal" data-bs-target="#modalFormulario">
                <i class="fas fa-paper-plane me-2"></i> Sugerencias
            </button>
        </nav>

        <div class="header-dashboard text-center">
            <h1>Red Solidaria</h1>
            <p>Panel de Control - ADSO</p>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-md-6"><a href="donaciones.php" class="menu-card"><h3>Donaciones</h3></a></div>
            <div class="col-md-6"><a href="donantes.php" class="menu-card"><h3>Donantes</h3></a></div>
        </div>
    </div>

    <div class="modal fade" id="modalFormulario" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5>Nueva Sugerencia</h5></div>
                <div class="modal-body">
                    <form action="guardar.php" method="POST">
                        <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre" required>
                        <input type="number" name="telefono" class="form-control mb-3" placeholder="Teléfono" required>
                        <textarea name="detalles" class="form-control mb-3" placeholder="Tu sugerencia..." required></textarea>
                        <button type="submit" class="btn btn-primary w-100">Guardar Datos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
