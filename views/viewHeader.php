<!DOCTYPE HTML>


<head>
<html lang="fr">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il Fait Faim</title>
    <link rel="icon" type="image/png" href="./img/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css" type="text/css" />

</head>

<body>

    <header>
        <a href="index.php" class='logo' title="Retour à l'acceuil"> <img src="./img/Logo.png" alt="logo"> </a>
        <nav class="menu">

            <div class="Space"></div>
            <a href="?page=entree" <?php if(isset($_GET['page']) && $_GET['page']=="entree"){
                            echo "class='active'";
                                }?>> Entrée </a>
            <a href="?page=plat" <?php if(isset($_GET['page']) && $_GET['page']=="plat"){
                            echo "class='active'";
                                }?>> Plat </a>
            <a href="?page=dessert" <?php if(isset($_GET['page']) && $_GET['page']=="dessert"){
                            echo "class='active'";
                                }?>> Dessert </a>
                                
            <?php if (isset($_SESSION['userId'])) : ?>
                <a href="?page=user"> Mes recettes </a>

                <a href="?page=logout"> Déconnexion </a>

                <?php else : ?>

                    <a href="?page=connexion"> Connexion </a>
            <?php endif ?>

        </nav>
        <form action="?page=result" method="post">
            <section id="search_bar" class='search_bar'>
                <input type='text' placeholder='Rechercher' name='search'>
            </section>
        </form>

    </header>