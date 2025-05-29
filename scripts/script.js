  
// 2. Función para el ícono de búsqueda (lupa)
function activarBusqueda() {
  const termino = prompt("¿Qué estás buscando?");
  if (termino) {
    alert(`Has buscado: "${termino}". Funcionalidad de búsqueda próximamente.`);    
  }
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

  