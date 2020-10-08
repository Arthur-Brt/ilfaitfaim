<?php

 session_start();

include '../connexion/connexion.php';
include '../models/crud.php';
//Si l'utilisateur est bien connecté
if (isset($_SESSION['userId'])){

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
        
        
            
    }



    //Si le formulaire est soumis


    if(isset($_POST['add_submit'])){

        $_SESSION['title']=$_POST['name'];
        $_SESSION['content'] = $_POST["content"];
        $_SESSION['description'] = $_POST["description"];
        $_SESSION['difficulte'] = $_POST["difficulte"];
        $_SESSION['category'] = $_POST["category"];
        $_SESSION['preparation']=$_POST["preparation"];
        $_SESSION['repos'] = $_POST["repos"];
        $_SESSION['cuisson'] = $_POST["cuisson"];
      //  if (isset($_POST['box'])){
      //      $_SESSION['box']=$_POST['box'];
      //  }

        
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
          
            
            /* La photo */ 
            
            $fileNameNew = uploadPhoto($_FILES);
            
            /* Concaténer les info ingredient*/
            $ingredient="";
            for ($x=1; $x<=$_POST['box']; $x++){
                $ingredient = $_POST['ingredient_'.$x].';'.$ingredient;
            };
            
            
                if (isset($_POST['name']) && isset( $_POST['content'])){
                    
                    createArticle($_SESSION,$_POST,$ingredient, $fileNameNew);
                
                    
                    header("Location: ../?page=user&add=succes");
                
                    exit();
                }


            
                
            
        }
}



// if(isset($_SESSION['userId'])){
   


//     if(isset($_GET['error'])){
//         if ($_GET['error']== "emptyTitle"){
//             echo '<p class="addError"> Pensez à donner un titre à votre recette ! </p>';
//         }
//         if ($_GET['error']== "emptyContent"){
//             echo '<p class="addError"> N\'oubliez pas d\'écrire votre recette ! </p>';
//         }
//         if ($_GET['error']== "emptyCategory"){
//             echo '<p class="addError"> N\'oubliez pas de sélectionner la catégorie de votre recette ! </p>';
//         }
//         if ($_GET['error']== "emptyDifficult"){
//             echo '<p class="addError">  N\'oubliez pas de sélectionner la difficulté de votre recette ! </p>';
//         }
//         if ($_GET['error']== "emptyPreparation"){
//             echo '<p class="addError"> Indiquez le temps de préparation ! </p>';
//         }
//         if ($_GET['error']== "emptyRepos"){
//             echo '<p class="addError"> Indiquez le temps de repos ! </p>';
//         }
//         if ($_GET['error']== "emptyCuisson"){
//             echo '<p class="addError"> Indiquez le temps de cuisson ! </p>';
//         }

            
//     }
else{
     header('Location: ../?page=accueil');
}

?>