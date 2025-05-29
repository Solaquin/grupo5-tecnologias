const subtitles = {1: "BILLETERAS DE CUERO PARA MUJER", 2: "PARA ÉL, SOLO CUERO AUTENTICO", 3: "OUTLET"};
const descriptions = {
 1: "Nuestras billeteras de cuero para mujer combinan elegancia y funcionalidad, con diseños artesanales perfectos para cada ocasión.",
 2: "Descubre nuestras billeteras y tarjeteros de cuero para hombre, elaborados con precisión y estilo. Diseños sobrios y resistentes que se adaptan a tu ritmo diario con distinción.",
 3: "Descubre el Outlet de Bicur, donde la elegancia se encuentra con la oportunidad. Aquí encontrarás nuestras billeteras y tarjeteros de cuero con descuentos especiales, sin sacrificar la calidad ni el estilo que nos define. Cada pieza es elaborada artesanalmente en Bogotá, con materiales de primera y acabados que reflejan autenticidad y carácter. Aprovecha esta selección única y renueva tu estilo con Bicur, diseño colombiano en cuero que habla por ti."
};


document.addEventListener("DOMContentLoaded", function () {
  const grid = document.querySelector(".productos-grid");
  const sectionSubtitle = document.querySelector(".section-subtitle");
  const sectionDescription = document.querySelector(".section-description");

  const urlParams = new URLSearchParams(window.location.search);
  const categoria = urlParams.get('categoria') || '1';

  fetch("http://127.0.0.1:5000/productos")
    .then(response => response.json())
    .then(data => {
      grid.innerHTML = '';
      sectionDescription.innerHTML = '';
      sectionSubtitle.innerHTML = '';

      sectionSubtitle.textContent = subtitles[categoria] || "Productos";
      sectionDescription.textContent = descriptions[categoria] || "Descubre nuestra colección de productos de cuero.";

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