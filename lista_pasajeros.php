<?php
include 'template/header.php';

include_once "model/conexion.php";

$sql = "SELECT * FROM pasajeros";
$resultado = $bd->query($sql);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h2>Lista de Pasajeros</h2>
            <ul>
                <?php while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) : ?>
                    <li><?php echo $fila['nombres'] . ' ' . $fila['apellido_paterno'] . ' ' . $fila['apellido_materno']; ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>
