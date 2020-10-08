/*let max_fields=10;*/
let wrapper = document.getElementById("input_fields_wrap");
let update_button = document.getElementById("update_ingredient");
let boxcount = document.getElementById("boxCount");
let boxcount_start = document.getElementById("boxCount");

/* Valeur de box */
let box = boxcount_start;

function addBox() {
    event.preventDefault();
    if (box < max_fields) {
        box++;
        var inputIng = document.createElement('input');
        inputIng.type = "text";
        inputIng.name = "ingredient_" + box;
        inputIng.placeholder = "Ingrédient";

        wrapper.appendChild(inputIng);

        boxcount.value = box;

    }
}

update_button.addEventListener("click", addBox);