<?php
require RUTA_APP . '/views/includes/header.php';
?>

<body>

    <main class="container">
    <h1 class="pt-4">Listado de Reservas</h1>

        <div class="row">
            <?php foreach ($data['reservas'] as $reserva) : ?>
                <div class="col-md-3 pb-4">

                    <div class="card" style="width: 16rem;">
                        <img src="https://images.pexels.com/photos/164595/pexels-photo-164595.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top rounded-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo "Habitación Nº" .  $reserva->num_hab . " " . $reserva->nombre_tipo; ?></h5><hr>
                            <div class="bg-light rounded-3 p-3">
                            <p class="card-subtitle mb-2 text-muted">Habitación a nombre de <?php echo $reserva->nombre_cli . " " . $reserva->apellido_cli . "."; ?></p>
                            <p class="card-text mb-2 text-muted">DNI: <?php echo $reserva->dni_cli; ?></p>
                            <p class="card-text mb-2 text-muted">Contacto: <?php echo $reserva->telefono_cli; ?></p>
                            </div>

                        </div>
                        <ul class="list-group list-group-flush">
                            <p class="list-group-item">Check-In: <?php echo $reserva->checkin_res; ?> <br>Check-Out: <?php echo $reserva->checkout_res;?></p>
                        </ul>
                        <div class="card-footer">

                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    </main>

</body>

<?php
require RUTA_APP . '/views/includes/footer.php';
?>