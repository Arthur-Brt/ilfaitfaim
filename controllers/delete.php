<?php
include '../connexion/connexion.php';
include '../models/crud.php';


deleteArticle($_POST["idToDelete"]);


header("Location:../?page=user&delete=success");
 
