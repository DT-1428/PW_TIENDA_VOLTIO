<?php
session_start();

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';
    $accion = $_POST['accion'] ?? 'login';

    $usuarios = json_decode(file_get_contents("usuarios.json"), true);
    if (!is_array($usuarios)) $usuarios = [];

    if ($accion === 'login') {
        foreach ($usuarios as $u) {
            if ($u['usuario'] === $usuario && $u['clave'] === $clave) {
                $_SESSION['usuario'] = $usuario;
                header("Location: index.php");
                exit;
            }
        }
        $mensaje = "Usuario o contraseña incorrectos.";
    }

    if ($accion === 'registro') {
        foreach ($usuarios as $u) {
            if ($u['usuario'] === $usuario) {
                $mensaje = "El usuario ya existe.";
                break;
            }
        }
        if (empty($mensaje)) {
            $usuarios[] = ['usuario' => $usuario, 'clave' => $clave];
            file_put_contents("usuarios.json", json_encode($usuarios, JSON_PRETTY_PRINT));
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Acceso | ElectroVoltio</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
<style>
    body {
    background: #f0f2f5;
    }
    .card {
    border-radius: 1rem;
    }
    .form-icon {
    width: 45px;
    }
    .btn-primary, .btn-secondary {
    font-weight: 500;
    }
</style>
</head>
<body>

<div class="container py-5">
<div class="row justify-content-center">
    <div class="col-md-5 col-lg-4">
    <div class="card shadow-sm p-4">
        <div class="text-center mb-4">
        <i class="bi bi-person-circle" style="font-size: 3rem; color: #0d6efd;"></i>
        <h4 class="mt-2">Bienvenido</h4>
        <p class="text-muted">Inicia sesión o crea tu cuenta</p>
        </div>

        <?php if ($mensaje): ?>
            <div class="alert alert-danger text-center py-2"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <div class="input-group">
                <span class="input-group-text form-icon"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            </div>

            <div class="mb-4">
            <label for="clave" class="form-label">Contraseña</label>
            <div class="input-group">
                <span class="input-group-text form-icon"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="clave" name="clave" required>
            </div>
            </div>

            <input type="hidden" name="accion" id="accion" value="login">

            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" onclick="document.getElementById('accion').value='login'">
                <i class="bi bi-box-arrow-in-right me-1"></i> Iniciar Sesión
            </button>
            <button type="submit" class="btn btn-secondary" onclick="document.getElementById('accion').value='registro'">
                <i class="bi bi-person-plus me-1"></i> Crear Cuenta
            </button>
            </div>
        </form>

        <div class="text-center mt-4">
          <a href="index.php" class="text-decoration-none small">
            <i class="bi bi-arrow-left"></i> Volver al inicio
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>