<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Donantes - Red Solidaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: #f4f7f6; padding-top: 50px; }
        .table-box { background: white; border-radius: 20px; padding: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .table thead { background: linear-gradient(90deg, #1e52ff, #63ff5e); color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-box">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-primary m-0">Registro de Sugerencias</h3>
                <a href="index.php" class="btn btn-dark px-4 rounded-pill">Volver</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Detalle de Sugerencia</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Leer el archivo de texto y mostrar cada línea en la tabla
                    if (file_exists('sugerencias.txt')) {
                        $lineas = file('sugerencias.txt', FILE_IGNORE_NEW_LINES);
                        $id = 1;
                        foreach ($lineas as $linea) {
                            echo "<tr>
                                    <td>00$id</td>
                                    <td>$linea</td>
                                    <td><span class='badge bg-info'>Recibido</span></td>
                                  </tr>";
                            $id++;
                        }
                    } else {
                        echo "<tr><td colspan='3' class='text-center'>No hay sugerencias aún.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
