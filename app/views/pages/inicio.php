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
        <h1>Sistema de Reservas</h1>

        <section>
            <form action="<?php echo RUTA_APP; ?>/reservas/findhabitacion" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label for="checkin" class="form-label">Fecha de entrada</label>
                        <input type="date" id="checkin" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="checkout" class="form-label">Fecha de salida</label>
                        <input type="date" id="checkout" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="num_hab" class="form-label">Nº de Habitación</label>
                        <input type="number" id="num_hab" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Buscar</button>
            </form>
        </section>

        <section>
            <form action="<?php echo RUTA_APP; ?>reservas/showReservas">
                <button type="submit" class="btn btn-primary mt-3">Ver Todas las Reservas</button>
            </form>
        </section>
        
    </main>
    
    <?php
        require RUTA_APP . '/views/includes/footer.php';
    ?>