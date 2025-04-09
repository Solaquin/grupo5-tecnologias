# bicur-marroquineria

Sitio web de Bicur Marroquinería, una marca especializada en productos de cuero 100% colombiano. Este sitio está diseñado para mostrar productos destacados, categorías por género y un flujo de compra simple e intuitivo.

---

# Estructura del Proyecto
bicur-web/ ├── home.html # Página principal del sitio ├── frame4.html # Página de categoría Mujer ├── checkout.html # Formulario de compra con resumen de pedido │ ├── styles/ │ └── estilos_unificados.css # Estilos personalizados del sitio │ ├── sources/ # Carpeta con todos los recursos visuales (imágenes) │ ├── bicur_white.png # Logo Bicur en blanco para navbar │ ├── mujer.jpg # Fondo de la sección Mujer │ ├── tarjetero.jpg # Fondo de la sección Hombre │ ├── tarjeterodoble.jpg # Imagen del producto Tarjetero Magno │ ├── tarjeterosencillo.jpg # Imagen del producto Tarjetero Bravus │ ├── damagrande.jpg # Imagen de la billetera Zafiro │ ├── damamariposas.jpg # Imagen de la billetera Aurora │ └── industria.png # Sello de Industria y Comercio (footer) │ └── js/ └── app.js # Script principal (puede estar vacío o personalizado)

#  `home.html` - Página Principal

- **Hero** con fondo e introducción de marca.
- Sección de **categorías** para "Mujer" y "Hombre", con imágenes y botones.
- **Productos destacados** con imágenes, descripciones y precios.
- **Footer** con contacto, redes sociales y formulario de suscripción.
- Barra de navegación responsive con íconos y menú colapsable.

---

#  `frame4.html` - Categoría Mujer

- Muestra una galería de productos femeninos en formato de cuadrícula.
- Cada producto tiene:
  - Imagen
  - Nombre
  - Precio
- Diseño estilizado y adaptable para navegadores móviles y de escritorio.

---

#  `checkout.html` - Formulario de Compra

- Formulario dividido en secciones claras:
  
  ### Información Personal
  - Nombre completo
  - Correo electrónico
  - Teléfono

  ### Dirección de Envío
  - Ciudad
  - Departamento o Estado
  - Código Postal

- **Resumen del pedido**:
  - Listado de productos añadidos al carrito
  - Imágenes y precios
  - Total de la compra

- Interfaz clara y sencilla para proceder con el pedido.

---

#  `sources/` - Recursos Visuales

Esta carpeta contiene **todas las imágenes utilizadas en el sitio web**, organizadas de la siguiente forma:

| Archivo                   | Descripción                                         |
|--------------------------|-----------------------------------------------------|
| `bicur_white.png`        | Logo blanco usado en la barra de navegación         |
| `mujer.jpg`              | Imagen de fondo para la categoría Mujer             |
| `tarjetero.jpg`          | Imagen de fondo para la categoría Hombre            |
| `tarjeterodoble.jpg`     | Imagen del producto "Tarjetero Magno"               |
| `tarjeterosencillo.jpg`  | Imagen del producto "Tarjetero Bravus"              |
| `damagrande.jpg`         | Imagen del producto "Billetera Zafiro"              |
| `damamariposas.jpg`      | Imagen del producto "Billetera Aurora"              |
| `industria.png`          | Logo de Industria y Comercio que aparece en el footer |

---

#  `estilos_unificados.css`

Archivo de estilos unificados que contiene:

- Colores corporativos (`vinotinto`, blanco)
- Botones personalizados (`btn-burgundy`, `btn-outline-burgundy`)
- Estilos del hero, categorías, destacados y footer
- Reglas responsive y clases adicionales para estética unificada

---

#  Dependencias Usadas

- **Bootstrap 5.3.3** (CDN)
- **Bootstrap Icons 1.10.5**
- **Font Awesome 6.5.0**



#  Contacto

**Bicur Marroquinería**  
 Bogotá, Colombia  
 marroquineriabicur@gmail.com  
 Instagram |  WhatsApp |  TikTok |  Facebook  
