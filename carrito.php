<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="theme-color" content="#0fd622ff" charset="UTF-8">
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

            <ul class="nav nav-pills justify-content-center mb-4 stepper">
                <li class="nav-item"><span class="nav-link active">Carrito</span></li>
                <li class="nav-item"><span class="nav-link">Shipping</span></li>
                <li class="nav-item"><span class="nav-link">Payment</span></li>
                <li class="nav-item"><span class="nav-link">Review</span></li>
            </ul>
            <div class="row g-4">

                <div class="col-lg-8">
                    <div class="bg-white rounded-4 p-3 mb-3 shadow-sm" id="cart-items">

                    </div>

                    <div class="bg-white rounded-4 p-3 shadow-sm mb-4">
                        <label class="fw-semibold mb-2" for="instructions">Special Instructions</label>
                        <textarea class="form-control" id="instructions" rows="3" placeholder="Add any special instructions or comments for your order here..."></textarea>
                    </div>
                </div>

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
                            <span>IGV</span>
                            <span id="taxes">S/ 23.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 fw-bold text-primary fs-5">
                            <span>Orden Total</span>
                            <span id="total">S/ 0.00</span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter code" id="coupon-input">
                            <button class="btn btn-outline-primary" id="coupon-btn">Apply</button>
                        </div>
                        <button class="btn btn-primary w-100 fw-bold mb-2">Proceed to Checkout &rsaquo;</button>
                        <div class="text-center text-muted small">
                            <span>🔒 Secure Checkout &nbsp; • &nbsp; SSL Encrypted</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>






<div class="modal fade" id="sandboxModal" tabindex="-1" aria-labelledby="sandboxModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form id="sandbox-payment-form">
        <div class="modal-header">
        <h5 class="modal-title" id="sandboxModalLabel">Pago Sandbox</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
        <div class="mb-3">
            <label for="sandbox-card" class="form-label">Número de tarjeta</label>
            <input type="text" class="form-control" id="sandbox-card" placeholder="4111 1111 1111 1111" maxlength="19" required inputmode="numeric" pattern="\d*">
        </div>
        <div class="mb-3 row">
            <div class="col">
            <label for="sandbox-exp" class="form-label">Expiración</label>
            <input type="text" class="form-control" id="sandbox-exp" placeholder="MM/AA" maxlength="5" required inputmode="numeric" pattern="\d*">
            </div>
            <div class="col">
            <label for="sandbox-cvc" class="form-label">CVC</label>
            <input type="text" class="form-control" id="sandbox-cvc" placeholder="123" maxlength="4" required inputmode="numeric" pattern="\d*">
            </div>
        </div>
        <div class="mb-3">
            <label for="sandbox-name" class="form-label">Nombre en la tarjeta</label>
            <input type="text" class="form-control" id="sandbox-name" required>
        </div>
        <div class="alert alert-info small">
            Este es un entorno de pruebas. No se realizará ningún cobro real.
        </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary w-100">Pagar ahora</button>
        </div>
    </form>
    </div>
</div>
</div>








    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let appliedCoupon = null;

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
            cart.forEach(item => {
                let div = document.createElement('div');
                div.className = 'd-flex align-items-center mb-3 cart-item';
                div.setAttribute('data-id', item.id);
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
            let discount = 0;
            let couponRow = document.getElementById('discount-row');
            if (appliedCoupon === 'EL DURO') {
                discount = (subtotal + shipping + taxes) * 0.01;
                if (!couponRow) {
                    couponRow = document.createElement('div');
                    couponRow.className = "d-flex justify-content-between mb-2 text-success";
                    couponRow.id = "discount-row";
                    couponRow.innerHTML = `<span>Descuento (EL DURO)</span><span id="discount">-S/ ${discount.toFixed(2)}</span>`;
                    let totalDiv = document.getElementById('total').parentNode;
                    totalDiv.parentNode.insertBefore(couponRow, totalDiv);
                } else {
                    document.getElementById('discount').textContent = `-S/ ${discount.toFixed(2)}`;
                }
            } else if (couponRow) {
                couponRow.remove();
            }
            let total = subtotal + shipping + taxes - discount;
            document.getElementById('subtotal').textContent = 'S/ ' + subtotal.toFixed(2);
            document.getElementById('shipping').textContent = 'S/ ' + shipping.toFixed(2);
            document.getElementById('taxes').textContent = 'S/ ' + taxes.toFixed(2);
            document.getElementById('total').textContent = 'S/ ' + total.toFixed(2);
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderCart();

            const couponInput = document.getElementById('coupon-input');
            const couponBtn = document.getElementById('coupon-btn');
            if (couponBtn && couponInput) {
                couponBtn.disabled = false;
                couponInput.disabled = false;
                couponBtn.onclick = function() {
                    if (couponInput.value.trim().toUpperCase() === 'EL DURO') {
                        appliedCoupon = 'EL DURO';
                    } else {
                        appliedCoupon = null;
                    }
                    updateTotals();
                }
            }
        });






document.querySelector('.btn-primary.w-100.fw-bold.mb-2').addEventListener('click', function(e) {
    e.preventDefault();
    var modal = new bootstrap.Modal(document.getElementById('sandboxModal'));
    modal.show();
});

document.getElementById('sandbox-payment-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const tarjeta = document.getElementById('sandbox-card').value;
    const expiracion = document.getElementById('sandbox-exp').value;
    const cvc = document.getElementById('sandbox-cvc').value;
    const nombre = document.getElementById('sandbox-name').value;

    fetch('guardar_pago.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `tarjeta=${encodeURIComponent(tarjeta)}&expiracion=${encodeURIComponent(expiracion)}&cvc=${encodeURIComponent(cvc)}&nombre=${encodeURIComponent(nombre)}`
    }).then(res => res.text()).then(resp => {
        document.getElementById('sandbox-payment-form').reset();
        var modal = bootstrap.Modal.getInstance(document.getElementById('sandboxModal'));
        modal.hide();
        alert('¡Pago simulado exitoso! Gracias por tu compra.');
        localStorage.removeItem('cart');
        window.location.reload();
    });
});


    </script>

    <?php
    include 'footer.php';
    ?>

</body>

</html>