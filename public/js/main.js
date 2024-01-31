//alert('Hola, el Js ya funciona');

//obtengo los input de chekin y checkout
var checkin = document.getElementById("checkin");
var checkout = document.getElementById("checkout");

checkin.addEventListener("change", function() {
    //creo un obj date con el val de checkin.
    var fecha = new Date(checkin.value);
    //sumo un día a fecha
    fecha.setDate(fecha.getDate() + 1);
    //formateo la fecha a yyyy-mm-dd para evitar errores
    var minimo = fecha.toISOString().slice(0, 10);
    //asigno la fecha al input de checkout
    checkout.value = minimo;
    //establecezco el valor mínimo del input de checkout
    checkout.min = minimo;
});