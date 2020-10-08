<?php
include './controllers/add.php';
?>
<main>
    <article class="add_div">
    
        <form action="../controllers/add.php" method="post" enctype="multipart/form-data" class="add_form">
            <p class="signuperror"><?= $errorAdd ?> </p>
            <section class="add_title">
                <label for="name">Titre : </label>
                <input type="text" name="name" id="name" placeholder="Titre de la recette"
                    value="<?=  $_SESSION['title'] ?>" required>
            </section>

            <section class="add_description">
                <label for="description">Description (500 caractères max) : </label>
                <textarea name="description" id="description" rows="5" cols="115" wrap="hard" maxlength="500"
                    placeholder='Faite une courte présentation de votre recette ici...'
                    style="background-color:#f1f1f1;" required><?=  $_SESSION['description'] ?></textarea>
            </section>

            <section class="input">

                <section class="ingredient_form">
                    <h3>Ingrédients</h3>
                    <div id="input_fields_wrap" class="input_fields_wrap">
                        <div>
                            <input type="text" name="ingredient_1" placeholder="Ingrédient" class="first_ingredient"
                                required>
                        </div>
                        <input type="hidden" name="box" value="<?= $_SESSION['box'] ?>" id="boxCount">
                    </div>
                    <button id="add_ingredient" class="add_ingredient"> Ajouter un ingrédient </button>
                </section>

                <section class="add_content">
                    <label for="content">Recette : </label>
                    <textarea name="content" id="content" rows="25" cols="75" wrap="hard"
                        placeholder="Partagez votre recette ici ..." style="background-color:#f1f1f1;"
                        required><?=  $_SESSION['content'] ?></textarea>
                </section>

            </section>

            <section class="add_misc">
                <div class="add_difficult" id="add_difficult">
                    <h4>Difficulté : </h4>
                    <div>
                        <label for="facile">Facile</label>
                        <input class="dif" type="radio" id="facile" name="difficulte" value="facile">
                    </div>
                    <div>
                        <label for="moyen">Moyen</label>
                        <input class="dif" type="radio" id="moyen" name="difficulte" value="moyen">
                    </div>
                    <div>
                        <label for="difficile">Difficile</label>
                        <input type="radio" id="difficile" name="difficulte" value="difficile" class="dif">
                    </div>
                </div>
                <div class="add_difficult">
                    <h4>Catégorie : </h4>
                    <div>
                        <label for="category">Entrée</label>
                        <input class="cat" type="radio" id="entree" name="category" value="1">
                    </div>
                    <div>
                        <label for="category">Plat</label>
                        <input class="cat" type="radio" id="plat" name="category" value="2">
                    </div>
                    <div>
                        <label for="category">Dessert</label>
                        <input class="cat" type="radio" id="dessert" name="category" value="3">
                    </div>
                </div>
                <div class="input_nb">
                    <label for="preparation"> Temps de préparation (min) : </label>
                    <input type="number" id="preparation" name="preparation" value="<?= $_SESSION['preparation'] ?>"
                        required>
                </div>
                <div class="input_nb">
                    <label for="cuisson"> Temps de cuisson (min) : </label>
                    <input type="number" id="cuisson" name="cuisson" value="<?= $_SESSION['cuisson'] ?>" required>
                </div>
                <div class="input_nb">
                    <label for="repos"> Temps de repos (min) : </label>
                    <input type="number" id="repos" name="repos" value="<?= $_SESSION['repos'] ?>" required>
                </div>
            </section>

            <div class=add_input>
                <input type="file" name="picture" id="imgInp">
                <div class="image-preview" id="imagePreview">
                    <img src="#" alt="Image Preview" class="image-preview__image">
                    <span class="image-preview__default-text">Image Preview</span>
                </div>
            </div>

            <div>
                <input type="submit" value="Enregistrer votre recette" class="add_btn" name="add_submit">
            </div>
            
        </form>
    </article>
</main>

<script type="text/javascript" src="./js/add.js"></script>
