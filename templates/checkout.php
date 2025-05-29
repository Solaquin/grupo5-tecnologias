<?php include('../php/includes/header.php'); ?>

      <h1 class="visually-hidden">Checkout - Bicur Marroquinería</h1>

    <!-- Contenido de la página de checkout -->
    <div class="container checkout-container my-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header bg-burgundy text-white">
                        <h2 class="mb-0">Información de Compra</h2>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <h3 class="fw-bold text-burgundy mb-3">Información Personal</h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" id="nombre" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" required>
                            </div>
                            
                            <hr class="my-4">
                            
                            <h3 class="fw-bold text-burgundy mb-3">Dirección de Envío</h3>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ciudad" class="form-label">Ciudad</label>
                                    <input type="text" class="form-control" id="ciudad" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="departamento" class="form-label">Departamento/Estado</label>
                                    <input type="text" class="form-control" id="departamento" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="codigoPostal" class="form-label">Código Postal</label>
                                <input type="text" class="form-control" id="codigoPostal" required>
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
                <div class="card">
                    <div class="card-header bg-burgundy text-white">
                        <h4 class="mb-0">Resumen del Pedido</h4>
                    </div>
                    <div class="card-body product-summary">
                        <div class="d-flex align-items-center mb-3">
                            <img src="../sources/love, peace, and joy - 11.jpg" alt="Billetera" class="img-thumbnail me-3" style="width: 80px; height: 80px; object-fit: cover;">
                            <div>
                                <h5 class="mb-1">Billetera de mujer cuero Otoñal</h5>
                                <small class="text-muted">Ref: 501</small>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>$99.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Envío</span>
                            <span>$10.000</span>
                        </div>
                        
                        <hr>
                        
                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Total</span>
                            <span>$109.000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('../php/includes/footer.php'); ?>