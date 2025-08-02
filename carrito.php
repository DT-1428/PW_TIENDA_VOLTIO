<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Your Shopping Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #fafbfc;
        }

        .stepper .nav-link.active {
            background: #5765fdff !important;
            color: #222 !important;
            font-weight: 600;
        }

        .stepper .nav-link {
            border-radius: 20px;
            margin: 0 5px;
            color: #222;
        }

        .cart-item-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
        }

        .recommend-img {
            width: 100%;
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
        }

        .recommend-card {
            background: #fafbfc;
            border-radius: 12px;
            box-shadow: 0 1px 4px #0001;
        }

        .cart-item {
            transition: opacity 0.3s;
        }

        .cart-item.removed {
            opacity: 0.4;
            pointer-events: none;
        }
    </style>
    <?php
    include 'header.php';
    ?>
    </head>

<body>
    <main>
    <div class="container py-4">
        <h1 class="text-center fw-bold mb-4" style="color:#1677ff;">Your Shopping Cart</h1>
        <!-- Stepper igual que antes -->
        <ul class="nav nav-pills justify-content-center mb-4 stepper">
            <li class="nav-item"><span class="nav-link active">Cart</span></li>
            <li class="nav-item"><span class="nav-link">Shipping</span></li>
            <li class="nav-item"><span class="nav-link">Payment</span></li>
            <li class="nav-item"><span class="nav-link">Review</span></li>
        </ul>
        <div class="row g-4">
            <!-- Carrito -->
            <div class="col-lg-8">
                <div class="bg-white rounded-4 p-3 mb-3 shadow-sm" id="cart-items">
                    <!-- Los productos se cargarán aquí dinámicamente -->
                </div>
                <!-- Instrucciones especiales igual que antes -->
                <div class="bg-white rounded-4 p-3 shadow-sm mb-4">
                    <label class="fw-semibold mb-2" for="instructions">Special Instructions</label>
                    <textarea class="form-control" id="instructions" rows="3" placeholder="Add any special instructions or comments for your order here..."></textarea>
                </div>
            </div>
            <!-- Resumen igual que antes -->
            <div class="col-lg-4">
                <div class="bg-white rounded-4 p-4 shadow-sm mb-4">
                    <h5 class="fw-semibold mb-3">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span id="subtotal">S/ 0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping Estimate</span>
                        <span id="shipping">S/ 15.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Taxes</span>
                        <span id="taxes">S/ 23.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3 fw-bold text-primary fs-5">
                        <span>Order Total</span>
                        <span id="total">S/ 0.00</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter code" disabled>
                        <button class="btn btn-outline-primary" disabled><!-- Botón deshabilitado, funcionalidad pendiente -->Apply</button>
                    </div>
                    <button class="btn btn-primary w-100 fw-bold mb-2">Proceed to Checkout &rsaquo;</button>
                    <div class="text-center text-muted small">
                        <span>🔒 Secure Checkout &nbsp; • &nbsp; SSL Encrypted</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recomendaciones igual que antes... -->
    </div>
    </main>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function safeGetCart() {
            try {
                const cart = JSON.parse(localStorage.getItem('cart') || '[]');
                if (!Array.isArray(cart)) return [];
                return cart;
            } catch (e) {
                return [];
            }
        }

        function renderCart() {
            let cart = safeGetCart();
            let cartItems = document.getElementById('cart-items');
            cartItems.innerHTML = '';
            if (cart.length === 0) {
                cartItems.innerHTML = '<div class="text-center text-muted py-5">No hay productos en el carrito.</div>';
            }
            cart.forEach((item, idx) => {
                let div = document.createElement('div');
                div.className = 'd-flex align-items-center mb-3 cart-item';
                div.setAttribute('data-id', item.id);
                div.setAttribute('data-price', item.price);
                div.innerHTML = `
            <img src="${item.img}" class="cart-item-img me-3" alt="">
            <div class="flex-grow-1">
                <div class="fw-semibold">${item.title}</div>
                <div class="text-primary fw-bold">S/ <span class="item-price">${item.price.toFixed(2)}</span></div>
            </div>
            <div class="d-flex flex-column align-items-end">
                <div class="input-group input-group-sm mb-1" style="width: 100px;">
                    <button class="btn btn-outline-secondary btn-minus" aria-label="Disminuir cantidad">-</button>
                    <input type="text" class="form-control text-center item-qty" value="${item.qty}" readonly aria-label="Cantidad">
                    <button class="btn btn-outline-secondary btn-plus" aria-label="Aumentar cantidad">+</button>
                </div>
                <a href="#" class="text-decoration-none text-muted small btn-remove" aria-label="Eliminar producto">Remove</a>
            </div>
        `;
                cartItems.appendChild(div);
            });
            addCartEvents();
            updateTotals();
        }

        function addCartEvents() {
            document.querySelectorAll('.btn-plus').forEach(btn => {
                btn.onclick = function() {
                    let itemDiv = btn.closest('.cart-item');
                    let id = itemDiv.getAttribute('data-id');
                    let cart = safeGetCart();
                    let prod = cart.find(p => String(p.id) === String(id));
                    if (prod) {
                        prod.qty += 1;
                        localStorage.setItem('cart', JSON.stringify(cart));
                        renderCart();
                    }
                }
            });
            document.querySelectorAll('.btn-minus').forEach(btn => {
                btn.onclick = function() {
                    let itemDiv = btn.closest('.cart-item');
                    let id = itemDiv.getAttribute('data-id');
                    let cart = safeGetCart();
                    let prod = cart.find(p => String(p.id) === String(id));
                    if (prod && prod.qty > 1) {
                        prod.qty -= 1;
                        localStorage.setItem('cart', JSON.stringify(cart));
                        renderCart();
                    }
                }
            });
            document.querySelectorAll('.btn-remove').forEach(btn => {
                btn.onclick = function(e) {
                    e.preventDefault();
                    let itemDiv = btn.closest('.cart-item');
                    let id = itemDiv.getAttribute('data-id');
                    let cart = safeGetCart();
                    cart = cart.filter(p => String(p.id) !== String(id));
                    localStorage.setItem('cart', JSON.stringify(cart));
                    renderCart();
                }
            });
        }

        function updateTotals() {
            let cart = safeGetCart();
            let subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
            let shipping = 15.00;
            let taxes = 23.00;
            let total = subtotal + shipping + taxes;
            document.getElementById('subtotal').textContent = 'S/ ' + subtotal.toFixed(2);
            document.getElementById('shipping').textContent = 'S/ ' + shipping.toFixed(2);
            document.getElementById('taxes').textContent = 'S/ ' + taxes.toFixed(2);
            document.getElementById('total').textContent = 'S/ ' + total.toFixed(2);
        }
        document.addEventListener('DOMContentLoaded', renderCart);
    </script>

<?php
    // Asegúrate de que footer.php existe y no genera errores
    include 'footer.php';
    ?>

</body>

</html>