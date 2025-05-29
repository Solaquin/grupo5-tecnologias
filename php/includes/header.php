<!-- includes/header.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bicur Marroquineria</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="../styles/estilos_unificados.css">
</head>
<body>

  <div class="top-bar">
    100% Cuero Colombiano
  </div>

  <!-- HEADER RESPONSIVE -->
  <nav class="navbar navbar-expand-lg bg-burgundy navbar-dark py-3">
    <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="home.php">
            <img src="../sources/bicur_white.png" alt="Logo Bicur" height="100">
        </a>

        <!-- Botón hamburguesa -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-label="Abrir menú de navegación">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú colapsable -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarMenu">
            <ul class="navbar-nav mb-2 mb-lg-0 gap-lg-4 text-center">
                <li class="nav-item"><a class="nav-link text-white" href="../templates/secciones.php?categoria=1">MUJER</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="../templates/secciones.php?categoria=2">HOMBRE</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="../templates/secciones.php?categoria=3">OUTLET</a></li>
            </ul>
        </div>

        <!-- Íconos -->
        <div class="d-flex gap-3">
          <a href="#" class="text-white fs-5" aria-label="Buscar icon"><i class="bi bi-search"></i></a>
          <a href="carrito.php" class="text-white fs-5" aria-label="Carrito icon"><i class="bi bi-cart"></i></a>
        </div>
    </div>
  </nav>
    <!-- FIN HEADER RESPONSIVE -->