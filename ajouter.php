<?php
session_start();

if(!$_SESSION['username'] || !isset($_SESSION['username']) ){
    header("location:index.html");
    exit();
}

if(!$_SESSION['token']  ){
    //echo 'token';
    header("location:index.html");
    exit();
}else {

    if(!$_POST['token']){
        header("location:index.html");
        exit;
    }
    if (hash_equals($_SESSION['token'], $_POST['token'])){
        
        
        echo 'token validés';
        $usuario=$_SESSION['username'];
        $panierarray=$_SESSION['panier'];
        $total=$_SESSION['total'];
        

        $id_article = filter_input(INPUT_POST, 'ajouter', FILTER_SANITIZE_SPECIAL_CHARS);
        if(!$id_article){
            echo 'article pas envoyé';
            //header("location:index.html");
            //exit();
        }
        
        $prix_article = filter_input(INPUT_POST, 'prix', FILTER_SANITIZE_SPECIAL_CHARS);
        if(!$prix_article){
            echo 'prix pas envoyé';
            //header("location:index.html");
            //exit();
        }
       
        
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