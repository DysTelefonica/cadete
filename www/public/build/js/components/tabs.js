let tabHeaders= document.getElementsByClassName("tab__header");

for (let h = 0; h < tabHeaders.length; h++) {

    let tabHeader = tabHeaders[h];

    //Asumimos que el tab__body está justo después del tab__header
    let tabBody = tabHeader.nextElementSibling;

    if(tabHeader){
        
        let tabsPane = tabHeader.getElementsByTagName("div");

        //Pone el icono azul de la tab activa

        let activeTab = tabHeader.querySelector(".active");

        if (activeTab) {

            activeTab.querySelector(".ico").classList.remove("d");
            activeTab.querySelector(".ico").classList.add("b");
        }

        for(let i=0; i<tabsPane.length;i++){

            tabsPane[i].addEventListener("click", function(){

                //Quita la tab activa y pone el icono de color negro
                if (activeTab){
                    activeTab.querySelector(".ico").classList.remove("b");
                    activeTab.querySelector(".ico").classList.add("d");
                    activeTab.classList.remove("active");
                }

                //Pone la tab activa y pone el icono de color azul
                tabsPane[i].classList.add('active');
                tabsPane[i].getElementsByClassName('ico')[0].classList.remove("d");
                tabsPane[i].getElementsByClassName('ico')[0].classList.add("b");

                //Ponemos el contenido según la pestaña seleccionada
                let tabContents = tabBody.querySelectorAll(".tab");

                for (let j =0; j < tabContents.length; j++) {

                    tabContents[j].classList.remove("active");

                }

                    tabContents[i].classList.add("active");

                    activeTab = tabsPane[i];

            });
        }
    }

}