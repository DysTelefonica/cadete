//Con esta función, se podrán seleccionar filas de la tabla
function selectedRow(){
    
    //Definimos las variables
    var index,
        //table = document.getElementById('tabla'),
        table = document.getElementsByTagName('table'),
        rows = document.getElementsByTagName("tr");

    //Bucle for para buscar la fila seleccionada
    for(var i = 0; i < table.rows; i++){

        //Cuando hagamos click en la fila, ejecutará la función
        var currentRow = table.rows[i];

        var createClickHandler = function(row){

            return function(){

                //Si ya hay una fila seleccionada, la deselecciona
                if(typeof index !== "undefined"){
                                    
                    table.rows[index].classList.toggle("selected");
                }

                //Devuelve la fila seleccionada
                index = this.rowIndex;

                //Añade la clase "selected" a la fila (personalizar con css)
                this.classList.toggle("selected");

                //Imprime la fila seleccionada en consola
                console.log("Se ha seleccionado la fila " + index + " de la tabla.");

            };
        };

        currentRow.onclick = createClickHandler(currentRow);

    }

}

selectedRow();

function buildTable(data, table, rowFragments){

    //Obtenemos la tabla que queramos construir
    var table = document.getElementById(table);
    table.innerHTML = '';

    //recorremos el array
    data.forEach(function (data) {

        var newRow = buildRow(rowFragments, data);

        //Insertamos el código
        table.innerHTML += newRow;   

    });
  
}

function buildRow(rowFragments, data){

    var newRow = '';

    //Constuye el row a partir de los fragmentos
    for (var i = 0; i < rowFragments.length; i++) {

        //Si es falso, no requiere más acciones y concatena el contenido de la primera columna
        if (!rowFragments[i][1]) {

            newRow += rowFragments[i][0];
        } 
        
        //En caso de ser verdadero, tendrá que ejecutar lo que hay en la tercera columna. Si es verdadero, entonces si que carga la row
        else {

            //Si la tercera columna es verdadera, ya ha hecho la operación previamente y concatenamos
            if(rowFragments[i][2]){

                newRow += rowFragments[i][0];
            }

            else{     
                
                //Si la última columna está vacía, verificamos caso por caso
                if(rowFragments[i][2] === ''){

                    //Verificamos la variable adjunto
                    if(data['adjunto'] !== undefined){
                        newRow += rowFragments[i][0];
                    }

                }                

            }

        }

    }

    // Sustituir los marcadores de posición por los valores de data
    for (var key in data) {
            
        if (typeof data[key] === 'object') {

            // Si el valor es un objeto, iterar sobre sus claves
            for (var innerKey in data[key]) {
                
                var regex = new RegExp("{{" + key + "." + innerKey + "}}", "g");
                var newRow = newRow.replace(regex, data[key][innerKey]);
            }
        }
        else {

            // Si el valor no es un objeto, simplemente reemplazar la variable en la fila
            var regex = new RegExp("{{" + key + "}}", "g");
            var newRow = newRow.replace(regex, data[key]);
        }
    }

    return newRow;

}

function buildRow2(newRow, data){

    // Sustituir los marcadores de posición por los valores de dat
    for (var key in data) {
            
        if (typeof data[key] === 'object') {

            // Si el valor es un objeto, iterar sobre sus claves
            for (var innerKey in data[key]) {
                
                var regex = new RegExp("{{" + key + "." + innerKey + "}}", "g");
                var newRow = newRow.replace(regex, data[key][innerKey]);
            }
        }else {

            // Si el valor no es un objeto, simplemente reemplazar la variable en la fila
            var regex = new RegExp("{{" + key + "}}", "g");
            var newRow = newRow.replace(regex, data[key]);
        }
    }

    return newRow;

}

//Con la siguiente función definiremos la paginación de la tabla    
const itemsPerPage = 3;
let currentPage = 1;

function displayPagination() {

    //Definimos el número total de paginas
    const totalPages = Math.ceil(data.length / itemsPerPage);

    //Definimos el número de registros por páginas
    const paginationElement = document.getElementById("pagination");
    paginationElement.innerHTML = "";

    for (let i = 1; i <= totalPages; i++) {
      const pageLink = document.createElement("a");
      pageLink.href = "#";
      pageLink.classList.add("page-link");
      pageLink.textContent = i;

      if (i === currentPage) {
        pageLink.classList.add("active");
      }

      pageLink.addEventListener("click", function () {
        currentPage = i;
        displayTableData(currentPage);
        displayPagination();
      });

      paginationElement.appendChild(pageLink);
    }
}