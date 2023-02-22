<?php
//session_start();

function csrf(){

    if ( function_exists('mcrypt_create_iv')){
        $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT8DEV8URANDOM));
    } else {
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
    }

}


?>