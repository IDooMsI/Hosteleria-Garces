function categorias(id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var subcategoriasJson = JSON.parse(xhttp.responseText);
            var html;
            var selectSubcategorias = document.getElementById("subcategory");
            html += "<option value=''>Elija una Opcion</option>";
            if(subcategoriasJson.data.length > 0){
                subcategoriasJson.data.forEach(function(valor , clave){
                    html += "<option id='"+valor.id+"' value='" + valor.id + "'>" + valor.name + "</option>";
                });
            }else{
                html = "<option>No hay valores</option>";
            }
            selectSubcategorias.innerHTML = html;
        };
        
    };
    xhttp.open("GET", "http://localhost:8000/subcategories/categories/"+id);
    xhttp.send();
}

function subcategorias(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var subsubcategoriasJson = JSON.parse(xhttp.responseText);
            var html;
            var selectSubsubcategorias = document.getElementById("subsubcategory");
            html += "<option value=''>Elija una Opcion</option>";
            if (subsubcategoriasJson.data.length > 0) {
                subsubcategoriasJson.data.forEach(function (valor, clave) {
                    html += "<option id='" + valor.id + "' value='" + valor.id + "'>" + valor.name + "</option>";
                });
            } else {
                html = null
            }
            selectSubsubcategorias.innerHTML = html;
        };
    };
    xhttp.open("GET", "http://localhost:8000/subsubcategories/subcategories/" + id);
    xhttp.send();
}

function traer(){
    select = document.getElementById('category')
    option = select.value
    categorias(option)
}

function traer2() {
    select = document.getElementById('subcategory')
    option = select.value
    subcategorias(option)
}