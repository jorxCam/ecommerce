<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type='text/css'>
    <title>e-commerce</title>
    
</head>
<body>

<div class="navbar">
  <div class="left">
  <img src="logo.png" alt="shipshop.com" class="logo">
  </div>

  <div class="main">
    <a href="accueil.php" class="titulo" >ACCUEIL </a>
    <a href="liste.php" class="titulo" >LISTE</a>
    <a href="article.php"  class="titulo" >ARTICLES</a>
    <a href=""  class="titulo" >CONTACT</a>
  </div>

  <div class="right">
    <?php
        //session handling
        session_start();
        $usuario=$_SESSION['username'];

        if (!isset($usuario)){
          header( "location: index.php" );
        }else{
            echo 'connecté :  <strong>'.$usuario  .'</strong>';
            echo "<br><a href='logout.php'> se deconnecter </a> ";
             //inclus le fichier pour generer le token et on execute la fonction

        }
        include_once "assets/csrf.php";
        csrf();

      ?>
  </div>


</div><br>


<div class="todo">
        <div id="rectangle">   

                  <?php

              $panierarray=$_SESSION['panier'];
              $total=$_SESSION['total'];

              if (!isset($usuario)){
                header( "location: index.php" );
              }else{

              echo '<img src="assets/shop.png" alt="panier" width="40px" height="40px"> Panier : ';
                  foreach( $panierarray as $p){
                    //var_dump( $p );
                    if ($p!=NULL){
                      echo '<br><a href="article.php?id='.$p.'">  article '.$p.'</a>';
                    }
                  }

                  echo '<p class="text-right">Total: <strong id=> '.$total.'  </strong>&euro;</p>';
                  
              }
              ?>

                <form action="vider.php" method="post" id="myForm">
                  <input type="hidden" id ="token"  name="token"   value=<?php echo $_SESSION['token']; ?> >   
                </form>
                <div class="submit">     <button id="boton-vaciar" class="btn btn-danger">vider</button>   </div>
                <script>
                  const myForm = document.getElementById("myForm");
                  document.querySelector(".submit").addEventListener("click", function(){
                  myForm.submit();
                });
                </script>

              <br><br>

              <?php
              /* filtre recherche */
              require 'bdd.php';
              include ('funciones.php');
              //ici demarre la recherche vide pour montre tous les articles
              $articulos =buscarbd();
              ?>
    </div>

    <div class="izquierda">
        <br> 
        <label for="cherche">Cherchez votre article par description</label><br>
        <input type="hidden" id ="token"  name="token"   value=<?php echo $_SESSION['token']; ?> >
        <input type="text" name="buscar" id="cherche"> <br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="buscar.js"></script>
        <p>Keypresses: <span>0</span></p>

        <br>
        <div class="articles" id="publicaciones">
          <br>
          <?php 
          //montrer les articles recherches

          foreach ($articulos as $u){
          //var_dump($u);
            foreach ($u as $t ){
                  
              ?>
              <div class="resultadosarticulos">
                <?php echo '<a href="article.php?id='.$t['id_article'].'"><img src=images/'.$t['image'].' alt="image" width="200" height="200" ></a>'; ?><br>
                <?php echo $t['description_article']; ?> <br> <br>
              
                <strong>     Article  :  </strong>     <?php echo $t['nom_article'];         ?> <br> 
                <strong>     Prix     :  </strong>     <?php echo $t['prix_article'];        ?> <br>
                <strong>     Categorie:  </strong>     <?php echo $t['categorie'];           ?> <br>
              </div>
              <p>
            
              <?php

            }

          }
          ?>
        </div>
    </div>  

  </div>
</body>
</html>