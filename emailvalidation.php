<?php
// ici on fait la validation du email
$email= $_POST['email'];

if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
  echo("Valid email address");
} else {
  echo("Invalid email address");
}
?> 