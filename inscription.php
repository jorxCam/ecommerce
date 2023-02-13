<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type='text/css'>
    <title>e-commerce</title>
    
</head>
<body onload='document.form2.fname.focus()'>

<div class="navbar">
  <div class="left">
    <img src="logo.png" style="padding: 1px;width: 150px;">
  </div>

  <div class="main">
    <a href="accueil.php" class="titulo" >ACCUEIL </a>
    <a href="liste.php" class="titulo" >LISTE</a>
    <a href="testbdd.php"  class="titulo" >ARTICLES</a>
    <a href=""  class="titulo" >CONTACT</a>
  </div>
</div>

<br>


<div class="mail">
<h2>Inscription</h2>
 <h3>completez vos coordonnees pour creér la compte: </h3>

<form name="form2" action="insert.php" method="post">
<ul>
        <li>    <label for="fname">Prenom:</label><br> </li>
        <li>    <input type="text" id="fname" name="fname" placeholder="John"><br></li>

        <li>    <label for="lname">Nom:</label><br></li>
        <li>    <input type="text" id="lname" name="lname" placeholder="Doe"><br></li>

        <li>    <label for="pseudo">Pseudo:</label><br></li>
        <li>    <input type="text" id="pseudo" name="pseudo" placeholder="pseudo"><br></li>

        <li>     <label for="email">Email:</label><br></li>
        <li>    <input type="text" id="email" name="email" placeholder="email@example.com" onblur="validateemail2();"/><label id="validate"></label><br></li>
        
  
        <li>    <label for="pwd">Mot de passe:</label><br></li>
        <li>    <input type="password" id="pwd" name="pwd"><br></li>

        <li class="submit"><input type="submit" name="submit" value="Submit" onclick="ValidateEmailinscrire(document.form2.email)"/></li>
        <li><input type="reset"></li>
        <br>
        <p>vous pouvez appuyer sur "Reset" pour effacer les valeurs.</p>
</ul>

</form> 
</div>


<script src="email-validation.js"></script>

<script>
function validateemail2() {
var request;
try {
    request= new XMLHttpRequest();
    }
catch (tryMicrosoft) {

                    try {
                        request= new ActiveXObject("Msxml2.XMLHTTP");
                        }
                    catch (otherMicrosoft) 
                        {

                        try {
                            request= new ActiveXObject("Microsoft.XMLHTTP");
                            }
                        catch (failed) {
                            request= null;
                            }
                        }
                    }

    var url= "emailvalidationinscription.php";
    var emailaddress= document.getElementById("email").value;
    var vars= "email="+emailaddress;
    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.onreadystatechange= function() {
    if (request.readyState == 4 && request.status == 200) {
	    var return_data=  request.responseText;
	    document.getElementById("validate").innerHTML= return_data;
                }
    }

    request.send(vars);
    }
</script>

</body>
</html>