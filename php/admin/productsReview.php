<?php

    session_start();
    include 'conexionBD.php';
    $connection = $myPDO->prepare("SELECT * FROM productos");
    $connection->execute();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Products Review</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="../../styles/estilos_unificados.css">
</head>

<body>

    <?php if (isset($_SESSION['email'])): ?>
        
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="../../sources/bicur_letra_negra.png" alt="Bicur Marroquinería" style="width: 100px;">
            </a>

            <div class="d-flex align-items-center">
                <span class="me-3 text-dark fw-bold">
                <?php echo htmlspecialchars($_SESSION['name']); ?>
                </span>

                <a href="logout.php" class="btn btn-outline-danger">Cerrar sesión</a>
            </div>
        </div>
    </nav>
    <?php endif; ?>

<section class="admin-productos" style="padding: 40px;">
  <h2 style="color: #6F2020; text-align: center;">Gestión de Productos</h2>

    <?php if (isset($_SESSION['email'])): ?>
        <div style="text-align: right; margin-bottom: 20px;">
        <a href="crearProducto.php" class="btn btn-burgundy">Agregar Nuevo Producto</a>
        </div>   
    <?php endif; ?>
 

  <div class="tabla-container" style="overflow-x:auto;">
    <table style="width: 100%; border-collapse: collapse; background-color: white;">
      <thead style="background-color: #6F2020; color: white;">
        <tr>
          <th style="padding: 10px; text-align: center;">ID</th>
          <th style="padding: 10px; text-align: center;">Nombre</th>
          <th style="padding: 10px; text-align: center;">Precio</th>
          <th style="padding: 10px; text-align: center;">Categoría</th>
          <th style="padding: 10px; text-align: center;">Descripción</th>
          <th style="padding: 10px; text-align: center;">Imagen</th>
        <?php if (isset($_SESSION['email'])): ?>
          <th style="padding: 10px; text-align: center;">Acciones</th>
        <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($connection as $clave => $valor): ?>
        <!-- Ejemplo de producto -->
            <tr style="text-align: center;">
                <td style="padding: 10px;"><?= $valor['id']?></td>
                <td style="padding: 10px;"><?= $valor['name']?></td>
                <td style="padding: 10px;"><?= $valor['price']?></td>
                <td style="padding: 10px;"><?= $valor['category_id']?></td>
                <td style="padding: 10px;"><?= $valor['description']?></td>
                <td style="padding: 10px;"><?= $valor['img']?></td>
                <?php if (isset($_SESSION['email'])): ?>
                    <td style="padding: 10px;">
                    <a href="editarProducto.php?id=<?= $valor['id']; ?>" class="btn btn-outline-burgundy" style="margin-right: 10px;">Editar</a>
                    <a href="eliminarProducto.php?id=<?= $valor['id']; ?>" class="btn btn-outline-burgundy" onclick="return confirm('¿Estás seguro que deseas eliminar este producto?');">Eliminar</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
</section>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../scripts/script.js"></script>
</body>
</html>
