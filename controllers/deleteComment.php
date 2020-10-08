<?php
include '../connexion/connexion.php';
include '../models/crud.php';

deleteComment($_POST);
 header('Location:../?page=article&id='.$_POST['idArticle'].'');