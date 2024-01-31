<?php
/*
Contendrá el form para cargar los datos del cliente y así realizar una reserva
*/
?>

<?php
    require RUTA_APP . '/views/includes/header.php';
?>

<main>
    <h1>Este es el form para la reserva</h1>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1>Reservar Habitación</h1>
                    <a href="<?php RUTA_APP; ?> deberia/volver/atras" class="btn btn-sm btn-secondary text-uppercase">
                        Volver Atras
                    </a>
                </div>

                <div class="col-12">
                    <?php require RUTA_APP . '/views/includes/forms/form.reserva.php'; ?>
                </div>

            </div>
        </div>
    </section>

    <section>
        <form action="<?php echo RUTA_URL; ?>reservas/showReservas">
            <button type="submit" class="btn btn-primary mt-3">Ver Todas las Reservas</button>
        </form>
    </section>

</main>

<?php
    require RUTA_APP . '/views/includes/footer.php';
?>