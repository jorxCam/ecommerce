<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type='text/css'>
    <title>e-commerce</title>
    
</head>
<body onload='document.form1.text1.focus()'>

<div class="navbar">
  <div class="left">
    <img src="logo.png" style="padding: 1px;width: 150px;">
  </div>

  <div class="main">
    <a href="" class="titulo" >ACCUEIL </a>
    <a href="" class="titulo" >LISTE</a>
    <a href=""  class="titulo" >ARTICLES</a>
    <a href=""  class="titulo" >CONTACT</a>
  </div>
</div>

<br>

<div class="mail">
<h2>login avec email ou pseudo</h2>
<form name="form1" action="#"> 
    <ul>
        <li>    <label for="login">login:</label><br></li>
        <li>    <input type="text" id="login" name="login"><br></li>
        <li>&nbsp;</li>

        <li><label for="pwd">Password:</label><br></li>
        <li><input type="password" id="pwd" name="pwd"><br></li>
        <li>&nbsp;</li>

        <li class="submit"><input type="submit" name="submit" value="Submit" onclick="ValidateEmail(document.form1.login)"/></li>
        <li>&nbsp;</li>
    </ul>
</form>
</div>

<script src="email-validation.js"></script>

</body>
</html>

