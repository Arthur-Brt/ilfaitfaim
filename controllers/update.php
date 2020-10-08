<?php
session_start();
include '../connexion/connexion.php';
include './models/crud.php';

/*Les erreurs */
if(isset($_GET['error'])){
    if ($_GET['error']== "emptyTitle"){
    $errorAdd ="Pensez à donner un titre à votre recette !";
    }
    if ($_GET['error']== "emptyContent"){
    $errorAdd = " N'oubliez pas d'écrire votre recette !";
    }
    if ($_GET['error']== "DescriptionTooLong"){
        $errorAdd = "Votre description est trop longue";
    }
    if ($_GET['error']== "emptyCategory"){
        $errorAdd = "N'oubliez pas de sélectionner la catégorie de votre recette ! ";
    }
    if ($_GET['error']== "emptyDifficult"){
        $errorAdd = "N'oubliez pas de sélectionner la difficulté de votre recette ! ";
    }
    if ($_GET['error']== "emptyTpsPrepartion"){
        $errorAdd = "N'oubliez pas d'indiquer le temps de préparation ! ";
    }
    if ($_GET['error']== "emptyTpsRepos"){
        $errorAdd = "N'oubliez pas d'indiquer le temps de repos ! ";
    }
    if ($_GET['error']== "emptyTpsCuisson"){
        $errorAdd = "N'oubliez pas d'indiquer le temps de cuisson ! ";
    }
    
        
} 




        if(isset($_POST['update_submit'])){
            /*Vérifier que les champs sont biens remplis */
            if (empty($_POST['name'])){
                header('Location: ../?page=add&error=emptyTitle');
                exit();
            }
            else if (empty($_POST['content'])){
                header('Location: ../?page=add&error=emptyContent');
                exit();
            }
            else if (strlen($_POST["description"]) >= 501 ){
                header('Location: ../?page=add&error=DescriptionTooLong');
                exit();
            }
            else if (empty($_POST['category'])){
                header('Location: ../?page=add&error=emptyCategory');
               
                exit();
            }
            else if(empty($_POST['difficulte']))   {
                header('Location: ../?page=add&error=emptyDifficult');
                
                exit();  
            } 
            else if(empty($_POST['preparation']))   {
                header('Location: ../?page=add&error=emptyTpsPrepartion');
                
                exit();  
            } 
            else if(empty($_POST['repos']))   {
                header('Location: ../?page=add&error=emptyTpsRepos');
                
                exit();  
            } 
            else if(empty($_POST['cuisson']))   {
                header('Location: ../?page=add&error=emptyTpsCuisson');
                
                exit();  
            } 




            try {
                if ($_FILES['picture']['size']==0){  //Si l'utilisateur ne change pas la photo
                    $ingredient="";
                
                for ($x=1; $x<=$_POST['box']; $x++){
                        $ingredient = $_POST['ingredient_'.$x].';'.$ingredient;
                };
                include '../models/crud.php';
                updateArticle($_POST,$ingredient);
                    
                
                }

                if ($_FILES['picture']['size']!=0){ //Si l'utilisateur change la photo
                    $fileNameNew = uploadPhoto($_FILES);
                
                    for ($x=1; $x<=$_POST['box']; $x++){
                        $ingredient = $_POST['ingredient_'.$x].';'.$ingredient;
                };
                    include '../models/crud.php';
                    updateArticleImage($_POST,$ingredient, $fileNameNew);
                
                    
                };
                
            header('Location: ../?page=user');

            }
            catch (PDOExcepction $e) {
                $error = $e->getMessage();
            }
        }



        if(isset($_SESSION['userId'])){
            
            $id=$_GET['id'];
            $post = getArticleById($id);
            
            
        
            $ingre = explode(";",$post['ingredient']);
            array_pop($ingre);
            $ingre = array_reverse($ingre);
        
        
        
}else{
header('Location: ../?page=accueil');
}