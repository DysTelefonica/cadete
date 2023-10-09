//Este script pone como fecha predeterminada el día de hoy

function obtenerFechaHoy(){

    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth()+1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
    
    if(dia<10)
        dia='0'+dia; //agrega cero si el menor de 10
    if(mes<10)
        mes='0'+mes //agrega cero si el menor de 10       

    var fechaHoy = ano+"-"+mes+"-"+dia;

    return fechaHoy;

}


function obtenerFechayHora(){

    // Crear una instancia del objeto Date
    var fechaHoraActual = new Date();

    // Obtener la fecha actual
    var fechaActual = fechaHoraActual.toLocaleDateString();

    // Obtener la hora actual
    var horaActual = fechaHoraActual.toLocaleTimeString();

    var fecha = fechaActual + ' ' + horaActual;

    return fecha;

}