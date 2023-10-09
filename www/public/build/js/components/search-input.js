function searchTable(filter, data){

    var filteredData = []

    // Ponemos el valor en minúscula y sin tildes para compararlos
    var filter = removeAccents(filter.toLowerCase())

    //recorremos todo el array
    for (var i = 0; i < data.length; i++){

        var objectKeys = Object.keys(data[i]);

        //recorremos todas las propiedades del array hasta dar con una que cumpla el filtro
        for (var j = 0; j < objectKeys.length; j++) {

            var key = objectKeys[j];

            if (data[i][key] !== null) {

                //Le quitamos las tildes y lo ponemos en minúscula
                var data2 = removeAccents(data[i][key].toLowerCase());

                //Ahora lo comparamos con el filter, y si coincide, lo metemos en un array
                if (data2.includes(filter)) {
                    filteredData.push(data[i]);
                    break;
                }

            }
        }

    }

    return filteredData

}

function searchTableCheckbox(values, data){

    var filteredData = []

    //Recorramos todo el array para compararlo con el valor introducido
    for (var i = 0; i < data.length; i++){

        //Si el valor de la tabla contiene lo escrito
        for (var n = 0; n < values.length; n++){
            if(data.includes(values[n])){
                filteredData.push(data[i]);
            }
        }
    }

    return filteredData

}

const removeAccents = (str) => {

    //Con esta función eliminamos las tildes, para una mejor búsqueda
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

//Esas funciones sirven para filtrar la tabla con el search-input

    function limpiarInput() {

        //Al pulsar el botón "Limpiar", quita el texto del input
        document.getElementById('search-input').value = '';

        //Restaura la tabla
        filtrar__tabla(data, t, row);
    }

    function filtrar__tabla(d, t, r) {

        //Filtra la tabla con lo que se ponga en el search-input

        //Obtenemos el valor escrito
        var value = document.getElementById('search-input').value

        //Si el texto buscado tiene más de dos caracteres
        if(value != "" && value.length > 2){

            //Lo comparamos con el array de datos
            var filter = searchTable(value, d)

            //Reconstruimos la tabla
            buildTable(filter, t, r);
        }
        else{
            buildTable(d, t, r);
        }

    };