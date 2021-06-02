<?php 

foreach($_COOKIE as $cookie_name => $cookie_value){

    // Commence par supprimer la valeur du cookie
    unset($_COOKIE[$cookie_name]);
    // Puis désactive le cookie en lui fixant 
    // une date d'expiration dans le passé
    setcookie($cookie_name, '', time() - 4200, '/');
 }

header('Location: connect.php');