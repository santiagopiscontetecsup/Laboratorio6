<?php
include 'template/header.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    include_once "model/conexion.php";

    $sql = "DELETE FROM pasajeros WHERE id=?";

    $stmt = $bd->prepare($sql);

    $resultado = $stmt->execute([$id]);

    if ($resultado) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro.";
    }
}

// Redirige a la página de lista de pasajeros después de eliminar
header("Location: lista_pasajeros.php");
exit();
?>
