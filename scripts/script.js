  
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

function mostrarMensaje(nombre) {
  const contenedor = document.getElementById('mensaje-alerta');
  contenedor.innerHTML = `
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
      ✅ <strong>${nombre}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
  `;
}

  