<?php
require 'bdd.php';

$fname= $_POST['fname'];
$lname= $_POST['lname'];
$pseudo= $_POST['pseudo'];
$email= $_POST['email'];
$pwd= $_POST['pwd'];



//Obtenemos contraseña desde un form.
$contrasena = $_POST['pwd'] ?: '';

//Encriptamos de manera segura la contraseña
$contrasena = password_hash($pwd, PASSWORD_DEFAULT);


try {

    $sql = "INSERT INTO user(login, password, email, nom, prenom) VALUES ('$pseudo','$contrasena','$email','$lname','$fname')";
    // use exec() because no results are returned
    $conn->exec($sql);
    //echo "New record created successfully";
    //echo '<script>alert("utilisateur creé")</script>';
    header("Location: index.php");

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}






