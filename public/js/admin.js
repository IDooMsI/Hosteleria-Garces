var divFooter = document.getElementById("footer");
var url = window.location;
if (url.href.includes("admin") || url.href.includes("client") || url.href.includes("spec") || url.href.includes("job") || url.href.includes("subcategory")){
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

function buscador(){
    var buscador = document.getElementById('div-buscador')
    var botonBuscador = document.getElementById('button-buscador')
    buscador.removeAttribute('style')    
    botonBuscador.style.display = 'none'
}

function cancelBuscador(){
    var buscador = document.getElementById('div-buscador')
    var botonBuscador = document.getElementById('button-buscador')
    botonBuscador.removeAttribute('style')
    buscador.style.display = 'none'
}
