<?php
session_start();
include '../connexion/connexion.php';
include '../models/crud.php';

if ($_SESSION['userId']==""){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
};

createComment($_POST);
header('Location: ' . $_SERVER['HTTP_REFERER']);