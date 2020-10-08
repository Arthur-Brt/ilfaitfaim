<?php
include './controllers/update.php';
?>
<main>
    <section class="add_div">
        
        <form action="../controllers/update.php" method="post" enctype="multipart/form-data" class="add_form">
            <p class="signuperror"><?= $errorAdd ?> </p>
            <section class="add_title">
                <label for="name">Titre : </label>

                <input type="text" name="name" value="<?= $post['name'] ?>">
            </section>
            <section class="add_description">
                <label for="description">Description (500 caractères max) : </label>

                <textarea name="description" rows="5" cols="115" wrap="hard" maxlength="500"
                    placeholder='Faite une courte présentation de votre recette ici...'
                    style="background-color:#f1f1f1;" required><?= $post['description'] ?></textarea>
            </section>
            <section class="input">

                <section class="ingredient_form">
                    <h3>Ingrédients</h3>
                    <div id="input_fields_wrap" class="input_fields_wrap">
                        <?php $i=0 ?>
                        <?php foreach($ingre as $ingre): ?>
                        <?php $split = explode("_",$ingre) ?>
                        <?php $i++ ?>
                        <div>
                            <input type="text" name="ingredient_<?= $i ?>" value="<?= $split[0] ?>">
                            <button class="remove_ingredient"> X</button>
                        </div>

                        <?php endforeach ?>

                        <input type="hidden" name="box" value=<?= $post['box'] ?> id="boxCount">

                    </div>

                    <button id="add_ingredient" class="update_ingredient"> Ajouter un ingrédient </button>
                </section>

                <section class="add_content">
                    <label for="content">Recette : </label>
                    <textarea name="content" rows="25" cols="75" wrap="hard"> <?= $post['text'] ?></textarea>
                </section>
            </section>

            <section class="add_misc">

                <div class="add_difficult" id="add_difficult">
                    <h4>Difficulté : </h4>
                    <div <?php if($post['difficulte']=="facile"){
                                echo "class='selected'";
                                    }?>>
                        <label for="facile">Facile</label>

                        <input class="dif" type="radio" id="facile" name="difficulte" value="facile" <?php if($post['difficulte']=="facile"){
                                echo "checked='checked'";
                                    }?>>

                    </div>

                    <div <?php if($post['difficulte']=="moyen"){
                                echo "class='selected'";
                                    }?>>
                        <label for="moyen">Moyen</label>
                        <input class="dif" type="radio" id="moyen" name="difficulte" value="moyen" <?php if($post['difficulte']=="moyen"){
                                echo "checked='checked'";
                                    }?>>

                    </div>

                    <div <?php if($post['difficulte']=="difficile"){
                                echo "class='selected'";
                                    }?>>
                        <label for="difficile">Difficile</label>
                        <input type="radio" id="difficile" name="difficulte" value="difficile" class="dif" <?php if($post['difficulte']=="difficile"){
                                echo "checked='checked'";
                                    }?>>

                    </div>

                </div>
                <div class="add_difficult">

                    <h4>Catégorie : </h4>
                    <div <?php if($post['category']=="1"){
                                echo "class='selected'";
                                    }?>>
                        <label for="category">Entrée</label>
                        <input class="cat" type="radio" id="entree" name="category" value="1" <?php if($post['category']=="1"){
                                echo "checked='checked'";
                                    }?>>

                    </div>

                    <div <?php if($post['category']=="2"){
                                echo "class='selected'";
                                    }?>>
                        <label for="category">Plat</label>
                        <input class="cat" type="radio" id="plat" name="category" value="2" <?php if($post['category']=="2"){
                                echo "checked='checked'";
                                    }?>>

                    </div>

                    <div <?php if($post['category']=="3"){
                                echo "class='selected'";
                                    }?>>
                        <label for="category">Dessert</label>
                        <input class="cat" type="radio" id="dessert" name="category" value="3" <?php if($post['category']=="3"){
                                echo "checked='checked'";
                                    }?>>

                    </div>
                </div>

                <div class="input_nb">
                    <label for="preparation"> Temps de préparation (min) : </label>
                    <input type="number" id="preparation" name="preparation" value=<?= $post['preparation'] ?>>
                </div>
                <div class="input_nb">
                    <label for="cuisson"> Temps de cuisson (min) : </label>
                    <input type="number" id="cuisson" name="cuisson" value=<?= $post['cuisson'] ?>>
                </div>
                <div class="input_nb">
                    <label for="repos"> Temps de repos (min) : </label>
                    <input type="number" id="repos" name="repos" value=<?= $post['repos'] ?>>
                </div>
            </section>
            <div class=add_input>
                <input type="file" name="picture" id="imgInp">
                <div class="image-preview" id="imagePreview">

                    <img src="./uploads_img/<?= $post['image'] ?>" alt="Image Preview" class="image-preview__image"
                        style="display:block">
                    <span class="image-preview__default-text" style="display:none">Image Preview</span>

                </div>
            </div>
            <div>
                <input type="submit" value="Enregistrer votre recette" class="add_btn" name="update_submit">
            </div>
            <input type="hidden" name="id" value=<?= $post['id']?>>

        </form>
    </section>
</main>

<script type="text/javascript" src="./js/add.js"></script>
<script type="text/javascript" src="./js/update.js"></script>