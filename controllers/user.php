<?php
if(isset($_SESSION['userId'])){
    $search="";
require './models/crud.php';

        $totArt = getArticleByAuthor($_SESSION['userName']);
        /* PAGINATION */

            $nbArt=count($totArt);
            $perPage = 9; /* Nb d'article par page*/

            $nbPage = ceil($nbArt/$perPage); /*Le nombre de page*/


            if (isset($_GET['p']) && $_GET['p']>0 && $_GET['p'] <= $nbPage){
                $cPage = $_GET['p'];
            }else{
                $cPage = 1; /*Numéro de la page courante*/
            }
            $posts = getArticleByAuthorLimit($_SESSION['userName'],$perPage,$cPage);
/* Recherche d'un utilisateur */
        if (!empty($_POST['search']) || isset($_GET['search'])){
            if (isset($_POST['search'])){
                $search=$_POST['search'];
            }else if (isset($_GET['search'])){
                $search=$_GET['search'];
            }
        $totArt =  searchByAuthor($search,$_SESSION['userName']);
        $nbArt=count($totArt);
            $perPage = 9; /* Nb d'article par page*/
            $nbPage = ceil($nbArt/$perPage); /*Le nombre de page*/


            if (isset($_GET['p']) && $_GET['p']>0 && $_GET['p'] <= $nbPage){
                $cPage = $_GET['p'];
            }else{
                $cPage = 1; /*Numéro de la page courante*/
            }
            $posts = searchByAuthorLimit($search,$_SESSION['userName'],$perPage,$cPage);

        
        } 

        if ($_SESSION['access']==1) {
            $totArt =  getAllArticle();
            $nbArt=count($totArt);
            $perPage = 9; /* Nb d'article par page*/
            $nbPage = ceil($nbArt/$perPage); /*Le nombre de page*/


            if (isset($_GET['p']) && $_GET['p']>0 && $_GET['p'] <= $nbPage){
                $cPage = $_GET['p'];
            }else{
                $cPage = 1; /*Numéro de la page courante*/
            }
            $posts =  getAllArticleLimit($perPage,$cPage);
            
            
        }
        if ($_SESSION['access']==1){
        if (!empty($_POST['search']) || isset($_GET['search'])){
            if (isset($_POST['search'])){
                $search=$_POST['search'];
            }else if (isset($_GET['search'])){
                $search=$_GET['search'];
            }
            $totArt = search($search);$nbArt=count($totArt);
            $perPage = 9; /* Nb d'article par page*/
            $nbPage = ceil($nbArt/$perPage); /*Le nombre de page*/
            
            
            if (isset($_GET['p']) && $_GET['p']>0 && $_GET['p'] <= $nbPage){
                $cPage = $_GET['p'];
            }else{
                $cPage = 1; /*Numéro de la page courante*/
            }
            $posts = searchLimit($search,$perPage,$cPage);
        }
        }
}else{
    header('Location: ../?page=accueil');
}