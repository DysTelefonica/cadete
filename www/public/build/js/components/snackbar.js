const Snackbar = {

    open (options) {
        options = Object.assign({}, {
            message: '',
            ico: '',
            color: '',
            oncancel: function (){}
        }, options);

        const snackbarHtml = `
            <div class="snackbar ${options.color}">

                <div class="snackbar__content">
                    <svg class="ico ${options.ico}"></svg>
                    <span> ${options.message} </span>
                    <div class="snackbar__close"> Cerrar </div>
                </div>      

            </div>
        `;
 
        const snackbarTemplate = document.createElement('template');
        snackbarTemplate.innerHTML = snackbarHtml;

        const snackbarEl = snackbarTemplate.content.querySelector('.snackbar');
        const snackbarClose = snackbarTemplate.content.querySelector('.snackbar__close');
        

        snackbarEl.addEventListener('click', e => {
            if (e.target === snackbarEl) {
                options.oncancel();
                this._close(snackbarEl);
            }
        });

        snackbarClose.addEventListener('click', () => {
            options.oncancel();
            this._close(snackbarEl);
        });

        document.body.appendChild(snackbarTemplate.content);

    },
       
    _close (snackbarEl) {

        snackbarEl.classList.add('snackbar--close');
        snackbarEl.addEventListener('animationend', () => {
            document.body.removeChild(snackbarEl);
        });
    }
    
};

function showSnackbar(message, ico, color){

    Snackbar.open({
        message: message,
        ico: ico,
        color: color,
    })

}

function deleteSnackbar(snackbars){

    document.body.removeChild(snackbars);

    // for (let i = 0; i > snackbars.length; i++) {  
        
    //     console.log(snackbars[i]);

    //     document.body.removeChild(snackbars[i]);
    // }  

}