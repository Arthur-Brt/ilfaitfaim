<?php

if(isset($_GET['error'])){
   if ($_GET['error']== "emptyfields"){
      $error =" Remplissez tous les champs !";
   }
   if ($_GET['error']== "invalidmail"){
      $error = "Adresse Mail non valide ! ";
   }
   if ($_GET['error']== "invaliduser"){
      $error = "Nom d'utilisateur  non valide ! ";
   }
   if ($_GET['error']== "passwordcheck"){
      $error = " Mot de passe non valide ! ";
   }
   if ($_GET['error']== "usertaken"){
      $error = "Nom d'utilisateur déjà pris ! ";
   }
   if ($_GET['error']== "mailtaken"){
      $error = "Cette adresse mail est déjà utilisée ! ";
   }
       
}

if(isset($_POST['signup_submit'])){

    include '../connexion/connexion.php';
    include '../models/login.php';



 $user = $_POST['userName'];
 $mail = $_POST['mail'];
 $password_signup = $_POST['password'];
 $password_confirm = $_POST['password_confirm'];

 //error 
// Si un champ est libre
 if (empty($user) || empty($mail)|| empty($password_signup)|| empty($password_confirm)){
    header("Location: ../?page=signup&error=emptyfields&user=".$user."&mail=".$mail);
    echo '<p class="signuperror"> Remplissez tous les champs ! </p>';
    exit();
 }
 //user et mail valide?
 else if(!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$user)){
    header("Location: ../?page=signup&error=invalidmailuser");
    echo '<p class="signuperror"> Adresse Mail non valide ! </p>';
    exit();
 }
 else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
    header("Location: ../?page=signup&error=invalidmail&user=".$user);
    echo '<p class="signuperror"> Adresse Mail non valide ! </p>';
    exit();
 }
 else if(!preg_match("/^[a-zA-Z0-9]*$/",$user)){
    header("Location: ../?page=signup&error=invaliduser&mail=".$mail);
    echo '<p class="signuperror"> Nom d\'utilisateur  non valide ! </p>';
    exit();
 }
 else if ($password_signup !== $password_confirm){
    header("Location: ../?page=signup&error=passwordcheck&user=".$user."&mail=".$mail);
    echo '<p class="signuperror"> Mot de passe non valide ! </p>';
    exit();
 }
// si le nom d'utilisateur est déja pris
 else {
    $result = userName($_POST['userName']);
    $mailcheck = mailExistCheck($_POST['mail']);
  
    
    if ($result['login'] == $_POST['userName']){
        header("Location: ../?page=signup&error=usertaken&mail=".$mail);
        exit();
    }
    // si le mail est déjà pris
    else if($mailcheck['mail'] == $_POST['mail']){
      header("Location: ../?page=signup&error=mailtaken");
      exit();
    }
    else {
       createUser($_POST);
       login($mail,$password_signup);
       header("Location: ../index.php?login=success");
        exit();
     }
 }

 

}
