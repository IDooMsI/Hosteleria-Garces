//Al cargar la pagina se calcula el precio base y se rellena el total
window.addEventListener('load',function(){
    var precioBase = document.getElementById('precioBase').innerHTML
    var cantidadBase = document.getElementById('cantidadBase').innerHTML
    var totalBase = parseInt(precioBase) * parseInt(cantidadBase)
    labelTotal = document.getElementById('total')
    labelTotal.innerHTML = totalBase
})

//Calcula el parcial de cada uno de los items multiplicando la cantidad por el valor y rellena el campo
//A su vez llama ala funcion sumarSubtotales()
function calcularParcial(id)
{
    var tr = document.getElementById(id)
    
    var thValor = tr.children[1]
    var labelValor = thValor.children[0]
    var valor = labelValor.innerHTML

    var thCantidad = tr.children[2]
    var inputCantidad = thCantidad.children[0]
    var cantidad = inputCantidad.value
    
    var subtotal = valor*cantidad

    var thSubTotal = tr.children[3]
    var labelSubTotal = thSubTotal.children[0]
    labelSubTotal.innerHTML = subtotal 

    sumarSubtotales()
}

//Captura todos los campos subtotales los guarda en un array y luego con reduce devuelve la suma de todo
//A su vez llama a la funcion totalFinal()
function sumarSubtotales()
{   
    var reducer = (accumulator, currentValue) => accumulator + currentValue
    var cuentaArray = []
    var subtotales = document.getElementsByClassName('subtotal')
    Array.from(subtotales).forEach(function(subtotal){
        cuentaArray.push(parseInt(subtotal.innerHTML))
    })

    sumaSubtotales = cuentaArray.reduce(reducer)
    totalFinal(sumaSubtotales)
}

//Suma el valor base del presupuesto + la suma de todos los subtotales y los inserta en el campo total
function totalFinal(subtotal){
    precioBase = document.getElementById('precioBase').innerHTML
    cantidadBase = document.getElementById('cantidadBase').innerHTML
    totalBase = parseInt(precioBase) * parseInt(cantidadBase)
    var total = totalBase + subtotal
    labelTotal = document.getElementById('total')
    labelTotal.innerHTML = total
}