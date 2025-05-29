<?php
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
<section class="admin-productos" style="padding: 40px;">
  <h2 style="color: #6F2020; text-align: center;">Gestión de Productos</h2>

  <div style="text-align: right; margin-bottom: 20px;">
    <a href="crearProducto.php" class="btn btn-burgundy">Agregar Nuevo Producto</a>
  </div>    

  <div class="tabla-container" style="overflow-x:auto;">
    <table style="width: 100%; border-collapse: collapse; background-color: white;">
      <thead style="background-color: #6F2020; color: white;">
        <tr>
          <th style="padding: 10px;">ID</th>
          <th style="padding: 10px;">Nombre</th>
          <th style="padding: 10px;">Precio</th>
          <th style="padding: 10px;">Categoría</th>
          <th style="padding: 10px;">Descripción</th>
          <th style="padding: 10px;">Imagen</th>
          <th style="padding: 10px;">Acciones</th>
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
                <td style="padding: 10px;">
                    <a href="editarProducto.php?id=<?= $valor['id']; ?>" class="btn btn-outline-burgundy" style="margin-right: 10px;">Editar</a>
                    <a href="eliminarProducto.php?id=<?= $valor['id']; ?>" class="btn btn-outline-burgundy" onclick="return confirm('¿Estás seguro que deseas eliminar este producto?');">Eliminar</a>
                </td>
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
