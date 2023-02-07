<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>e-commerce</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css" type='text/css'>
  </head>
  <body class="p-3 m-0 border-0 bd-example">

  <!-- navbar -->
  <div class="navbar">
  <div class="left">
    <img src="logo.png" style="padding: 1px;width: 150px;">
  </div>

  <div class="main">
    <a href="accueil.php" class="titulo" >ACCUEIL </a>
    <a href="liste.php" class="titulo" >LISTE</a>
    <a href="article.php"  class="titulo" >ARTICLES</a>
    <a href=""  class="titulo" >CONTACT</a>
  </div>
</div>


    <!-- Code -->

<br>
<?php

session_start();
$usuario=$_SESSION['username'];

if (!isset($usuario)){
  header( "location: index.php" );
}else{
    echo 'bienvenue  <h2>'.$usuario  .'</h2>';
    echo "<a href='logout.php'> se deconnecter </a> ";
}

?>


    <div id="carouselExampleDark" class="carousel carousel-dark slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item" data-bs-interval="10000">
          <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="400" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#f5f5f5"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">Premiere Article</text></svg>
          <div class="carousel-caption d-none d-md-block">
            <h5>Premiere slide label</h5>
            <p>Article 1 slide.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="400" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#bbb" dy=".3em">Deuxieme Article</text></svg>
          <div class="carousel-caption d-none d-md-block">
            <h5>Deuxieme slide label</h5>
            <p>Article 2 slide.</p>
          </div>
        </div>
        <div class="carousel-item active">
          <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="400" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e5e5e5"></rect><text x="50%" y="50%" fill="#999" dy=".3em">Troisieme Article</text></svg>
          <div class="carousel-caption d-none d-md-block">
            <h5>Troisieme slide label</h5>
            <p>Article 3 slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">avant</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">suivant</span>
      </button>
    </div>
    
    <!-- End  -->
  </body>
</html>