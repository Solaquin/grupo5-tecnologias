<?php include('../php/includes/header.php'); ?>

<h1 class="visually-hidden">Carrito de Compras - Bicur Marroquinería</h1>

<div class="container checkout-container my-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header bg-burgundy text-white">
                    <h2 class="mb-0">Carrito de Compra</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="carrito-body">
                                <!-- Productos insertados con JS desde localStorage -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card h-100 d-flex flex-column">
                <div class="card-header bg-burgundy text-white">
                    <h4 class="mb-0">Resumen del Pedido</h4>
                </div>
                <div class="card-body d-flex flex-column">
                    <div class="mb-3">
                        <label for="codigo-descuento" class="form-label">Código de Descuento</label>
                        <div class="input-group">
                            <input type="text" id="codigo-descuento" class="form-control" placeholder="Código">
                            <button class="btn btn-outline-secondary" type="button" id="aplicar-descuento">Añadir</button>
                        </div>
                    </div>
                    <hr>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Subtotal</span>
                            <strong id="subtotal">$0</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <strong id="total">$0</strong>
                        </li>
                    </ul>
                    <div class="d-grid">
                        <a href="checkout.php" class="btn btn-burgundy btn-lg py-3">Finalizar Compra</a>
                        <a href="javascript:void(0)" class="btn btn-outline-secondary mt-2" onclick="vaciarCarrito()">Vaciar Carrito</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../scripts/carrito.js"></script>

<?php include('../php/includes/footer.php'); ?>
