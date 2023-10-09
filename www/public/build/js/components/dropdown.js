const dropdown = {

    open (options) {
        options = Object.assign({}, {
            elements: '',
            clickedButton: '',
            oncancel: function (){}
        }, options);


        // Función para construir el contenido del dropdown
        function buildDropdown(elements) {

            let dropdownContent = '';
        
            elements.forEach((element) => {
            dropdownContent += `
                <label>
                <input 
                    type="checkbox" 
                    name="${element.denominador}" 
                    value="${element.denominador}" 
                >
                <span> ${element.denominador} </span>
                <br>
                </label>
            `;
            });
        
            return dropdownContent;
        }

        // Construir el contenido del dropdown
        const dropdownHtml = `

            ${buildDropdown(options.elements)}
            <div class="dropdown__close"> </div>

        `;

        //Creamos el elemento div para el dropdow
        const dropdownTemplate = document.createElement('div');
        dropdownTemplate.classList.add('dropdown');
        dropdownTemplate.innerHTML = dropdownHtml;

        //Agregamos el HTML al último hijo
        options.clickedButton.appendChild(dropdownTemplate);

        const dropdownEl =      document.querySelector('.dropdown');
        const dropdownClose =   document.querySelector('.dropdown__close');

        dropdownEl.addEventListener('click', e => {
            if (e.target === dropdownEl) {
                options.oncancel();
                this._close(dropdownEl);
            }
        });

    },
       
    _close (dropdownEl) {

        dropdownEl.classList.add('snackbar--close');
        dropdownEl.addEventListener('animationend', () => {
            document.body.remove(dropdownEl);
        });
    }
    
};

function showDropdown(clickedButton, elements){

    dropdown.open({
        clickedButton: clickedButton,
        elements: elements,
    })

}
