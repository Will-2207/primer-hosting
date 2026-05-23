<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Solidaria - Enviar Sugerencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --azul-solidario: #1e52ff;
            --verde-solidario: #63ff5e;
            --fondo-gris: #f8f9fa;
        }
        body {
            background-color: var(--fondo-gris);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .card-formulario {
            background: white;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 550px;
        }
        .card-header-custom {
            background: linear-gradient(135deg, var(--azul-solidario) 0%, var(--verde-solidario) 100%);
            padding: 40px;
            color: white;
            text-align: center;
        }
        .btn-nav-custom {
            background: linear-gradient(135deg, var(--azul-solidario) 0%, var(--verde-solidario) 100%);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 15px;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="card-formulario">
        <div class="card-header-custom">
            <i class="fas fa-paper-plane fa-4x mb-3"></i>
            <h2 class="fw-bold mb-1">Red Solidaria</h2>
            <p class="h5 opacity-75 mb-0">Envío de Datos</p>
        </div>

        <div class="card-body p-5">
            <!-- 
                IMPORTANTE: La ruta es 'controlador_/logica.php' 
                porque tu carpeta tiene un guion bajo al final según la imagen.
            -->
            <form action="controlador_/logica.php" method="POST">
                
                <div class="mb-4">
                    <label class="form-label fw-bold">Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control" placeholder="William Morales" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Teléfono</label>
                    <input type="number" name="telefono" class="form-control" placeholder="310..." required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Detalles de la Sugerencia</label>
                    <textarea name="detalles" class="form-control" rows="4" required></textarea>
                </div>

                <div class="d-grid gap-3">
                    <button type="submit" class="btn-nav-custom">
                        <i class="fas fa-flask me-2"></i> Probar var_dump
                    </button>
                    <a href="index.php" class="text-center text-decoration-none text-muted">
                        <i class="fas fa-arrow-left me-1"></i> Volver
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>