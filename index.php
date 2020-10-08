<?php

session_start();


$arrayPages = array(
 
    'accueil' => 'viewAccueil.php',
    'entree' => 'viewEntree.php',
    'plat' => 'viewPlat.php',
    'dessert' => 'viewDessert.php',
    'connexion' => 'viewLogin.php',
    'article' => 'viewArticle.php',
    'add' => 'viewAdd.php',
    'update' => 'viewUpdate.php',
    'result' => 'viewResult.php',
    'admin' => 'viewAdmin.php',
    'user' => 'viewUser.php',
    'signup' => 'viewSignUp.php',
    'logout' => '../controllers/logout.php',
    
  );
  

  
  
  include_once 'views/viewHeader.php';
  // La variable $page existe-elle dans l'url ?
  if(!empty($_GET['page']))
  {
    // Vérification de la valeur passée dans l'url : est-elle une clé du tableau ?
    if(array_key_exists(strtolower($_GET['page']), $arrayPages))
    {
      // Oui, alors on l'importe
      include('views/'. $arrayPages[ strtolower($_GET['page']) ] );
    }
      else
    {
      // Non, alors on importe un fichier par défaut
     // include('views/erreur-404.php');
     echo ('Error 404');
    }
  }
    else
  {
    // Non, on affiche la page d'accueil par défaut
    include('views/'. $arrayPages['accueil']);
  }
  
  include_once 'views/viewFooter.php';
?>


<script type="text/javascript" src="./js/app.js"></script>
