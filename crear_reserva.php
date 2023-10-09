<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST["nombres"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $celular = $_POST["celular"];
    $numero_vuelo = $_POST["numero_vuelo"];
    $fecha_vuelo = $_POST["fecha_vuelo"];
    $hora_vuelo = $_POST["hora_vuelo"];
    $precio = $_POST["precio"];
    $fecha_reserva = $_POST["fecha_reserva"];
    $id_usuario = $_POST["id_usuario"]; // Asegúrate de que este valor sea el ID del usuario actual

    include_once "model/conexion.php";

    $sqlPasajero = "INSERT INTO pasajeros (nombres, apellido_paterno, apellido_materno, fecha_nacimiento, celular)
                    VALUES (?, ?, ?, ?, ?)";

    $stmtPasajero = $bd->prepare($sqlPasajero);

    $resultadoPasajero = $stmtPasajero->execute([$nombres, $apellido_paterno, $apellido_materno, $fecha_nacimiento, $celular]);

    if ($resultadoPasajero) {
        $idPasajero = $bd->lastInsertId();

        $sqlVuelo = "INSERT INTO vuelos (numero_vuelo, origen, destino, fecha_salida, hora_salida, precio)
                     VALUES (?, ?, ?, ?, ?, ?)";

        $stmtVuelo = $bd->prepare($sqlVuelo);

        // Establece los valores adecuados para origen y destino (debes obtenerlos del formulario)
        $origen = "Origen";
        $destino = "Destino";

        $resultadoVuelo = $stmtVuelo->execute([$numero_vuelo, $origen, $destino, $fecha_vuelo, $hora_vuelo, $precio]);

        if ($resultadoVuelo) {
            $idVuelo = $bd->lastInsertId();

            $sqlReserva = "INSERT INTO reservas (id_vuelo, id_pasajero, id_usuario, fecha_reserva)
                           VALUES (?, ?, ?, ?)";

            $stmtReserva = $bd->prepare($sqlReserva);

            $resultadoReserva = $stmtReserva->execute([$idVuelo, $idPasajero, $id_usuario, $fecha_reserva]);

            if ($resultadoReserva) {
                echo "Reserva creada correctamente.";
            } else {
                echo "Error al crear la reserva.";
            }
        } else {
            echo "Error al crear el vuelo.";
        }
    } else {
        echo "Error al crear el pasajero.";
    }
}
?>
