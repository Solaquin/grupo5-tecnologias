// Función para formatear números como precios con separador de miles
  function formatearPrecio(precio) {
    return '$' + precio.toLocaleString('es-CO');
  }

  // Obtener carrito guardado en localStorage
const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
const productosContainer = document.querySelector('.product-list');
const totalesContainer = document.querySelector('.product-totals');

const envio = 10000; // Puedes cambiarlo o hacerlo dinámico

  // Limpiamos el contenido fijo actual para reemplazarlo con dinámico

productosContainer.innerHTML = '';
totalesContainer.innerHTML = '';

if (carrito.length === 0) {
  productosContainer.innerHTML = '<p>Tu carrito está vacío.</p>';
} else {
  let subtotal = 0;

  carrito.forEach(producto => {
    subtotal += producto.precio * producto.cantidad;

    productosContainer.innerHTML += `
      <div class="d-flex align-items-center mb-3">
        <img src="${producto.img || '../sources/love, peace, and joy - 11.jpg'}" alt="${producto.nombre}" class="img-thumbnail me-3" style="width: 80px; height: 80px; object-fit: cover;">
        <div>
          <h5 class="mb-1">${producto.nombre}</h5>
          <small class="text-muted">Ref: ${producto.id} - ${formatearPrecio(producto.precio)} - x${producto.cantidad}</small>
        </div>
      </div>
      <hr>
    `;
  });

  totalesContainer.innerHTML = `
    <div class="d-flex justify-content-between mb-2">
      <span>Subtotal</span>
      <span>${formatearPrecio(subtotal)}</span>
    </div>
    <div class="d-flex justify-content-between mb-2">
      <span>Envío</span>
      <span>${formatearPrecio(envio)}</span>
    </div>
    <hr>
    <div class="d-flex justify-content-between fw-bold fs-5">
      <span>Total</span>
      <span>${formatearPrecio(subtotal + envio)}</span>
    </div>
  `;
}

window.onload = function () 
{  
  // Formulario de compra
  document.getElementById('formulario-compra').addEventListener('submit', function () {
    localStorage.clear();
  });
}  


