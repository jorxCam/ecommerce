<?php
session_start();


if(!$_SESSION['username']){
    header("location:index.html");
    exit();
}


if(!$_SESSION['token'])  {
    header("location:index.html");
    exit();
}else {

    if (hash_equals($_SESSION['token'], $_POST['token'])){


            $usuario=$_SESSION['username'];
            $panierarray=$_SESSION['panier'];
            $total=$_SESSION['total'];
            
            $id_article=$_POST['retirer'];
            $prix_article=$_POST['prix'];

            echo "Borrando la palabra ".$id_article." dentro del array:<br>";
            if (($clave = array_search($id_article, $panierarray)) !== false) {
                unset($panierarray[$clave]);
                $total=$total-$prix_article;

                //print_r($panierarray);
            }

            //$panierarray[0]=$id_article;
            $_SESSION['panier']=$panierarray;
            $_SESSION['total']=$total;

            //echo $panierarray[0];
            header("Location: article.php?id=".$id_article);

        } else {
            //sortir de l'application
            echo "erreur token - posible CSRF attaque?";
            exit();
        }


    }



?>