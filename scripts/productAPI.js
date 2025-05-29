document.addEventListener("DOMContentLoaded", function () {
  const params = new URLSearchParams(window.location.search);
  const id = params.get("id");

  if (!id) {
    alert("Producto no especificado.");
    return;
  }

  fetch(`http://127.0.0.1:5000/producto/${id}`)
    .then(res => {
      if (!res.ok) {
        throw new Error("Error de red o producto no encontrado.");
      }
      return res.json();
    })
    .then(producto => {
      if (!producto || !producto.name) {
        alert("Producto no encontrado.");
        return;
      }

      // Insertar en el DOM
      document.getElementById("product-title").textContent = producto.name;
      document.getElementById("product-id").textContent = producto.id;
      document.getElementById("product-price").textContent = `$${producto.price}`;
      document.getElementById("product-img").src = producto.img;
      document.getElementById("product-img").alt = producto.name;
      document.getElementById("product-description").textContent = producto.description || "Sin descripción.";

      const addToCartBtn = document.querySelector(".add-to-cart");
      addToCartBtn.dataset.id = producto.id;
      addToCartBtn.dataset.nombre = producto.name;
      addToCartBtn.dataset.precio = producto.price;
    })
    .catch(error => {
      console.error("Error al obtener el producto:", error);
    });
});
