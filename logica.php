<?php 
// 1. Configuración de conexión con los datos de InfinityFree
$host = 'sql301.infinityfree.com';
$user = 'if0_41748799'; 
$pass = 'EwRqODcbLg'; 
$db   = 'if0_41748799_donaciones'; 
$port = '3306';

$mensaje = "";
$estado = "info";

// EL TRY-CATCH: Aquí atrapamos cualquier error para lanzar el Error 500
try {
    // 2. Establecer conexión usando PDO
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4;port=$port";
    $con = new PDO($dsn, $user, $pass);
    
    // Configurar para que lance excepciones en caso de error
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 3. Procesar el envío del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre   = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $detalles = $_POST['detalles'];

        // Preparar la sentencia SQL para evitar inyecciones
        $sql = "INSERT INTO form_sugerencias (nombre, telefono, detalles) VALUES (:nom, :tel, :det)";
        $stmt = $con->prepare($sql);
        
        $stmt->bindParam(':nom', $nombre);
        $stmt->bindParam(':tel', $telefono);
        $stmt->bindParam(':det', $detalles);

        if ($stmt->execute()) {
            $mensaje = "¡Registro exitoso! Redirigiendo al panel de gestión...";
            $estado = "success";
            
            // REDIRECCIÓN AUTOMÁTICA AL PANEL
            header("Refresh: 3; url=panel_admin.php?status=success");
        }
    }
} catch (PDOException $e) {
    // 1. Definimos el estado técnico
    http_response_code(500); 

    // 2. Usamos "../" para salir de 'controlador_' y llegar a la raíz donde está 500.php
    include "../500.php"; 
    
    // 3. Importante para detener el proceso
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Solidaria - Procesando</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .nav-status { background: linear-gradient(135deg, #1e52ff, #63ff5e); color: white; padding: 15px; }
        .card-custom { border-radius: 20px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

    <nav class="nav-status shadow-sm mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="fw-bold"><i class="fas fa-database me-2"></i> Procesador de Datos - Red Solidaria</span>
            <span class="badge bg-light text-dark">William Morales | ADSO</span>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                
                <!-- Alerta de estado controlada por el Try-Catch -->
                <div class="alert alert-<?php echo $estado; ?> border-0 shadow-sm mb-4 p-4">
                    <i class="fas <?php echo ($estado == 'success') ? 'fa-check-circle fa-3x' : 'fa-exclamation-triangle fa-3x'; ?> mb-3"></i> 
                    <h4><?php echo $mensaje; ?></h4>
                </div>

                <div class="card card-custom py-4">
                    <div class="card-body">
                        <?php if($estado == 'success'): ?>
                            <div class="spinner-border text-success mb-3" role="status"></div>
                            <p>Estamos preparando el panel para que veas tu sugerencia...</p>
                        <?php else: ?>
                            <p class="text-muted">Hubo un problema técnico al conectar con la base de datos de InfinityFree.</p>
                            <a href="../index.php" class="btn btn-danger rounded-pill px-5">Reintentar</a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>