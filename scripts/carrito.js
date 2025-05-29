document.addEventListener('DOMContentLoaded', function () {
    cargarCarrito();
});

function cargarCarrito() {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const tbody = document.getElementById('carrito-body');
    const subtotalElem = document.getElementById('subtotal');
    const totalElem = document.getElementById('total');
    tbody.innerHTML = '';

    let subtotal = 0;

    carrito.forEach((producto, index) => {
        const totalProducto = producto.precio * producto.cantidad;
        subtotal += totalProducto;

        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td>
                <div class="d-flex flex-column flex-md-row align-items-center gap-2">
                <img src="${producto.img}" alt="${producto.nombre}" width="60" height="60" style="object-fit: cover; border-radius: 5px;">
                    <div>
                        <strong>${producto.nombre}</strong><br>
                    </div>
                </div>
            </td>
            <td>$${producto.precio.toLocaleString()}</td>
            <td>
                <label class="visually-hidden" for="cantidad">Cantidad</label>
                <input type="number" min="1" value="${producto.cantidad}" id="cantidad" class="form-control cantidad-input" data-index="${index}">
            </td>
            <td>$${totalProducto.toLocaleString()}</td>
            <td><button class="btn btn-danger btn-sm eliminar-btn" data-index="${index}">&times;</button></td>
        `;
        tbody.appendChild(fila);
    });

    subtotalElem.textContent = `$${subtotal.toLocaleString()}`;
    totalElem.textContent = `$${subtotal.toLocaleString()}`;

    agregarEventos();
}

function agregarEventos() {
    document.querySelectorAll('.cantidad-input').forEach(input => {
        input.addEventListener('change', (e) => {
            const index = e.target.dataset.index;
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            carrito[index].cantidad = parseInt(e.target.value);
            localStorage.setItem('carrito', JSON.stringify(carrito));
            cargarCarrito();
        });
    });

    document.querySelectorAll('.eliminar-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const index = e.target.dataset.index;
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            carrito.splice(index, 1);
            localStorage.setItem('carrito', JSON.stringify(carrito));
            cargarCarrito();
        });
    });
}

function vaciarCarrito() {
    if (confirm('¿Deseas vaciar el carrito?')) {
        localStorage.removeItem('carrito');
        cargarCarrito();
    }
}
