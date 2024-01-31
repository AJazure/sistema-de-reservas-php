 $('form').submit(function (event) {
    //evito que se realice la acción predet del form
    event.preventDefault();

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {
            if (data.disponible) {

                //muestro el modal de disponibilidad y agrego btn reservar
                $('#modalDisponibilidad .modal-body').html('La habitación está disponible del ' + data.checkin + ' al ' + data.checkout);
                $('#modalDisponibilidad .modal-footer').html('<button type="button" class="btn btn-primary" id="btnReservar">Reservar Ahora</button>');
        
                //vinculo una ruta con el btn de reservar
                $('#btnReservar').on('click', function () {
                    //ruta con los datos necesarios
                    //window.location.href = data.ruta + "main/" + data.checkin + "&checkout=" + data.checkout + "&id_hab=" + data.habitacion;
                    var url = data.ruta + "reserva/create/" + data.checkin + "/" + data.checkout + "/" + data.habitacion;
                    window.location.href = url;
                });
        
                //muestro el modal de disponible
                $('#modalDisponibilidad').modal('show');

            } else {

                //si la response fue false, entonces no está disponible y muestro otro modal
                $('#modalNoDisponible .modal-body').html('La habitación no está disponible para las fechas indicadas.');
                $('#modalNoDisponible').modal('show');

            }
        },
        error: function (error) {
            console.log('Error en la solicitud AJAX:', error);
        }
    });
});