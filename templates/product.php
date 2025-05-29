<?php
$id = $_GET['id'] ?? null;

if (!$id) {
  echo "<p>Producto no especificado.</p>";
  exit;
}
?>

<?php include('../php/includes/header.php'); ?>

      <!-- Product Section -->
      <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Product Image Placeholder -->
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 400px; overflow: hidden;">
                    <img id="product-img" src="" alt="" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                </div>
            </div>
            <div class="col-md-6">
                <!-- En lugar de hardcodear los datos, pon IDs para rellenar dinámicamente -->
                <h1 id="product-title" class="product-title"></h1>
                <p class="text-muted">Ref: <span id="product-id"></span></p>
                <p class="fs-4 fw-bold text-burgundy">Precio: <span id="product-price"></span></p>
                <!-- Action Buttons -->
                <div class="d-grid gap-3 mb-4">
                    <button class="btn btn-burgundy btn-lg py-3 add-to-cart">Agregar a Carrito</button>
                    <a class="btn btn-outline-burgundy btn-lg py-3 buy-now" href="carrito.php" >Comprar ahora</a>
                </div>
            </div>
                <!-- Product Description -->
                <hr  style="margin-top: 20px;">
                <h5 class="fw-bold text-burgundy text-center" >Descripción del Producto</h5>
                <p id="product-description"></p>
            </div>
        </div>
    </div>

<script src="../scripts/products.js"></script>

<?php include('../php/includes/footer.php'); ?>
