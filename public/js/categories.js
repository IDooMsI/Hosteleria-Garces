function categorias(){
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var categoriasJson = JSON.parse(xhttp.responseText);
                var html;
                html += "<option value='0'>Elija una Opcion</option>";
                var selectCategorias = document.getElementById("subcategorias");
                selectCategorias.innerHTML = html;
                categoriasJson.categorias.forEach(function(valor , clave){
                    html += "<option id='"+valor.id+"' value='" + valor.id + "'>" + valor.name + "</option>";
                });
                var selectCategorias = document.getElementById("subcategorias");
                selectCategorias.innerHTML = html;
        };
        
    };
    xhttp.open("GET", "https://apis.datos.gob.ar/georef/api/provincias?campos=id,nombre", true);
    xhttp.send();
}