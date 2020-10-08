<?php 
include './controllers/article.php';
?>
<main>
    <!-- <article class="recette_all"> -->
        <article class="recette_all">
            <img src="./uploads_img/<?= $post['image'] ?>" alt="image recette">

            <h4 class="title_recipe"><?= $post['name'] ?></h4>

            <p class="misc"> Préparation : <?= $post['preparation'] ?> min <i class="fa fa-star"></i> Cuisson :
                <?= $post['cuisson'] ?> min <i class="fa fa-star"></i> Repos : <?= $post['repos'] ?> min <i
                    class="fa fa-star"></i> Difficulté : <span class='diff_capital'><?= $post['difficulte'] ?> </span>
            </p>

            <section class="text_recette">
                <section class="description">
                    <h2>Description :</h2>
                    <p>
                        <?= ($post['description'] )?>

                    </p>
                </section>

                <section class="ingredient">
                    <h2>Ingrédients : </h2>

                    <ul>
                        <?php foreach($ingre as $ingre): ?>
                        <li>
                            <?= $ingre ?>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </section>

                <section class="instruction">
                    <h2> Instructions : </h2>

                    <p class="text_recipe"><?= ($post['text'] )?> </p>
                </section>

            </section>
        </article>

    <!-- </article> -->

    <!-- TEST COMMENTAIRES -->
    <?php if (isset($_SESSION['userId'])): ?>

        <form action='./controllers/comments.php' method='POST' class='form_comment'>
            <input type='hidden' class='comment_name' name='uid' required value=<?= $_SESSION['userName']?>>
            <input type='hidden' name='idArticle' value=<?=$post['id']?>>
            <input type='hidden' name='date' value=<?= date('Y-m-d ')?>>
            <label for="message"> Votre message : </label>
            <textarea class='comment_textarea' name='message' placeholder='Votre message' required></textarea><br>
            <button class='btn_comment' type='submit' name='commentSubmit'> Commenter </button>
        </form>

        <?php else :?>
            <div class='comment_login'>
                <p><a href='?page=connexion'>Connectez-vous</a> pour laissez un commentaire !</p>
            </div>
            
    <?php endif ?>


    <?php foreach($comments as $comment): ?>

        <div class="comment">
            <h6>Écrit par <span class='capitalize'><?= $comment['uName'] ?> </span>,
                <time datetime=<?= $comment['date'] ?>>le
                    <?php $dateInter=explode(' ',$comment['date']); 
                        $date=explode('-',$dateInter[0]); echo $date[2] ;echo ' '; echo $mois_fr[$date[1]-1] ;echo ' ';echo $date[0]  ?>
                </time>
            </h6>
            <p><?= $comment['text'] ?></p>

            <? if ($_SESSION['access']==1): ?>

                <a href='#modal1' class='js-modal' data-id=<?= $comment['cid'] ?>>Supprimer </a>
                <aside id='modal1' class='modal' aria-hidden='true' role='dialog' style='display:none'>
                    <div class='modal-wrapper js-modal-stop'>
                        <p>Etes-vous sur de vouloir supprimer cet élément ? </p>
                        <form method='POST' action='./controllers/deleteComment.php'>
                            <input id='delete' type='hidden' name='idToDelete' value=<?=$comment['cid']?>>
                            <input type='hidden' name='idArticle' value=<?=$_GET['id']?>>
                            <button type='submit'>Oui</button></form><button class='js-close-modal' data-id=''>Non</button>
                    </div>
                </aside>

            <? endif ?>

        </div>

    <?php endforeach ?>

</main>