function choice(image_id, publication_id) {
    var imageGrande = document.getElementById(publication_id)
    var miniatura = document.getElementById(image_id);
    imageGrande.setAttribute('src',miniatura.src)
} 