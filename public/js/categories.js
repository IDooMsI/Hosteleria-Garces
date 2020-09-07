function categorias(id){
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var subcategoriasJson = JSON.parse(xhttp.responseText);
                var html;
                html += "<option value='0'>Elija una Opcion</option>";
                var selectSubcategorias = document.getElementById("subcategorias");
                selectSubcategorias.innerHTML = html;
                subcategoriasJson.subcategories.forEach(function(valor , clave){
                    html += "<option id='"+valor.id+"' value='" + valor.id + "'>" + valor.name + "</option>";
                });
                var selectSubcategorias = document.getElementById("subcategorias");
                selectSubcategorias.innerHTML = html;
        };
        
    };
    xhttp.open("GET", "localhost:8000/subcategories/categories/"+id);
    xhttp.send();
}   