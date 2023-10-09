<?php
include 'template/header.php';

include_once "model/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombres = $_POST["nombres"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $celular = $_POST["celular"];

    $sql = "UPDATE pasajeros SET nombres=?, apellido_paterno=?, apellido_materno=?, fecha_nacimiento=?, celular=? WHERE id=?";

    $stmt = $bd->prepare($sql);

    $resultado = $stmt->execute([$nombres, $apellido_paterno, $apellido_materno, $fecha_nacimiento, $celular, $id]);

    if ($resultado) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro.";
    }
}

$id = $_GET["id"];
$sql = "SELECT * FROM pasajeros WHERE id = ?";
$stmt = $bd->prepare($sql);
$stmt->execute([$id]);
$pasajero = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h2>Editar Pasajero</h2>
            <form method="POST" action="editar_pasajero.php">
                <input type="hidden" name="id" value="<?php echo $pasajero['id']; ?>">
                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $pasajero['nombres']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="<?php echo $pasajero['apellido_paterno']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido_materno" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="<?php echo $pasajero['apellido_materno']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $pasajero['fecha_nacimiento']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $pasajero['celular']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>
