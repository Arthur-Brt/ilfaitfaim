let max_fields = 15;
let wrapper = document.getElementById("input_fields_wrap");
let add_button = document.getElementById("add_ingredient");
let remove_button = document.getElementsByClassName("remove_ingredient");
let boxcount = document.getElementById("boxCount");
let difficult_box = document.getElementById("add_difficult")
let facile = document.getElementById("facile");
let moyen = document.getElementById("moyen");
let difficile = document.getElementById("difficile");
let dif = document.getElementsByClassName("dif");
let cat = document.getElementsByClassName("cat");
let entree = document.getElementById("entree");
let plat = document.getElementById("plat");
let dessert = document.getElementById("dessert");
let inpFile = document.getElementById("imgInp");
let previewContainer = document.getElementById("imagePreview");
let previewImage = previewContainer.querySelector(".image-preview__image");
let previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
let description = document.getElementById("description");


let box = boxcount.value;

function addBox() {
    event.preventDefault();
    if (box < max_fields) {
        box++;
        var inputIng = document.createElement('input');
        inputIng.type = "text";
        inputIng.name = "ingredient_" + box;
        inputIng.placeholder = "Ingrédient";

        /*Le bouton de suppression de l'ingrédient */
        var removeBtn = document.createElement('button');
        removeBtn.className = "remove_ingredient";
        removeBtn.textContent = "X";

        var divIngre = document.createElement('div');




        divIngre.appendChild(inputIng);
        divIngre.appendChild(removeBtn);
        wrapper.appendChild(divIngre);
        boxcount.value = box;


        console.debug(remove_button);
        console.debug(remove_button.length);
    }
}

function removeBox() {
    event.preventDefault();


    console.debug('hello');

}

function someListener(event) {
    event.preventDefault();
    var element = event.target;
    if (element.className == "remove_ingredient") {
        console.log("hi");
        /* Remonter jusqu'au parent */
        element.parentNode.remove();
        box--;
        boxcount.value = box;
    } else {
        console.log("loupé");
    }

}

function checkBtnDif() {

    event.preventDefault();

    if (facile.checked == true) {
        console.log("true");
        facile.parentNode.classList.add("selected");
        moyen.parentNode.classList.remove("selected");
        difficile.parentNode.classList.remove("selected");

    } else if (moyen.checked == true) {
        console.log("true");
        moyen.parentNode.classList.add("selected");
        facile.parentNode.classList.remove("selected");
        difficile.parentNode.classList.remove("selected");
    } else if (difficile.checked == true) {
        console.log("true");
        difficile.parentNode.classList.add("selected");
        facile.parentNode.classList.remove("selected");
        moyen.parentNode.classList.remove("selected");
    } else {
        console.log("loupé");
    }



}

function checkBtnCat() {

    event.preventDefault();

    if (entree.checked == true) {
        console.log("true");
        entree.parentNode.classList.add("selected");
        plat.parentNode.classList.remove("selected");
        dessert.parentNode.classList.remove("selected");
    } else if (plat.checked == true) {
        console.log("true");
        plat.parentNode.classList.add("selected");
        entree.parentNode.classList.remove("selected");
        dessert.parentNode.classList.remove("selected");
    } else if (dessert.checked == true) {
        console.log("true");
        dessert.parentNode.classList.add("selected");
        entree.parentNode.classList.remove("selected");
        plat.parentNode.classList.remove("selected");
    } else {
        console.log("loupé");
    }



}


add_button.addEventListener("click", addBox);

wrapper.addEventListener("click", someListener);

inpFile.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        previewDefaultText.style.display = "none";
        previewImage.style.display = "block";


        reader.addEventListener("load", function () {

            previewImage.setAttribute("src", this.result);
        });
        reader.readAsDataURL(file);
    } else {
        previewDefaultText.style.display = null;
        previewImage.style.display = null;
        previewImage.setAttribute("src", "");
    }
})
for (let i = 0; i < dif.length; i++) {

    dif[i].addEventListener("change", checkBtnDif)

}


for (let i = 0; i < cat.length; i++) {

    cat[i].addEventListener("change", checkBtnCat)

}


/***********************Compte le nb de craractere dans la description */

function countChar() {
    var len = this.value.length;
    console.log("len");
}
description.addEventListener("onkeyup", countChar);