<?php
include '../connexion/connexion.php';
include '../controllers/admin.php';
?>

<main>

    <h1>Administration</h1>

    <form action="?page=admin" method="post">
        <section id="search_bar">
            <input type='text' placeholder='Rechercher' name='search'>
        </section>
    </form>

    <a href="?page=add">Créer un article</a>

    <table>
        <?php foreach($posts as $post): ?>
        <tr>
            <td><a href="?page=article&id=<?= $post['id'] ?>"><?= $post['name'] ?></a></td>
            <td><a href="?page=update&id=<?= $post['id'] ?>">Modifier</a></td>
            <td>Supprimer</td>
        </tr>
        <?php endforeach ?>
    </table>

</main>