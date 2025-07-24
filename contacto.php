<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Contacto - ElectroVoltio</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body background="./IMG/Fondo-contactos.jpg" style="background-repeat: no-repeat; background-size:100% 100%; background-attachment: fixed;">

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $correo = trim($_POST['email'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

    if ($nombre && $correo && $mensaje) {
        $registro = "Nombre: $nombre | Correo: $correo | Mensaje: $mensaje" . PHP_EOL;
        file_put_contents('mensajes.txt', $registro, FILE_APPEND);
        
        header("Location: index.php");
        exit;
    } else {
        $error = "Por favor, completa todos los campos.";
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center text-white">
            <h1 class="display-4">Contáctanos</h1>
            <p class="lead">Estamos aquí para ayudarte. Completa el formulario y nos pondremos en contacto contigo.</p>
    </div>
        <div class="col-md-6">
        <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0"><i class="bi bi-envelope-paper-fill"></i> Contáctanos</h4>
        </div>
        <div class="card-body ">

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST" action="" >
            <div class="mb-3">
                <label for="nombre" class="form-label fs-5">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fs-5">Correo electrónico:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo electrónico" required>
            </div>

            <div class="mb-3">
                <label for="mensaje" class="form-label fs-5">Mensaje:</label>
                <textarea class="form-control" name="mensaje" id="mensaje" rows="4" placeholder="Ingrese su mensaje" required></textarea>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary w-50 py-3  fs-5 mx-auto">
                <i class="bi bi-send"></i> Enviar mensaje
                </button>
            </div>
            <div class="d-grid">
                <a href="index.php" class="btn btn-outline-secondary w-50 py-3 fs-5 mx-auto">
                    <i class="bi bi-arrow-left-circle" ></i> Regresar al inicio
                </a>
            </div>
            </form>

                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-4">
    <p class="mb-0 text-white">© 2025 ElectroVoltio. Todos los derechos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
