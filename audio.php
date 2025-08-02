<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonido</title>
    <?php
    include 'header.php'
    ?>
</head>

<body>
    <div class="position-relative" style="height:550px;">
        <img src="./IMG/IMG externos./Audio.jpg" class="d-block w-100 h-100" style="object-fit:cover;" alt="...">
    </div>
    <div style="height:40px; width:100%; background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(255, 255, 255, 1));"></div>

    <div class="container">
        <h2 class="subtitulo">AUDIO</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="./IMG/celu.jpg" class="card-img-top" alt="Producto 1">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Producto 1</h5>
                        <p class="card-text">Descripción breve del producto 1.</p>
                        <div class="text-center mt-auto">
                            <span class="badge bg-primary fs-5">S/ 999.00</span>

                            <button class="btn btn-success btn-sm mt-2 add-to-cart"
                                data-id="audio1"
                                data-title="Producto 1"
                                data-price="999.00"
                                data-img="./IMG/celu.jpg">Agregar al carrito
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="./IMG/celu.jpg" class="card-img-top" alt="Producto 2">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Producto 2</h5>
                        <p class="card-text">Descripción breve del producto 2.</p>
                        <div class="text-center mt-auto">
                            <span class="badge bg-primary fs-5">S/ 799.00</span>

                            <button class="btn btn-success btn-sm mt-2 add-to-cart"
                                data-id="audio2"
                                data-title="Producto 2"
                                data-price="799.00"
                                data-img="./IMG/celu.jpg">Agregar al carrito
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="./IMG/celu.jpg" class="card-img-top" alt="Producto 3">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Producto 3</h5>
                        <p class="card-text">Descripción breve del producto 3.</p>
                        <div class="text-center mt-auto">
                            <span class="badge bg-primary fs-5">S/ 599.00</span>

                            <button class="btn btn-success btn-sm mt-2 add-to-cart"
                                data-id="audio3"
                                data-title="Producto 3"
                                data-price="599.00"
                                data-img="./IMG/celu.jpg">Agregar al 
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.add-to-cart').forEach(btn => {
            btn.addEventListener('click', function() {
                let id = this.dataset.id;
                let title = this.dataset.title;
                let price = parseFloat(this.dataset.price);
                let img = this.dataset.img;
                let cart = JSON.parse(localStorage.getItem('cart') || '[]');
                let found = cart.find(p => p.id === id);
                if (found) {
                    found.qty += 1;
                } else {
                    cart.push({
                        id,
                        title,
                        price,
                        img,
                        qty: 1
                    });
                }
                localStorage.setItem('cart', JSON.stringify(cart));
                alert('Producto agregado al carrito');
            });
        });
    </script>

</body>
<footer>
    <?php
    include 'footer.php';
    ?>
</footer>

</html>