<?php 

include './controllers/result.php';

?>
<main>
    <?php  if (empty($posts)) : ?>
    <p class="no_result">Pas de résultat pour cette recherche...</p>
    <?php else : ?>

    <section class="list_recette">
        <?php foreach($posts as $post): ?>

        <article class="recette">
            <a href="?page=article&id=<?= $post['id'] ?>">
                <div class="wprock-img-zoom-hover">
                    <div class="wprock-img-zoom">
                        <img src="./uploads_img/<?= $post['image'] ?>" alt="image recette" class="img_recette">
                    </div>
                </div>

                <div class="info">
                    <h4 class="recette_name"><?= $post['name'] ?></h4>
                    <p class='author'> Par <?= $post['author'] ?> </p>

                    <p class='difficulty'> <?= $post['difficulte'] ?> </p>
                    <p class='p_resume'><?= $post['description'] ?></p>
                    <button class='see_recipe'>Voir la recette</button>
                </div>

            </a>
        </article>

        <?php endforeach ?>
    </section>
    <?php endif ?>
    <table class="pagination">
        <tbody>
            <tr>
                <td class="pagination-column">
                    <a href="?page=plat&p=1">
                        <<</a> <?php    for($i=1;$i<=$nbPage;$i++){
                        if($i==$cPage){
                            echo "<a href='?page=plat&p=$i' class='page_courante'> $i </a>";
                                }else{
                                    echo "<a href='?page=plat&p=$i'> $i </a>";
                                }
                                    
                                } ?> <a href="?page=plat&p=<?=$nbPage ?>">>>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</main>