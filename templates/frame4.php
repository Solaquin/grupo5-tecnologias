<?php include('../php/includes/header.php'); ?>

      <!-- Product Section -->
      <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Product Image Placeholder -->
                <div class="bg-light" style="height: 400px; display: flex; align-items: center; justify-content: center;">
                    <img src="../sources/love, peace, and joy - 11.jpg" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="product-title">Billetera de mujer cuero Otoñal</h1>
                <p class="text-muted">Ref: 501</p>
                
                <!-- Color Selection -->
                <div class="mb-4">
                    <h6 class="fw-bold">Color</h6>
                    <div class="d-flex align-items-center">
                        <span class="me-2">(Rojo)</span>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="d-grid gap-3 mb-4">
                    <button class="btn btn-burgundy btn-lg py-3 add-to-cart" 
                    data-id="501" 
                    data-nombre="Billetera de mujer cuero Otoñal" 
                    data-precio="99000">Agregar a Carrito</button>
                    <a href="checkout.php" class="btn btn-outline-burgundy btn-lg py-3">Comprar ahora</a>
                </div>
                
                <!-- Product Description -->
                <hr>
                <h5 class="fw-bold text-burgundy">Descripción del Producto</h5>
                <p></p>
            </div>
        </div>
    </div>

<?php include('../php/includes/footer.php'); ?>
