<?php 
// 1. Configuración de conexión con los datos de InfinityFree
$host = 'sql301.infinityfree.com';
$user = 'if0_41748799'; 
$pass = 'EwRqODcbLg'; 
$db   = 'if0_41748799_donaciones'; 
$port = '3306';

$mensaje = "";
$estado = "info";
$sugerencias = [];

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4;port=$port";
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre   = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $detalles = $_POST['detalles'];

        $sql = "INSERT INTO form_sugerencias (nombre, telefono, detalles) VALUES (:nom, :tel, :det)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nom', $nombre);
        $stmt->bindParam(':tel', $telefono);
        $stmt->bindParam(':det', $detalles);

        if ($stmt->execute()) {
            $mensaje = "¡Registro exitoso! Redirigiendo al panel de gestión...";
            $estado = "success";
            header("Refresh: 3; url=panel_admin.php?status=success");
        }
    }

    $sql_list = "SELECT * FROM form_sugerencias ORDER BY id DESC";
    $stmt_list = $con->query($sql_list);
    $sugerencias = $stmt_list->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    http_response_code(500); 
    include "../500.php"; 
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Solidaria - Panel de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #1e52ff, #63ff5e);
            --glass-bg: rgba(255, 255, 255, 0.15);
        }

        body { background-color: #f0f2f5; font-family: 'Inter', 'Segoe UI', sans-serif; }

        /* NUEVO NAVBAR MEJORADO */
        .modern-nav {
            background: var(--primary-gradient);
            padding: 1rem 0;
            margin-bottom: 2.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand-section {
            color: white;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            background: white;
            color: #1e52ff;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 1.4rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .brand-text h1 {
            font-size: 1.25rem;
            margin: 0;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .brand-text span {
            font-size: 0.85rem;
            opacity: 0.9;
            text-transform: uppercase;
        }

        .user-profile {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            padding: 8px 20px;
            border-radius: 50px;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .user-profile:hover {
            background: rgba(255,255,255,0.25);
            transform: translateY(-2px);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            background: white;
            color: #1e52ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* ESTILOS DE TABLA Y CARDS */
        .card-custom { 
            border-radius: 20px; 
            border: none; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.05); 
            background: white;
        }

        .table thead {
            background-color: #f8fafc;
        }

        .table th {
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            color: #64748b;
            padding: 1.2rem 1rem;
        }

        .badge-user { 
            background: #eef2ff; 
            color: #4338ca; 
            font-weight: 600;
            border: 1px solid #e0e7ff;
        }

        .search-container .input-group {
            border-radius: 15px;
            overflow: hidden;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .search-container .input-group:focus-within {
            border-color: #1e52ff;
            box-shadow: 0 0 0 4px rgba(30, 82, 255, 0.1);
        }
    </style>
</head>
<body>

    <nav class="modern-nav">
        <div class="container nav-content">
            <div class="brand-section">
                <div class="brand-icon">
                    <i class="fas fa-server"></i>
                </div>
                <div class="brand-text">
                    <h1>Gestión de Datos</h1>
                    <span>Red Solidaria • v2.0</span>
                </div>
            </div>

            <div class="user-profile">
                <div class="user-avatar">W</div>
                <div class="d-none d-md-block">
                    <small class="d-block" style="font-size: 0.7rem; opacity: 0.8;">Desarrollador</small>
                    <span class="fw-bold">William Morales | ADSO</span>
                </div>
                <i class="fas fa-chevron-down ms-2 fs-xs" style="font-size: 0.7rem;"></i>
            </div>
        </div>
    </nav>

    <div class="container">
        
        <?php if ($mensaje): ?>
        <div class="alert alert-<?php echo $estado; ?> border-0 shadow-sm mb-4 animate__animated animate__fadeIn">
            <i class="fas <?php echo ($estado == 'success') ? 'fa-check-circle' : 'fa-exclamation-triangle'; ?> me-2"></i> 
            <?php echo $mensaje; ?>
        </div>
        <?php endif; ?>

        <div class="row justify-content-center mb-5 search-container">
            <div class="col-md-7">
                <div class="input-group shadow-sm bg-white">
                    <span class="input-group-text bg-white border-0 ps-4">
                        <i class="fas fa-filter text-primary"></i>
                    </span>
                    <input type="text" id="busqueda" class="form-control border-0 py-3" 
                           placeholder="Buscar por nombre de donante o número de contacto...">
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Donante</th>
                                <th>Contacto</th>
                                <th>Sugerencia / Detalle</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaSugerencias">
                            <?php if (count($sugerencias) > 0): ?>
                                <?php foreach ($sugerencias as $row): ?>
                                <tr>
                                    <td class="ps-4 text-muted fw-bold">#<?php echo $row['id']; ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-user p-2 px-3 rounded-pill">
                                                <i class="far fa-user me-2"></i><?php echo htmlspecialchars($row['nombre']); ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="fw-medium text-secondary">
                                        <i class="fab fa-whatsapp text-success me-1"></i> <?php echo htmlspecialchars($row['telefono']); ?>
                                    </td>
                                    <td class="text-wrap text-muted" style="max-width: 350px; font-size: 0.9rem;">
                                        <?php echo htmlspecialchars($row['detalles']); ?>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-light text-danger btn-sm rounded-circle shadow-sm" style="width: 35px; height: 35px;">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <img src="https://illustrations.popsy.co/gray/no-messages.svg" alt="Sin datos" style="width: 150px; opacity: 0.5;">
                                        <p class="mt-3 text-muted">No se encontraron registros en el sistema.</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 mb-5">
            <a href="../index.php" class="btn btn-outline-secondary rounded-pill px-5">
                <i class="fas fa-home me-2"></i> Volver al Portal Principal
            </a>
        </div>
    </div>

    <script>
        document.getElementById('busqueda').addEventListener('keyup', function() {
            let filtro = this.value.toLowerCase();
            let filas = document.querySelectorAll('#tablaSugerencias tr');

            filas.forEach(fila => {
                if(fila.cells.length > 1) { // Evita la fila de "No hay registros"
                    let nombre = fila.cells[1].textContent.toLowerCase();
                    let telefono = fila.cells[2].textContent.toLowerCase();
                    fila.style.display = (nombre.includes(filtro) || telefono.includes(filtro)) ? "" : "none";
                }
            });
        });
    </script>

</body>
</html>