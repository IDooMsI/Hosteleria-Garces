var divFooter = document.getElementById("footer");
var url = window.location;
if (url.href.includes("admin") || url.href.includes("client") || url.href.includes("work") || url.href.includes("job") || url.href.includes("subcategory") || url.href.includes("tecnic")){
    divFooter.style.display = "none";
}


function newLocality(){
    var campo = document.getElementById('div-new-category')
    campo.removeAttribute('style')
}

function cancelNewLocality(){
    var campo = document.getElementById('div-new-category')
    campo.style.display = 'none'
}

function openBuscador(){
    var buscador = document.getElementById('div-buscador')
    var botonBuscador = document.getElementById('button-buscador')
    buscador.removeAttribute('style')    
    botonBuscador.style.display = 'none'
}

function closeBuscador(){
    var buscador = document.getElementById('div-buscador')
    var botonBuscador = document.getElementById('button-buscador')
    botonBuscador.removeAttribute('style')
    buscador.style.display = 'none'
}

function preSubmit(){
    var form = document.getElementById('form-search')
    form.onsubmit = function(){
        var search = document.getElementById('input-search')
        if(search.value == "") {
            alert('El campo busqueda no puede estar vacio')
            return false
        }
        var category = document.getElementById('select-search')
        if(category.value == ""){
            alert('Debe seleccionar una categoria en donde buscar')
            return false
        }
    }
}

