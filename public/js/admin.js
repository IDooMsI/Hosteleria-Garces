var divFooter = document.getElementById("footer");
var url = window.location;
if (url.href.includes("admin") || url.href.includes("client") || url.href.includes("work") ||
    url.href.includes("job") || url.href.includes("category") || url.href.includes("subcategory") ||
    url.href.includes("tecnic") || url.href.includes("calculadora") || url.href.includes("publication"))
{
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

function newProvider() {
    var campo = document.getElementById('div-new-provider')
    campo.removeAttribute('style')
}

function cancelNewProvider() {
    var campo = document.getElementById('div-new-provider')
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
function countChars(obj) {
    var maxLength = 300;
    var strLength = obj.value.length;
    var charRemain = (maxLength - strLength);

    if (charRemain < 0) {
        document.getElementById("charNum").innerHTML = '<span style="color: red;">Has exedido el maximo de  ' + maxLength + ' caracteres</span>';
    } else {
        document.getElementById("charNum").innerHTML = charRemain + ' caracteres restantes';
    }
}
function newCategory() {
    var campo = document.getElementById('div-nueva-categoria')
    campo.removeAttribute('style')
}
function cancelNewCategory(){
    var campo = document.getElementById('div-nueva-categoria')
    campo.style.display = 'none'
}
function newSubcategory() {
    var campo = document.getElementById('div-nueva-subcategoria')
    campo.removeAttribute('style')
}
function cancelNewSubcategory(){
    var campo = document.getElementById('div-nueva-subcategoria')
    campo.style.display = 'none'
}
function newSubsubcategory() {
    var campo = document.getElementById('div-nueva-subsubcategoria')
    campo.removeAttribute('style')
}
function cancelNewSubsubcategory(){
    var campo = document.getElementById('div-nueva-subsubcategoria')
    campo.style.display = 'none'
}



