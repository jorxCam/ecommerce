<?php
session_start();

if(!$_SESSION['username']){
    header("location:index.html");
    exit();
}

if(!$_SESSION['token']){
    header("location:index.html");
    exit();
}else {

    if (hash_equals($_SESSION['token'], $_POST['token'])){

        $usuario=$_SESSION['username'];
        $panierarray=$_SESSION['panier'];
        $total=$_SESSION['total'];
        
        $_SESSION['panier']=[];
        $_SESSION['total']=0;
        
        header("Location: liste.php");

    } else {
        //sortir de l'application
        echo "erreur token - posible CSRF attaque?";
        exit();
    }

}











?>


