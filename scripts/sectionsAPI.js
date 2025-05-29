document.addEventListener("DOMContentLoaded", function () {
  const grid = document.querySelector(".productos-grid");

  const urlParams = new URLSearchParams(window.location.search);
  const categoria = urlParams.get('categoria') || '1';

  fetch("http://127.0.0.1:5000/productos")
    .then(response => response.json())
    .then(data => {
      grid.innerHTML = '';

      const filtrados = data.filter(producto => producto.category_id == categoria);

      filtrados.forEach(producto => {
        const card = document.createElement("a");
        card.href = `product.php?id=${producto.id}`;
        card.classList.add("card-producto");

        card.innerHTML = `
        <img src="${producto.img}" alt="${producto.name}" class="card-img">
        <p class="card-nombre">${producto.name}</p>
        <span class="card-precio">$${producto.price}</span>
        `;

        grid.appendChild(card);
      });
    })
    .catch(error => {
      console.error("Error al obtener productos:", error);
      grid.innerHTML = "<p>No se pudieron cargar los productos. Intente más tarde.</p>";
    });
});
