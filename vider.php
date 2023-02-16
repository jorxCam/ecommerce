<?php
session_start();
$usuario=$_SESSION['username'];
$panierarray=$_SESSION['panier'];
$total=$_SESSION['total'];

$_SESSION['panier']=[];
$_SESSION['total']=0;

header("Location: liste.php");

?>


