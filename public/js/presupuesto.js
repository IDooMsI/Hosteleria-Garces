window.addEventListener('load',function(){
    var precioBase = document.getElementById('precioBase').innerHTML
    var cantidadBase = document.getElementById('cantidadBase').value
    var totalBase = parseInt(precioBase) * parseInt(cantidadBase)
    var inputTotal = document.getElementById('total')
    inputTotal.setAttribute('value',totalBase)
})

function calcularParcial(id)
{
    var tr = document.getElementById(id)
    
    var thValor = tr.children[1]
    var inputValor = thValor.children[0]
    var valor = inputValor.value

    var thCantidad = tr.children[2]
    var inputCantidad = thCantidad.children[0]
    var cantidad = inputCantidad.value
    
    var subtotal = valor*cantidad

    var thSubTotal = tr.children[3]
    var inputSubTotal = thSubTotal.children[0]
    inputSubTotal.setAttribute('value',subtotal) 

    sumarSubtotales()
}

function sumarSubtotales()
{   
    var reducer = (accumulator, currentValue) => accumulator + currentValue
    var cuentaArray = []
    var subtotales = document.getElementsByClassName('subtotal')
    Array.from(subtotales).forEach(function(subtotal){
        cuentaArray.push(parseInt(subtotal.value))
    })

    sumaSubtotales = cuentaArray.reduce(reducer)
    totalFinal(sumaSubtotales)
}

function totalFinal(subtotal){
    precioBase = document.getElementById('precioBase').innerHTML
    cantidadBase = document.getElementById('cantidadBase').value
    totalBase = parseInt(precioBase) * parseInt(cantidadBase)
    var total = totalBase + subtotal
    console.log(total)
    inputTotal = document.getElementById('total')
    inputTotal.setAttribute('value',total)
}