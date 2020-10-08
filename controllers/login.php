<?php
if(isset($_GET['error'])){
    if ($_GET['error']== "emptyfields"){
    $error =" Remplissez tous les champs !";
    }
    if ($_GET['error']== "usernotfound"){
    $error = "Ce nom d'utilisateur n'existe pas ! ";
    }
    if ($_GET['error']== "wrongpassword"){
        $error = "Mot de passe incorrect ! ";
    }
        
}

if(isset($_POST['login_submit'])){

    include '../connexion/connexion.php';
    include '../models/login.php';

 $userOrMail = $_POST['userNameOrMail'];
 $password_login = $_POST['password'];

 if(empty($userOrMail) || empty($password_login)){
    header("Location: ../?page=connexion&error=emptyfields&user=".$userOrMail);
    exit();
 }
 else{
     $login = login($userOrMail,$password_login);
    
   
 }
}
