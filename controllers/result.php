<?php
include './models/crud.php';
if (isset($_POST['search'])){
    $search=$_POST['search'];
}else if (isset($_GET['search'])){
    $search=$_GET['search'];
}

$totArt = search($search);
/* PAGINATION */

$nbArt=count($totArt);
$perPage = 9; /* Nb d'article par page*/
$nbPage = ceil($nbArt/$perPage); /*Le nombre de page*/


if (isset($_GET['p']) && $_GET['p']>0 && $_GET['p'] <= $nbPage){
    $cPage = $_GET['p'];
}else{
    $cPage = 1; /*Numéro de la page courante*/
}
$posts = searchLimit($search,$perPage,$cPage);