<?php include './controllers/signup.php'?>
<main class="login">
    <section class="login_div">
        <h2> S'inscrire </h2>

        <p class="signuperror"> <?= $error ?> </p>
        <form action="../controllers/signup.php" method="post" class="login_form">

            <label for="userName">Identifiant : </label>
            <input type="text" name="userName" placeholder="Nom d'utilisateur"
                value=<?= isset($_GET['user'])?$_GET['user']:"" ?>>

            <label for="Mail"> Mail : </label>
            <input type="text" name="mail" placeholder="Adresse Email"
                value=<?= isset($_GET['mail'])?$_GET['mail']:"" ?>>

            <label for="password">Mot de passe : </label>
            <input type="password" name="password" placeholder="Mot de passe">

            <label for="password_confirm">Confirmer le mot de passe : </label>
            <input type="password" name="password_confirm" placeholder="Confirmer le mot de passe">

            <button type="submit" name="signup_submit"> S'inscrire </button>

        </form>
        <p class="no_account">Vous avez déjà un compte ?<a href="?page=connexion"> Se connecter </a></p>

    </section>
</main>