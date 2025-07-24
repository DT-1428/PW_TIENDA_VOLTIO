
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroVoltio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #042f71ff;">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="./index.php" style="font-weight: bold; font-size: 1.5rem; letter-spacing: 1px;">
            <img src="./IMG/logo.png" width="100" class="me-2">
            <div style="line-height: 1; margin-top: -4px;">
                <span style="font-size: 1.5rem; display: block; margin-bottom: -8px;">ELECTROVOLTIO</span>
                <small style="font-size: 0.85rem;">Tu tienda, tu hogar...</small>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTienda" aria-controls="navbarTienda" aria-expanded="false" aria-label="Abrir menú">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTienda">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="./index.php" style="font-weight: 600;">Inicio</a></li>
                <li class="nav-item"><a class="nav-link active" href="./computadoras.php" style="font-weight: 600;">Computadoras</a></li>
                <li class="nav-item"><a class="nav-link active" href="./electrohogar.php" style="font-weight: 600;">Electrohogar</a></li>
                <li class="nav-item"><a class="nav-link active" href="./moviles.php" style="font-weight: 600;">Móviles</a></li>
                <li class="nav-item"><a class="nav-link active" href="./TV.php" style="font-weight: 600;">TV</a></li>
                <li class="nav-item"><a class="nav-link active" href="./sonido.php" style="font-weight: 600;">Sonido</a></li>
                <li class="nav-item"><a class="nav-link active" href="./contacto.php" style="font-weight: 600;">Contacto</a></li>
            </ul>

            <form class="d-flex me-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Buscar">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>

            <a href="#" class="btn btn-light">
                <i class="bi bi-cart"></i> Carrito
            </a>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>
