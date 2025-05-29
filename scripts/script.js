  
// 2. Función para el ícono de búsqueda (lupa)
function activarBusqueda() {
  const termino = prompt("¿Qué estás buscando?");
  if (termino) {
    alert(`Has buscado: "${termino}". Funcionalidad de búsqueda próximamente.`);    
  }
}
  
// 3. Función para el ícono de carrito
function abrirCarrito() {
  if(localStorage.getItem("carrito").length = 0)
    alert("Tu carrito está vacío por ahora :(");
  else 
  {
    const carrito = JSON.parse(localStorage.getItem("carrito"));
    let mensaje = "Tu carrito contiene:\n";
    carrito.forEach(item => {
      mensaje += `${item.nombre} - $${item.precio} x ${item.cantidad}\n`;
    });
    alert(mensaje);
  }
}

// 4. Simulación de envío del formulario de compra
function enviarFormularioCompra(event) 
{
  event.preventDefault();
  alert("Tu pedido ha sido enviado con éxito. ¡Gracias por tu compra!");
  return false;
}
  
// 5. Inicializador (agrega listeners cuando la página se carga)
window.onload = function () 
{
  // Ícono de lupa
  const lupa = document.querySelector('.bi-search');
  if (lupa) lupa.addEventListener('click', activarBusqueda);
  
  // Ícono de carrito
  const carrito = document.querySelector('.bi-cart');
  if (carrito) carrito.addEventListener('click', abrirCarrito);  

  // Formulario de compra
  document.getElementById('formulario-compra').addEventListener('submit', function () {
    localStorage.clear();
  });
}  

// 6. Suscripción al newsletter del footer
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("form-suscripcion");
  const popup = document.getElementById("popup-container");

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const emailInput = document.getElementById("suscripcion-email");
    const formData = new FormData();
    formData.append("email", emailInput.value);

    try {
      const response = await fetch("../php/admin/suscripcion.php", {
        method: "POST",
        body: formData,
      });

      const text = await response.text();

      if (response.ok && text.trim() === "OK") {
        popup.style.display = "block";
        emailInput.value = ""; // Limpiar campo
        setTimeout(() => popup.style.display = "none", 3000); // Ocultar luego de 3 segundos
      } else {
        alert("Error: " + text);
      }
    } catch (error) {
      console.error("Error de red:", error);
      alert("No se pudo completar la suscripción.");
    }
  });
});

  