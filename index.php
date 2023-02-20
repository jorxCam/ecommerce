<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type='text/css'>
    <title>e-commerce</title>
    
</head>
<body onload='document.form1.login.focus()'>


<div class="navbar">
  <div class="left">
    <img src="logo.png" style="padding: 1px;width: 50px;"> 
  </div>

  <div class="main">
    <a href="accueil.php" class="titulo" >ACCUEIL </a>
    <a href="liste.php" class="titulo" >LISTE</a>
    <a href="article.php"  class="titulo" >ARTICLES</a>
    <a href=""  class="titulo" >CONTACT</a>
  </div>
</div>

<br>

<?php
$password='';
?>

<div class="mail">
<h2>login avec email ou pseudo</h2>
<form name="form1" action="login.php" method="post"> 
    <ul>
        <li>    <label for="login">login:</label><br></li>
        <li>    <input type= "text" id="login" name="login" placeholder="email@example.com" required onblur="validateemail2();"/><label id="validate"></label><br></li>
        <li>&nbsp;</li>

        <li><label for="pwd">Password:</label><br></li>
        <li><input type="password" id="pwd" name="pwd" required onblur="check(document.form1.pwd)"><br></li>
        <li><div class="rq" id="cont1"></div></li>
        <li>&nbsp;</li>

        <li class="submit"><input type="submit" name="submit" value="Submit" onclick="ValidateEmaillogin(document.form1.login,document.form1.pwd)"/></li>
        <li>&nbsp;</li>
    </ul>
</form>
</div>

<a href="inscription.php">Inscrivez-vous à un compte</a>

<script>
  
        function check(inputText) 
        { 
            //alert(inputText.value);

            var passw=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,}$/;
            if(inputText.value.match(passw)) 
            { 
                document.getElementById('cont1').innerHTML='ok  ';
                return true;
            }
            else
            { 
                document.getElementById('cont1').innerHTML='mdp doit avoir >6 majuscule, minuscule, symbole et chiffre';
                alert('Wrong...!')
                return false;
            }


        }
</script>

<?php/*
            // Given password
            //$password = inputText.value;
            echo $password;
            var_dump($password);
            die;
            // Validate password strength
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            }else{
                echo 'Strong password.';
            }*/
?>




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

    var url= "emailvalidationlogin.php";
    var emailaddress= document.getElementById("login").value;
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

