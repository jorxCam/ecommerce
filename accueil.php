<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-commerce</title>
    <link rel="stylesheet" href="style.css" type='text/css'>
  </head>
  <body>

  <!-- navbar -->
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
        $panierarray[0]=$_SESSION['panier'];
        

        if (!isset($usuario)){
          header( "location: index.php" );
        }else{
            echo 'connecté :  <strong>'.$usuario  .'</strong>';
            echo "<br><a href='logout.php'> se deconnecter </a> ";
        }

      ?>
  </div>



</div>


    <!-- Code -->
<br>

<br>
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="imgslide\herramientas-deportivas.jpg" alt="image" class="imgslide" >
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="imgslide\raquetas-tennis.jpg" alt="image" class="imgslide" >
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="imgslide\frutas-variadas-pina-fresa.jpg" alt="image" class="imgslide" >
    <div class="text">Caption Three</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div class="circles">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>



<script nonce="rAnd0m">
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "flex";
  dots[slideIndex-1].className += " active";
}
</script>