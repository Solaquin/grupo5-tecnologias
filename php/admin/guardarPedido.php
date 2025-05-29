<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once 'conexionBD.php';

    $nombre       = trim($_POST['nombre'] ?? '');
    $email        = trim($_POST['email'] ?? '');
    $telefono     = trim($_POST['telefono'] ?? '');
    $direccion    = trim($_POST['direccion'] ?? '');
    $ciudad       = trim($_POST['ciudad'] ?? '');
    $departamento = trim($_POST['departamento'] ?? '');
    $codigoPostal = trim($_POST['codigoPostal'] ?? '');

    // Validación básica
    if (!$nombre || !$email || !$telefono || !$direccion || !$ciudad || !$departamento || !$codigoPostal) {
        http_response_code(400);
        echo "Faltan campos obligatorios.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Correo inválido.";
        exit;
    }

    try {
        $stmt = $myPDO->prepare("
            INSERT INTO pedidos (nombre, email, celular, direccion, ciudad, departamento, cpostal)
            VALUES (:nombre, :email, :telefono, :direccion, :ciudad, :departamento, :codigo_postal)
        ");

        $stmt->execute([
            ':nombre'        => $nombre,
            ':email'         => $email,
            ':telefono'      => $telefono,
            ':direccion'     => $direccion,
            ':ciudad'        => $ciudad,
            ':departamento'  => $departamento,
            ':codigo_postal' => $codigoPostal,
        ]);

        echo "<script>
            alert('Pedido realizado con éxito');
            window.location.href = '../../templates/home.php';
        </script>";

    } catch (PDOException $e) {
        http_response_code(500);
         echo "<script>alert('Error en la base de datos: " . $e->getMessage() . "'); history.back();</script>";
    }
}
?>
