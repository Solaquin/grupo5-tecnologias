//Renderizar producto en la página
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

      // Configurar botón de agregar al carrito
      const addToCartBtn = document.querySelector(".add-to-cart");
      addToCartBtn.dataset.id = producto.id;
      addToCartBtn.dataset.nombre = producto.name;
      addToCartBtn.dataset.precio = producto.price;
      addToCartBtn.dataset.img = producto.img;
      // Configurar botón de compra ahora
      const buyNowBtn = document.querySelector('.buy-now');
      buyNowBtn.dataset.id = producto.id;
      buyNowBtn.dataset.nombre = producto.name;
      buyNowBtn.dataset.precio = producto.price;
      buyNowBtn.dataset.img = producto.img;
    })
    .catch(error => {
      console.error("Error al obtener el producto:", error);
    });
});

// Agregar al carrito
document.addEventListener("DOMContentLoaded", () => {
    const addToCartBtn = document.querySelector(".add-to-cart");
  
    if (addToCartBtn) 
    {
      addToCartBtn.addEventListener("click", () => {
        const id = addToCartBtn.dataset.id;
        const nombre = addToCartBtn.dataset.nombre;
        const precio = parseInt(addToCartBtn.dataset.precio);
        const img = addToCartBtn.dataset.img;
  
        let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
  
        const productoExistente = carrito.find(item => item.id === id);
  
        if (productoExistente) 
        {
          productoExistente.cantidad += 1;
        } 
        else {
          carrito.push({ id, nombre, precio, cantidad: 1 , img});
        }
  
        localStorage.setItem("carrito", JSON.stringify(carrito));
  
        alert(`✅ ${nombre} fue agregado a tu carrito.`);
      });
    }
});

//Agregar producto y mostrar carrito
document.addEventListener("DOMContentLoaded", () => {
  const buyNowBtn = document.querySelector('.buy-now');
  
  if (buyNowBtn) 
    {
      buyNowBtn.addEventListener("click", () => {
        const id = buyNowBtn.dataset.id;
        const nombre = buyNowBtn.dataset.nombre;
        const precio = parseInt(buyNowBtn.dataset.precio);
        const img = buyNowBtn.dataset.img;
  
        let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
  
        const productoExistente = carrito.find(item => item.id === id);
  
        if (productoExistente) 
        {
          productoExistente.cantidad += 1;
        } 
        else {
          carrito.push({ id, nombre, precio, cantidad: 1 , img});
        }
  
        localStorage.setItem("carrito", JSON.stringify(carrito));
  
        alert(`✅ ${nombre} fue agregado a tu carrito.`);
      });
    }
});