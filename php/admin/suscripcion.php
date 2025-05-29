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
