<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrohogar</title>
    <?php
    include 'header.php'
    ?>
</head>
<body>
    <div class="row">
    <div class="col-md-4 mb-4">
        <div class="mini-container card h-100 position-relative p-2">
            <!-- Descuento -->
            <span class="badge bg-warning text-dark position-absolute" style="top:10px;left:10px;font-size:1rem;">23%</span>
            <!-- Envío gratis -->
            <span class="badge bg-primary text-white position-absolute" style="top:10px;right:10px;font-size:0.9rem;">ENVÍO GRATIS</span>
            <!-- Sello distribuidor -->
            <img src="https://i.imgur.com/1Q9Z1ZB.png" alt="Distribuidor Autorizado" style="position:absolute;top:45px;right:10px;width:40px;" title="Distribuidor Autorizado">
            <img src="./IMG/MOVILES/APPLE/IPhone 16 Pro Max 256GB Blanco.jpg" class="card-img-top mt-4" alt="Producto 1" style="object-fit:contain;height:180px;">
            <div class="card-body d-flex flex-column">
                <p class="card-text text-secondary mb-1">Apple</p>
                <h5 class="card-title mb-2" style="font-size:1.1rem;">IPhone 16 Pro Max 256GB Blanco</h5>
                <!-- Características -->
                <div class="d-flex justify-content-between mb-2" style="font-size:0.9rem;">
                    <div>
                        <i class="bi bi-camera"></i> Cámara 200MP<br>
                        <i class="bi bi-display"></i> 120Hz<br>
                        <i class="bi bi-battery-charging"></i> HyperCharge 67W
                    </div>
                </div>
                <!-- Precios -->
                <div class="mb-2">
                    <span class="text-primary fw-bold" style="font-size:1.5rem;">S/ 5999.00</span>
                    <span class="text-muted text-decoration-line-through ms-2" style="font-size:1rem;">S/ 7,799.00</span>
                    <span class="badge bg-info text-dark ms-2">Oferta</span>
                </div>
                <!-- Botón -->
                <button class="btn btn-primary btn-lg mt-auto add-to-cart fw-bold rounded" 
                    data-id="audio1" 
                    data-title="IPhone 16 Pro Max 256GB Blanco" 
                    data-price="5999.00" 
                    data-img="./IMG/MOVILES/APPLE/IPhone 16 Pro Max 256GB Blanco.jpg">
                    <i class="bi bi-cart"></i> Agregar al carrito
                </button>
            </div>
        </div>
    </div>
    <!-- ...resto de columnas... -->
</div>
</body>
</html>