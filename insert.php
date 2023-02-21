<?php
require 'bdd.php';

//$fname= $_POST['fname'];
$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
//$lname= $_POST['lname'];
$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
//$pseudo= $_POST['pseudo'];
$pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);

//$email= $_POST['email'];
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
//validacion del email para impedir xss injection en el campo email </td><script>alert(1);</script>
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("$email is not a valid email address");
    header("Location: index.php");
    exit();
 }

//$pwd= $_POST['pwd'];
$pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_SPECIAL_CHARS);
//var_dump($pwd);
//die;

//Obtenemos contraseña desde un form.
//$contrasena = $_POST['pwd'] ?: '';

//Encriptamos de manera segura la contraseña
$contrasena = password_hash($pwd, PASSWORD_DEFAULT);

try {

    $sql = "INSERT INTO user(login, password, email, nom, prenom) VALUES ('$pseudo','$contrasena','$email','$lname','$fname')";
    // use exec() because no results are returned
    //$conn->exec($sql);
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    //echo "New record created successfully";
    echo '<script>alert("utilisateur creé")</script>';
    header("Location: index.php");

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}






