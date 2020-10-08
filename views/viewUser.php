<?php
include './controllers/user.php';

?>
<main>
    <h1>Mes recettes</h1>
    <p><a href="?page=add" class="new_recipe_btn">Ajoutez une nouvelle recette</a></p>
    <form action="?page=user" method="post" class='form_admin'>
        <section id="search_bar_user" class="search_bar_user">
            <input type='text' placeholder='Rechercher' name='search'>
        </section>
    </form>
    <table class="table_user">
        <caption> Mes recettes </caption>
        <tbody>
            <?php foreach($posts as $post): ?>
            <tr>
                <td><a href="?page=article&id=<?= $post['id'] ?>"><?= $post['name'] ?></a></td>
                <?php if($_SESSION['access']==1){
            echo "<td class='admin_comment'>".$post['author']."</td>";
        }?>
                <td class="modif"><a href="?page=update&id=<?= $post['id'] ?>">Modifier</a></td>
                <td class="delete"><a href="#modal1" class='js-modal' data-id="<?= $post['id'] ?>">Supprimer</td>
                <aside id='modal1' class='modal' aria-hidden='true' role='dialog' style="display:none">
                    <div class='modal-wrapper js-modal-stop'>
                        <p>Etes-vous sur de vouloir supprimer cet élément ? </p>
                        <form method="POST" action="../controllers/delete.php"> <input id="delete" type="hidden"
                                name="idToDelete" value=<?= $post['id'] ?>><button type="submit">Oui</button></form>
                        <button class='js-close-modal' data-id=''>Non</button>
                    </div>
                </aside>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <table class="pagination">
        <tbody>
            <tr>
                <td class="pagination-column">
                    <a href="?page=user&p=1">
                        <<</a> <?php    for($i=1;$i<=$nbPage;$i++){
                        if($i==$cPage){
                            echo "<a href='?page=user&p=$i' class='page_courante'> $i </a>";
                                }else{
                                    echo "<a href='?page=user&p=$i'> $i </a>";
                                }
                                    
                                } ?> <a href="?page=user&p=<?=$nbPage ?>">>>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</main>