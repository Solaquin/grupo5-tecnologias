<?php include('../php/includes/header.php'); ?>

      <h1 class="visually-hidden">Checkout - Bicur Marroquinería</h1>

    <!-- Contenido de la página de checkout -->
    <div id="mensaje-alerta"></div>
    <div class="container checkout-container my-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header bg-burgundy text-white">
                        <h2 class="mb-0">Información de Compra</h2>
                    </div>
                    <div class="card-body">
                        <form id="formulario-compra" action="../php/admin/guardarPedido.php" method="POST">
                            <h3 class="fw-bold text-burgundy mb-3">Información Personal</h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono"required>
                            </div>
                            
                            <hr class="my-4">
                            
                            <h3 class="fw-bold text-burgundy mb-3">Dirección de Envío</h3>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ciudad" class="form-label">Ciudad</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad"required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="departamento" class="form-label">Departamento/Estado</label>
                                    <input type="text" class="form-control" id="departamento" name="departamento"required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="codigoPostal" class="form-label">Código Postal</label>
                                <input type="text" class="form-control" id="codigoPostal" name="codigoPostal"required>
                            </div>
                            
                            <hr class="my-4">
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-burgundy btn-lg py-3">Confirmar Compra</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-header bg-burgundy text-white">
                        <h4 class="mb-0">Resumen del Pedido</h4>
                    </div>
                    <div class="card-body d-flex flex-column p-0">
                    <!-- Contenedor con scroll solo para productos -->
                    <div class="product-list px-3 py-3" style="overflow-y: auto; max-height: 700px;"></div>
                    <!-- Totales fijos abajo -->
                    <div class="product-totals border-top px-3 py-3 mt-auto"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src ="../scripts/checkout.js"></script>

<?php include('../php/includes/footer.php'); ?>