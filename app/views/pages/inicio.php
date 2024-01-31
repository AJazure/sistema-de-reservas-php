<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['titulo'] ?></title>
</head>

<body>

    <?php
    require RUTA_APP . '/views/includes/header.php';
    ?>

    <main>
        <h1 class="text-center mt-4">Sistema de Reservas Foca Booking</h1>

        <section>
            <!--formulario de consulta de disponibilidad-->
            <form action="<?php echo RUTA_URL; ?>reserva/checkDisponibilidad" method="POST" class="container mt-4 p-4 bg-light">
                <div class="row">
                    <div class="col-md-2">
                        <label for="checkin" class="form-label">Fecha de entrada</label>
                        <input type="date" name="checkin" id="checkin" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="checkout" class="form-label">Fecha de salida</label>
                        <input type="date" name="checkout" id="checkout" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-md-5">
                        <label for="id_hab" class="form-label">Habitación</label>
                        <div class="col-sm-8">
                            <select id="id_hab" name="id_hab" class="form-control" required>
                                <option disabled selected>
                                    ---- seleccione una habitación ----
                                </option>

                                <?php foreach ($data['habitaciones'] as $habitacion) : ?>
                                    <option value="<?php echo $habitacion->id_hab; ?>">
                                        Nº <?php echo $habitacion->num_hab . " " . $habitacion->nombre_tipo ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Buscar</button>
                </div>
            </form>

            <!--modal de disponibilidad -->
            <div class="modal fade" id="modalDisponibilidad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Disponibilidad de Habitación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Contenido dinámico generado por JavaScript -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btnReservarAhora">Reservar Ahora</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--modal de no disponibilidad -->
            <div class="modal fade" id="modalNoDisponible" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Disponibilidad de Habitación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Contenido dinámico generado por JavaScript -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main>

    <?php
    require RUTA_APP . '/views/includes/footer.php';
    ?>