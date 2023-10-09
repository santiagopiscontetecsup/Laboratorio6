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

header("Location: lista_pasajeros.php");
exit();
?>
