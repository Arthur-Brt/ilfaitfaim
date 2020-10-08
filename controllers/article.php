<?php
require './connexion/connexion.php';
require './models/crud.php';
$post=getArticleById($_GET['id']);
$comments=getComments($_GET);
/* Deconcatenation des ingredients*/ 
$ingre = explode(";",$post['ingredient']);
array_pop($ingre);
$ingre = array_reverse($ingre);
/* Date */
$mois_fr = Array( "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", 
        "Septembre", "Octobre", "Novembre", "Décembre");


?>