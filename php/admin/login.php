<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar Sesión - Bicur Marroquinería</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="../../styles/estilos_unificados.css">
</head>
<body>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Conexión a la base de datos
        require_once 'conexionBD.php';

        // Obtener los datos del formulario
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        // Preparar y ejecutar la consulta
        $statement = $myPDO->prepare("SELECT * FROM usuarios WHERE email = :email");
        $statement->execute([':email' => $email]);

        $user = $statement->fetch();

        if($user)
        {

            if($user['email'] === $email && password_verify($password, $user['password'])) 
            {
                // Si el usuario existe y la contraseña es correcta
                session_start();
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                header('Location: productsReview.php'); // Redirigir al dashboard
                die();
            }
            else 
            {
                // Si el usuario no existe o la contraseña es incorrecta
                echo '<div class="alert alert-danger text-center">Email o contraseña incorrectos.</div>';
            }
        }
        else 
        {
            // Si el usuario no existe
            echo '<div class="alert alert-danger text-center">Email o contraseña incorrectos.</div>';
        }
    }
?>

<section class="d-flex flex-column justify-content-up align-items-center vh-100" style="background-color: #f5f5f5;">
  <!-- Logo encima de la tarjeta -->
  <img src="../../sources/bicur_letra_negra.png" alt="logo Bicur Marroquinería" class="mb-4" style="width: 200px;">

  <div class="card shadow p-4" style="width: 100%; max-width: 400px; border-radius: 1rem;">
    <h3 class="text-center mb-4" style="color: #6F2020;">Iniciar Sesión</h3>

    <form method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-burgundy">Ingresar</button>
      </div>
    </form>
  </div>
</section>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../scripts/script.js"></script>
</body>
</html>
