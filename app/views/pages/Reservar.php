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
            <form action="<?php echo RUTA_URL; ?>reserva/store" method="POST" class="container mt-4 p-4 bg-light">
                <div class="row">
                    <div class="col-md-3">
                        <label for="nombre_cli" class="form-label">Nombre</label>
                        <input type="text" name="nombre_cli" id="nombre_cli" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="apellido_cli" class="form-label">Apellido</label>
                        <input type="text" name="apellido_cli" id="apellido_cli" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label for="dni_cli" class="form-label">DNI</label>
                        <input type="text" name="dni_cli" id="dni_cli" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label for="telefono_cli" class="form-label">Teléfono</label>
                        <input type="text" name="telefono_cli" id="telefono_cli" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-2">
                        <label for="checkin" class="form-label">Fecha de entrada</label>
                        <input type="text" name="checkin" id="checkin" class="form-control" value="<?php echo $data['checkin']; ?>" disabled>
                    </div>
                    <div class="col-md-2 mt-2">
                        <label for="checkout" class="form-label">Fecha de salida</label>
                        <input type="text" name="checkout" id="checkout" class="form-control" value="<?php echo $data['checkout']; ?>" disabled>
                    </div>
                    <div class="col-md-3 mt-2">
                        <label for="id_hab" class="form-label">Habitación</label>
                        <input type="text" name="id_hab" id="id_hab" class="form-control" value="Nº <?php echo $data['habitacion'] ?>" disabled>

                    </div>
                    <!-- button trigger -->
                    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Confirmar Reserva
                    </button>
                </div>
            </form>
            
            <!-- modal confirmación -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmar Reserva</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Gracias por haber llegado hasta aquí. Proximamente podría haber registro.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Gracias</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>




        </section>

    </main>