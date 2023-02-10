<?php
session_start();
$usuario=$_SESSION['username'];
$panierarray[0]=$_SESSION['panier'];


$id_article=$_POST['ajouter'];

$panierarray[0]=$id_article;
$_SESSION['panier']=$panierarray[0];

//echo $panierarray[0];
header("Location: article.php");

?>