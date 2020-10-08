<?php 
include './controllers/login.php';
?>
<main class="login">
    <section class="login_div">
        <h2> Se connecter </h2>
        <p class="signuperror"><?= $error ?> </p>
        <form action="./controllers/login.php" method="post" class="login_form">

            <label for="userNameOrMail">Identifiant ou Mail : </label>
            <input type="text" name="userNameOrMail" placeholder="Nom d'utilisateur ou adresse Mail"
                value=<?= isset($_GET['user'])?$_GET['user']:"" ?>>

            <label for="password">Mot de passe : </label>
            <input type="password" name="password" placeholder="Mot de passe">

            <button type="submit" name="login_submit"> Se connecter </button>

        </form>

        <p>Vous n'avez pas de compte ?<a href="?page=signup"> S'inscrire </a></p>
    </section>
</main>