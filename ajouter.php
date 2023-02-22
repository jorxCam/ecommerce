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
        
        
        echo 'token validés';
        $usuario=$_SESSION['username'];
        $panierarray=$_SESSION['panier'];
        $total=$_SESSION['total'];
        
        $id_article=$_POST['ajouter'];
        $prix_article=$_POST['prix'];
        
        $nombreElementsAvant=count($panierarray);
        
        $nombreElementsApres=array_push($panierarray, $id_article);
        //$panierarray[]=$id_article;
        $_SESSION['panier']=$panierarray;
        
        //validation pour changer le total de l'achete seulement si on a ajouté une article au panier
        if($nombreElementsApres==$nombreElementsAvant+1){
            $total=$total+$prix_article;
            $_SESSION['total']=$total;
        }
        header("Location: article.php?id=".$id_article);    



    } else {
        //sortir de l'application
        echo "erreur token - posible CSRF attaque?";
        exit();
    }

}



?>