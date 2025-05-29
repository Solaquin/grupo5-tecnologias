<?php

    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: login.php');
        exit();
    }
    
    include_once 'conexionBD.php';

    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    if($id === null) 
    {
        echo "ID de producto no proporcionado o no existente.";
        exit;
    }

    // Prepare the SQL statement to delete the product
    $statement = $myPDO->prepare("DELETE FROM productos WHERE id = :id");
    $statement->execute([':id' => $id]);

    header('Location: productsReview.php');
?>