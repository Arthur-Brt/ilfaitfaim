<?php 

function login($user,$pwd){
    include '../connexion/connexion.php';
    $query = $pdo->prepare('SELECT * FROM `users` WHERE `login` = :userOrMail OR `mail` = :userOrMail');
    $query->execute([
        'userOrMail' => $user,
        'password' => $pwd
    ]);
    $login = $query->fetch();
    
    if(empty($login)){
            header("Location: ../?page=connexion&error=usernotfound");
            exit();
        }
        $pwdCheck = password_verify($pwd,$login['password']);
        if ($pwdCheck == false){
            header("Location: ../?page=connexion&error=wrongpassword");
            exit();
        }
        else if ($pwdCheck == true){
            session_start();
            $_SESSION['userName'] = $login['login'];
            $_SESSION['userId'] = $login['id'];
            $_SESSION['access'] = $login['acces'];
            $_SESSION['description']="";
            $_SESSION['title'] = "";
            $_SESSION['content'] = "";
            $_SESSION['ingredient'] = "";
            $_SESSION['box'] = "1";
            $_SESSION['difficulte'] = "";
            $_SESSION['category'] = "";
            $_SESSION['preparation']="";
            $_SESSION['repos'] = "";
            $_SESSION['cuisson'] = "";
            
    
    
    
            header("Location: ../index.php?login=success");
            exit();
        }
        else{
            header("Location: ../?page=connexion&error=wrongpassword");
                 exit();
             }
         }


//vérifier la non-existence du nom d'utilisateur

function userName($userName){
    include '../connexion/connexion.php';
    $query = $pdo->prepare("SELECT login FROM users WHERE login = :user");
    $query->execute([
        'user' => $userName
    ]);
    $result = $query->fetch();
    return $result;
}

//vérifier la non-existence du mail

function mailExistCheck($mail){
    include '../connexion/connexion.php';
    $query = $pdo->prepare("SELECT mail FROM users WHERE mail = :mail");
    $query->execute([
        'mail' => $mail
    ]);
    $result = $query->fetch();
    return $result;
}

//creer le profil

function createUser($POST){
    include '../connexion/connexion.php';
    $query = $pdo->prepare("INSERT INTO users (login, mail, password) VALUES (:user, :mail , :password)");
    $query->execute([
        'user' => $POST['userName'],
        'mail'=>  $POST['mail'],
        'password' => password_hash( $POST['password'], PASSWORD_BCRYPT)
    ]);
}