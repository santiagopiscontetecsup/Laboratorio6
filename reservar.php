<?php include 'template/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h2>Reservar Vuelo</h2>
            <form method="POST" action="crear_reserva.php">
                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" required>
                </div>
                <div class="mb-3">
                    <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required>
                </div>
                <div class="mb-3">
                    <label for="apellido_materno" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
                <div class="mb-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" required>
                </div>

                <div class="mb-3">
                    <label for="numero_vuelo" class="form-label">Número de Vuelo</label>
                    <input type="text" class="form-control" id="numero_vuelo" name="numero_vuelo" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_vuelo" class="form-label">Fecha de Vuelo</label>
                    <input type="date" class="form-control" id="fecha_vuelo" name="fecha_vuelo" required>
                </div>
                <div class="mb-3">
                    <label for="hora_vuelo" class="form-label">Hora de Vuelo</label>
                    <input type="time" class="form-control" id="hora_vuelo" name="hora_vuelo" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" id="precio" name="precio" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_reserva" class="form-label">Fecha de Reserva</label>
                    <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" required>
                </div>
                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['user_id']; ?>">
                <button type="submit" class="btn btn-primary">Reservar</button>
            </form>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>
