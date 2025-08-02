<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 " IMG>
    <title>ELECTROVOLTIO</title>
    <?php
    include 'header.php'
    ?>
</head>
<body>
    <div>
    <?php
    include 'carrusel.php';
    include 'componentes/contenedor_sup.php';
    ?>
    </div> 

    <div class="container">
    <h2 class="text-center my-5">MÓVILES</h2>

    <!-- FILA 1 -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="./IMG/MOVILES/APPLE/IPhone 16 Pro Max 256GB Blanco.jpg" class="card-img-top" alt="Producto 1">
                <div class="card-body d-flex flex-column">
                    <p class="card-text">APPLE</p>
                    <h5 class="card-title">IPhone 16 Pro Max 256GB Blanco</h5>
                    <span class="text-center text-primary fw-bold border border-primary rounded px-4 py-2"><h3>S/ 5999.00</h3></span>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="./IMG/MOVILES/APPLE/IPhone 16 Pro 128GB Negro.jpg" class="card-img-top" alt="Producto 1">
                <div class="card-body d-flex flex-column">
                    <p class="card-text">APPLE</p>
                    <h5 class="card-title">IPhone 16 Pro 128GB Negro</h5>
                    <span class="text-center text-primary fw-bold border border-primary rounded px-4 py-2"><h3>S/ 4999.00</h3></span>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="./IMG/MOVILES/SAMSUNG/Samsung S25 ULTRA TITANIO.jpg" class="card-img-top" alt="Producto 1">
                <div class="card-body d-flex flex-column">
                    <p class="card-text">SAMSUNG</p>
                    <h5 class="card-title">Samsung Galaxy S25 Ultra 256GB Titaniun</h5>
                    <span class="text-center text-primary fw-bold border border-primary rounded px-4 py-2"><h3>S/ 6599.00</h3></span>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<footer>
<div>
    <?php
    include 'footer.php';
    ?>
</div> 
</footer>
</html>