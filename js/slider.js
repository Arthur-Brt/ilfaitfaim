let slider_content = document.getElementById('box');
let images = ['img2', 'img3', 'img4'];
let i = images.length;

let next = document.getElementById("next");
let preview = document.getElementById("preview");

//fonction pour l'image suivante
function nextImage() {

    if (i < images.length) {
        i++;
    } else {
        i = 1;
    }
    slider_content.innerHTML = "<img src=\"./img_slider/" + images[i - 1] + ".jpg\">";
};
//fonction pour l'image précédente
function priwImage() {

    if (i < images.length + 1 && i > 1) {
        i--;
    } else {
        i = images.length;
    }
    slider_content.innerHTML = "<img src=\"./img_slider/" + images[i - 1] + ".jpg\">";
}


//ecoute des boutons
setInterval(nextImage, 5000);
next.addEventListener("click", nextImage);
preview.addEventListener("click", priwImage);