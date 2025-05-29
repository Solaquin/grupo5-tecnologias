<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Incluir la conexión usando PDO
    include_once 'conexionBD.php';

    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    // Validar el correo
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Correo inválido";
        exit;
    }

    try {
        // Verificar si ya existe
        $stmt = $myPDO->prepare("SELECT COUNT(*) FROM suscriptores WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $exists = $stmt->fetchColumn();

        if ($exists > 0) {
            http_response_code(409); // Conflicto
            echo "Este correo ya está registrado.";
            exit;
        }

        // Insertar
        $stmt = $myPDO->prepare("INSERT INTO suscriptores (email) VALUES (:email)");
        $stmt->execute([':email' => $email]);

        echo "OK";
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Error en la base de datos: " . $e->getMessage();
    }
}
?>


<!-- includes/footer.php -->
  <footer>
    <div class="contacto">
      <p><strong>Contáctanos</strong></p>
      <p><strong>Mail: </strong> marroquineriabicur@gmail.com</p>
      <p><strong>Dirección: </strong> Carrera 82 N° 77-04</p>
      <form id="form-suscripcion" class="form-suscripcion" method="POST">
        <label for="suscripcion-email" class="form-label">Suscríbete</label>
        <div class="d-flex gap-2">
          <input type="email" class="form-control" id="suscripcion-email" name="email" placeholder="Tu correo" required>
          <button type="submit" class="btn btn-burgundy">Suscribirse</button>
        </div>
      </form>
      <!-- Aquí irá la ventana de éxito -->
      <div id="popup-container" style="display:none; background: #d4edda; color: #155724; padding: 1rem; margin-top: 1rem; border: 1px solid #c3e6cb;">
      ¡Te has suscrito con éxito!
      </div>
    </div>

    <div class="redes">
      <p><strong>Redes Sociales</strong></p>
      <div class="icons">
        <a href="https://www.instagram.com/bicur_marroquinera/" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://w.app/hmf1qy" target="_blank"><i class="fab fa-whatsapp"></i></a>
        <a href="https://www.tiktok.com/@bicur.marroquineria" target="_blank"><i class="fab fa-tiktok"></i></a>
        <a href="https://www.facebook.com/share/1C8SkZz1hL/" target="_blank"><i class="fab fa-facebook"></i></a>
      </div>
    </div>
    <div class="legal">
      <img src="../sources/industria.png" alt="Industria y Comercio" height="120">
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../scripts/script.js"></script>
</body>
</html>
