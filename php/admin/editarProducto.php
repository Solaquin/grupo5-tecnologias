<?php

    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: login.php');
        exit();
    }

    include_once 'conexionBD.php';

    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $price = isset($_REQUEST['price']) ? $_REQUEST['price'] : null;
    $category_id = isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] : null;
    $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : null;
    $img = isset($_REQUEST['img']) ? $_REQUEST['img'] : null;

    if($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        // Prepare the SQL statement
        $statement = $myPDO->prepare("UPDATE productos SET name = :name, price = :price, category_id = :category_id, description = :description, img = :img WHERE id = :id");
        $statement->execute([
            ':id' => $id,
            ':name' => $name,
            ':price' => $price,
            ':category_id' => $category_id,
            ':description' => $description,
            ':img' => $img
        ]);

        header('Location: productsReview.php');
    }
    else
    {
        // Fetch the product details
        $statement = $myPDO->prepare("SELECT * FROM productos WHERE id = :id");
        $statement->execute([':id' => $id]);
        $producto = $statement->fetch();

        if (!$producto) {
            echo "Producto no encontrado.";
            exit;
        }
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../styles/estilos_unificados.css">
</head>
<body>
  <section class="container mt-5" style="max-width: 600px;">
    <h2 style="color: #6F2020; text-align: center;">Editar Producto</h2>

    <form method="POST" class="mt-4">
      <div class="mb-3">
        <label for="name" class="form-label">Nombre del producto</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= htmlspecialchars($producto['name']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" name="price" id="price" value="<?= htmlspecialchars($producto['price']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="category_id" class="form-label">Categoría (ID)</label>
        <input type="number" class="form-control" name="category_id" id="category_id" value="<?= htmlspecialchars($producto['category_id']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" name="description" id="description" rows="3"><?= htmlspecialchars($producto['description']) ?></textarea>
      </div>

      <div class="mb-3">
        <label for="img" class="form-label">Imagen</label>
        <input type="text" class="form-control" name="img" id="img" value="<?= htmlspecialchars($producto['img']) ?>" required>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-burgundy">Guardar Cambios</button>
        <a href="productsReview.php" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </section>
</body>
</html>
