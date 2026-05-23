<?php
// Conexión desactivada temporalmente para evitar bloqueos de red en el servidor.
// Todo tu diseño y estructura se mantienen intactos.
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
        
        .btn-nav-custom { 
            background: linear-gradient(135deg, var(--azul-solidario) 0%, var(--verde-solidario) 100%); 
            color: white; border: none; border-radius: 50px; padding: 10px 28px; font-weight: 600; 
            transition: 0.4s ease; text-decoration: none; display: inline-flex; align-items: center; cursor: pointer;
            box-shadow: 0 4px 15px rgba(30, 82, 255, 0.3);
        }
        .btn-nav-custom:hover { transform: scale(1.05); color: white; }

        .header-dashboard { 
            background: linear-gradient(135deg, var(--azul-solidario) 0%, var(--verde-solidario) 100%); 
            border-radius: 24px; padding: 60px 40px; color: white; margin-top: 30px; 
            position: relative; overflow: hidden;
            box-shadow: 0 15px 35px rgba(30, 82, 255, 0.2);
        }

        .header-dashboard::before {
            content: ""; position: absolute; top: -30px; right: -30px; width: 180px; height: 180px;
            background: rgba(255, 255, 255, 0.15); border-radius: 50%;
        }

        .logo-circle-container { position: relative; display: inline-block; }
        .logo-circle-container img { 
            width: 135px; height: 135px; border-radius: 50%; 
            border: 5px solid white; object-fit: cover; 
            background: white; padding: 3px;
            transition: 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        .logo-circle-container:hover img { transform: rotate(-8deg) scale(1.1); }

        .header-text h1 { font-size: 3.8rem; font-weight: 800; letter-spacing: -1.5px; text-shadow: 3px 3px 6px rgba(0,0,0,0.15); }
        .badge-adso { 
            background: rgba(0, 0, 0, 0.15); backdrop-filter: blur(12px);
            padding: 10px 25px; border-radius: 50px; font-size: 1.15rem; border: 1px solid rgba(255,255,255,0.4);
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .menu-card { background: white; border-radius: 22px; padding: 45px; text-align: center; text-decoration: none; color: #333; display: block; transition: 0.4s; border: 1px solid rgba(0,0,0,0.05); }
        .menu-card:hover { transform: translateY(-15px); box-shadow: 0 20px 40px rgba(0,0,0,0.12); }
        .menu-card i { font-size: 60px; margin-bottom: 25px; background: -webkit-linear-gradient(var(--azul-solidario), var(--verde-solidario)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        
        .modal-content { border-radius: 28px; border: none; }
        .modal-header { background: linear-gradient(135deg, var(--azul-solidario) 0%, var(--verde-solidario) 100%); color: white; border: none; padding: 30px; }
        
        .main-content { flex: 1; }
        .footer-solidario { background: white; padding: 40px 0 20px 0; margin-top: 50px; box-shadow: 0 -5px 20px rgba(0,0,0,0.05); border-radius: 40px 40px 0 0; }
        .footer-logo { font-weight: 800; color: var(--azul-solidario); font-size: 1.5rem; }
        .tech-stack { font-size: 0.85rem; color: #aaa; margin-top: 20px; display: flex; justify-content: center; gap: 20px; align-items: center; }
        .tech-item { display: flex; align-items: center; gap: 6px; }
    </style>
</head>
<body>

    <div class="main-content">
        <?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div class="alert alert-success alert-dismissible fade show container mt-4 shadow-sm border-0" role="alert" style="border-radius: 15px;">
                <i class="fas fa-check-circle me-2"></i> <strong>¡Enviado con éxito!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <nav class="navbar navbar-custom">
            <div class="container d-flex justify-content-between align-items-center">
                <a href="index.php"><img src="Logo.jpeg" alt="Red Solidaria" height="65"></a>
                <div class="d-flex gap-3">
                    <button class="btn-nav-custom" data-bs-toggle="modal" data-bs-target="#modalFormulario">
                        <i class="fas fa-paper-plane me-2"></i> Sugerencias
                    </button>
                </div>
            </div>
        </nav>

        <div class="container text-center">
            <div class="header-dashboard">
                <div class="row align-items-center position-relative" style="z-index: 2;">
                    <div class="col-md-auto mb-4 mb-md-0">
                        <div class="logo-circle-container">
                            <img src="Logo.jpeg" alt="Logo">
                        </div>
                    </div>
                    <div class="col-md header-text ps-md-4 text-md-start">
                        <h1 class="mb-2">Red Solidaria</h1>
                        <div class="d-inline-block">
                            <span class="badge-adso">
                                <i class="fas fa-user-tie me-2"></i> Panel ADSO - <strong>William Morales</strong>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row g-4 mt-4 mb-5 text-start">
                <div class="col-md-6">
                    <a href="donaciones.php" class="menu-card">
                        <i class="fas fa-box-open"></i>
                        <h3 class="fw-bold">Gestión de Donaciones</h3>
                        <p class="text-muted">Administra el inventario de la fundación de manera eficiente.</p>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="donantes.php" class="menu-card">
                        <i class="fas fa-hand-holding-heart"></i>
                        <h3 class="fw-bold">Nuestros Donantes</h3>
                        <p class="text-muted">Consulta, registra y fideliza a tus colaboradores solidarios.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-solidario">
        <div class="container text-center">
            <div class="footer-logo mb-2"><i class="fas fa-heart text-danger me-2"></i>Red Solidaria</div>
            <p class="text-muted mb-0">© 2026 Desarrollado por <strong>William Morales</strong> | ADSO</p>
        </div>
    </footer>

    <div class="modal fade" id="modalFormulario" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><i class="fas fa-edit me-2"></i> Nueva Sugerencia</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="guardar.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre Completo</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Teléfono</label>
                            <input type="number" name="telefono" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Sugerencia</label>
                            <textarea name="detalles" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn-nav-custom justify-content-center py-3">
                                <i class="fas fa-save me-2"></i> Guardar Datos
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
