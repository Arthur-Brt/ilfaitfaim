<?php
require './connexion/connexion.php';
 require './models/crud.php';
 $totArt=getDishes(3);
 /* PAGINATION */
 
 $nbArt=count($totArt);
 $perPage = 9; /* Nb d'article par page*/
 
 $nbPage = ceil($nbArt/$perPage); /*Le nombre de page*/
 
 
 if (isset($_GET['p']) && $_GET['p']>0 && $_GET['p'] <= $nbPage){
     $cPage = $_GET['p'];
 }else{
     $cPage = 1; /*Numéro de la page courante*/
 }
 $posts = getDishesLimit(3,$perPage,$cPage);
 