<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        // Include the database connection
        include_once 'conexionBD.php';

        // Get the form data
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : 0;
        $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : 0;
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $img = isset($_POST['img']) ? $_POST['img'] : '';

        // Prepare the SQL statement
        $statement = $myPDO->prepare("INSERT INTO productos (name, price, category_id, description, img) VALUES (:name, :price, :category_id, :description, :img)");
        $statement->execute([
            ':name' => $name,
            ':price' => $price,
            ':category_id' => $category_id,
            ':description' => $description,
            ':img' => $img
        ]);

        header('Location: productsReview.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../styles/estilos_unificados.css">
</head>
<body>
  <section class="container mt-5" style="max-width: 600px;">
    <h2 style="color: #6F2020; text-align: center;">Agregar Nuevo Producto</h2>
    <form method="POST" class="mt-4">

      <div class="mb-3">
        <label for="name" class="form-label">Nombre del Producto</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required min="0">
      </div>

      <div class="mb-3">
        <label for="category_id" class="form-label">Categoría (ID)</label>
        <input type="number" class="form-control" id="category_id" name="category_id" required min="0">
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label for="img" class="form-label">Nombre del archivo de imagen</label>
        <input type="text" class="form-control" id="img" name="img" placeholder="ej: cartera1.jpg" required>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-burgundy">Guardar Producto</button>
        <a href="productsReview.php" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </section>
</body>
</html>
