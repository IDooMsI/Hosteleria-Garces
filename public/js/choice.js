function choice(id) {
    var imageGrande = document.getElementById('principal')
    var miniatura = document.getElementById(id);
    imageGrande.setAttribute('src',miniatura.src)
} 