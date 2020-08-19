function calcularParcial(id)
{
    var tr = document.getElementById(id)
    var thCantidad = tr.children[2]
    var inputCantidad = thCantidad.children[0]
    var cantidad = inputCantidad.value

    var thValor = tr.children[1]
    var inputValor = thValor.children[0]
    var valor = inputValor.value

    var total = valor*cantidad
    totalFinal(total)
}
function totalFinal(total){
    var totalParcial = document.getElementById("total")
    totalParcial.value += total
    totalFinal.setAttribute('value',totalParcial)
}