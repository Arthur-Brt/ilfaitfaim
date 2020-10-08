<?php

//Create 
function createArticle($SESSION,$POST,$ingredient, $fileNameNew){
    include '../connexion/connexion.php';
    $query = $pdo->prepare('INSERT INTO `recipes`(`name`, `author`, `category`, `text`, `image`, `ingredient`, `box`, `preparation`, `repos`, `cuisson`, `difficulte`,`description`) VALUES (:name,:author,:category,:content, :imageName, :ingredient, :box, :preparation, :repos, :cuisson, :difficulte, :description)');
            $query->execute([
                'name' => $POST['name'],
                'author' =>$SESSION['userName'],
                'content' => nl2br($POST['content']),
                'category' => $POST['category'],
                'ingredient' => $ingredient,
                'imageName' => $fileNameNew,
                'box' => $POST['box'],
                'preparation' => $POST['preparation'],
                'repos' => $POST['repos'],
                'cuisson' => $POST['cuisson'],
                'difficulte' => $POST['difficulte'],
                'description' => nl2br($POST['description']),
                ]);
};

// Create a  comment
function createComment($POST){
    include '../connexion/connexion.php';
    $query = $pdo->prepare('INSERT INTO `comments`(`text`,`idArticle`,`date`,`uName`)
    VALUES (:text,:idArticle,:date,:uName)');
    $query->execute([
        'text'=> nl2br($POST['message']),
        'idArticle'=> $POST['idArticle'],
        'date'=> $POST['date'],
        'uName'=> $POST['uid'],
        
     ]);
};

//Read

function getDishes($category){
    require './connexion/connexion.php';
$query = $pdo->prepare('SELECT * FROM `recipes` WHERE `category` = :category');
$query->execute([
    'category' => $category
]);
$posts = $query->fetchAll();
return $posts;
}
function getDishesLimit($category,$perPage,$cPage){
    require './connexion/connexion.php';
$query = $pdo->prepare('SELECT * FROM `recipes` WHERE `category` = :category ORDER BY `id` DESC LIMIT :offset , :limite ');
$query -> bindValue(':offset',(($cPage - 1)*$perPage),PDO::PARAM_INT);
$query -> bindValue(':limite',$perPage,PDO::PARAM_INT);
$query -> bindValue(':category',$category,PDO::PARAM_STR);
$query->execute();
$posts = $query->fetchAll();
return $posts;
}


function getArticleById($id){
    require './connexion/connexion.php';
    $query = $pdo->prepare('SELECT * FROM `recipes` WHERE `id` = :id');
    $query->execute([
    'id' => $id
]);
$post = $query->fetch();
return $post;
}
function getAllArticle(){
    include './connexion/connexion.php';
    $query = $pdo->prepare('SELECT * FROM `recipes` ORDER BY `id` DESC ');
    $posts = $query->execute();
    $posts = $query->fetchAll();
return $posts;
}
function getAllArticleLimit($perPage,$cPage){
    include './connexion/connexion.php';
    $query = $pdo->prepare('SELECT * FROM `recipes` ORDER BY `id` DESC LIMIT :offset , :limite ');
    $query -> bindValue(':offset',(($cPage - 1)*$perPage),PDO::PARAM_INT);
    $query -> bindValue(':limite',$perPage,PDO::PARAM_INT);
    $posts = $query->execute();
    $posts = $query->fetchAll();
return $posts;
}
function getArticleByAuthor($author){
    include './connexion/connexion.php';
    $query = $pdo->prepare('SELECT * FROM `recipes` WHERE `author` = :author ');
    $posts = $query->execute([
    'author' => $author
]);
$posts = $query->fetchAll();
return $posts;
}

function getArticleByAuthorLimit($author,$perPage,$cPage){
    include './connexion/connexion.php';
    $query = $pdo->prepare('SELECT * FROM `recipes` WHERE `author` = :author LIMIT :offset , :limite');
    $query -> bindValue(':offset',(($cPage - 1)*$perPage),PDO::PARAM_INT);
    $query -> bindValue(':limite',$perPage,PDO::PARAM_INT);
    $query -> bindValue(':author',$author,PDO::PARAM_STR);
    $posts = $query->execute();
$posts = $query->fetchAll();
return $posts;
}



function search($search){
    include './connexion/connexion.php';
    $query = $pdo->prepare('SELECT * FROM `recipes` WHERE `name` LIKE "%":search"%"');
    $query->execute([
    'search' => $search
]);
$posts = $query->fetchAll();
return $posts;
}
function searchLimit($search,$perPage,$cPage){
    include './connexion/connexion.php';
    $query = $pdo->prepare('SELECT * FROM `recipes` WHERE `name` LIKE "%":search"%" ORDER BY `id` DESC LIMIT :offset , :limite');
    $query -> bindValue(':offset',(($cPage - 1)*$perPage),PDO::PARAM_INT);
    $query -> bindValue(':limite',$perPage,PDO::PARAM_INT);
    $query -> bindValue(':search',$search,PDO::PARAM_STR);
    $query->execute();
$posts = $query->fetchAll();
return $posts;
}
function searchByAuthor($search,$author){
    include './connexion/connexion.php';
    $query = $pdo->prepare('SELECT * FROM `recipes` WHERE `name` LIKE "%":search"%" AND `author` = :author');
    $query->execute([
    'search' => $search,
    'author' => $author
]);
$posts = $query->fetchAll();
return $posts;
}
function searchByAuthorLimit($search,$author,$perPage,$cPage){
    include './connexion/connexion.php';
    $query = $pdo->prepare('SELECT * FROM `recipes` WHERE `name` LIKE "%":search"%" AND `author` = :author LIMIT :offset , :limite');
    $query -> bindValue(':offset',(($cPage - 1)*$perPage),PDO::PARAM_INT);
    $query -> bindValue(':limite',$perPage,PDO::PARAM_INT);
    $query -> bindValue(':search',$search,PDO::PARAM_STR);
    $query -> bindValue(':author',$author,PDO::PARAM_STR);
    $query->execute();
$posts = $query->fetchAll();
return $posts;
}
//Read a comment
function getComments($GET){
    include './connexion/connexion.php';
    $queryComments = $pdo->prepare('SELECT * FROM `comments` WHERE idArticle=:idArticle ORDER BY cid DESC' );
    $queryComments->execute([
    'idArticle' => $GET['id'],
]);
$comments = $queryComments->fetchAll();
return $comments;
}
//Update
function updateArticle($POST,$ingredient){
    include '../connexion/connexion.php';
    $query = $pdo->prepare('UPDATE `recipes` SET name=:name, category=:category, text=:content,
    ingredient=:ingredient,
    box=:box,
    preparation=:preparation,
    repos=:repos,
    cuisson=:cuisson,
    difficulte=:difficulte,
    description=:description
      WHERE id = :id');
    $query->execute([
        'name' => $POST['name'],
        'content' => nl2br($POST['content']),
        'category' => $POST['category'],
        'id' => $POST['id'],
        'ingredient' => $ingredient,
        'box' => $POST['box'],
        'preparation' => $POST['preparation'],
        'repos' => $POST['repos'],
        'cuisson' => $POST['cuisson'],
        'difficulte' => $_POST['difficulte'],
        'description' => nl2br($POST['description']),
        

    ]);
};

function updateArticleImage($POST,$ingredient, $fileNameNew){
    include '../connexion/connexion.php';
    $query = $pdo->prepare('UPDATE `recipes` SET name=:name, category=:category, text=:content,
        image=:imageName,
        ingredient=:ingredient,
        box=:box,
        preparation=:preparation,
        repos=:repos,
        cuisson=:cuisson,
        difficulte=:difficulte,
        description=:description
        
          WHERE id = :id');
        $query->execute([
            'name' => $POST['name'],
            'content' => nl2br($POST['content']),
            'category' => $POST['category'],
            'id' => $POST['id'],
            'ingredient' => $ingredient,
            'imageName' => $fileNameNew,
            'box' => $POST['box'],
            'preparation' => $POST['preparation'],
            'repos' => $POST['repos'],
            'cuisson' => $POST['cuisson'],
            'difficulte' => $POST['difficulte'],
            'description' => nl2br($POST['description']),
            

        ]);
};

//Delete
function deleteArticle($id){
    include '../connexion/connexion.php';
    $query = $pdo->prepare('DELETE  FROM `recipes` WHERE `id` = :id');
    $posts = $query->execute([
     'id' => $id,
 ]);
};

function deleteComment($POST){
    include '../connexion/connexion.php';
    $query = $pdo->prepare('DELETE  FROM `comments` WHERE `cid` = :cid');
    $posts = $query->execute([
     'cid' => $POST["idToDelete"],
 ]);
}


//Photo
function uploadPhoto($FILES){
    $file=$FILES['picture'];
    $fileName=$FILES['picture']['name'];
    $fileTmpName=$FILES['picture']['tmp_name'];
    $fileSize=$FILES['picture']['size'];
    $fileError=$FILES['picture']['error'];
    $fileType=$FILES['picture']['type'];
        /* Obtenir l'xtension du fichier que l'on upload */
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
        /* Les extension autorisées */
    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 1000000000){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = "../uploads_img/".$fileNameNew;
                $test = move_uploaded_file($fileTmpName,$fileDestination);
                var_dump($test);
               /* header("Location: ../?page=add&error=sucess");*/
            }
            else {
             echo("Le fichier est trop gros ! ");
                
            }
            
        } else{
             echo("Erreur lors de l'uplaod") ;
             
        }

    }else {
        echo(" vous ne pouvez pas uploader ce format"); /* error : vous ne pouvez pas uploader ce format */ 
    }

    return $fileNameNew;
}