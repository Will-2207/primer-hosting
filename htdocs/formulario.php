<?php
// Lógica para mostrar mensajes después de enviar
$mensaje = "";
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        $mensaje = "<div class='alert alert-success'>¡Gracias! Tu mensaje ha sido enviado con éxito.</div>";
    } elseif ($_GET['status'] == 'error') {
        $mensaje = "<div class='alert alert-danger'>Hubo un error al enviar. Por favor, intenta de nuevo.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - Red Solidaria</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: #f0f2f5; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-container { 
            max-width: 600px; 
            margin: 60px auto; 
            background: #ffffff; 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.08); 
        }
        .header-solidaria {
            border-bottom: 3px solid #e63946;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .btn-solidario { 
            background-color: #e63946; 
            color: white; 
            border: none; 
            font-weight: 600;
            padding: 12px;
            transition: 0.3s;
        }
        .btn-solidario:hover { 
            background-color: #d62828; 
            color: white; 
            transform: translateY(-2px);
        }
        .form-label { font-weight: 500; color: #457b9d; }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <div class="header-solidaria text-center">
            <h2 style="color: #1d3557; font-weight: 800;">RED SOLIDARIA</h2>
            <p class="text-muted">Conectando voluntades, transformando realidades.</p>
        </div>

        <!-- Mostrar mensaje de éxito o error si existe -->
        <?php echo $mensaje; ?>
        
        <form action="procesar.php" method="POST">
            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" placeholder="Juan Pérez" maxlength="100" required>
            </div>

            <!-- Campo Teléfono -->
            <div class="mb-4">
                <label for="telefono" class="form-label">Teléfono de Contacto</label>
                <div class="input-group">
                    <span class="input-group-text">+</span>
                    <input type="number" class="form-control form-control-lg" id="telefono" name="telefono" placeholder="Ej: 1122334455" required>
                </div>
                <div class="form-text">Incluye el código de área sin el 0.</div>
            </div>

            <!-- Campo Detalles -->
            <div class="mb-4">
                <label for="detalles" class="form-label">¿En qué podemos ayudarte o qué quieres sugerir?</label>
                <textarea class="form-control" id="detalles" name="detalles" rows="4" placeholder="Escribe aquí tu mensaje..." maxlength="10000"></textarea>
            </div>

            <div class="d-grid mt-2">
                <button type="submit" class="btn btn-solidario btn-lg">ENVIAR SOLICITUD</button>
            </div>
        </form>
        
        <div class="text-center mt-4">
            <small class="text-muted">Tus datos serán tratados con total confidencialidad.</small>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>