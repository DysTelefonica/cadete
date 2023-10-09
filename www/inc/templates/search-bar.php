<div class="filters">

    <div class="search-bar" id="search-bar">

        <svg class="ico ico__buscar d"> </svg>   
        <input 
            type="text" 
            id="search-input" 
            class="search-input" 
            placeholder="Filtrar registros de la tabla"
            autocomplete="off"
        > 

        <button 
            type="button" 
            class="button button__primary  button__blue"
            onclick="limpiarInput()"
            style= "height: 36px; line-height: 0;"
        > 
            Limpiar
        </button>

    </div>

</div>

<script>

    //Si existe el elemento 'search-input', lo prepara para filtrar la tabla que se haya definido
    document.getElementById('search-input').addEventListener('keyup', function(){
        filtrar__tabla(data, t, row);
    });

</script>