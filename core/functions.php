<?php 
    // include("php/connect.php");
    include_once 'connect_bdd.php';

function afficheTableau($tableau){
    echo '<pre>'.var_dump($tableau).'</pre>';
}

function afficheCookies(){
    foreach($_COOKIE as $cookie_name => $cookie_value){

            var_dump($cookie_name)."<br>"; 
            var_dump($cookie_value)."<br>"; 
     }
}

function verifIdConnexion(){
        if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
            $verif_email = $_COOKIE['email'];
            $verif_password = $_COOKIE['password'];
            $query = requeteBdd(['email' => $verif_email],'SELECT * FROM account WHERE email= :email');

            if ($query -> password = $verif_password) {
                return true;
            }
        }
        return false;
    }




function verifCompletion(){
    if(count(array_filter($_POST))!=(count($_POST)-1) && isset($_POST['ok'])){
        return false;
    } else {
        return true;
    }
}

function reDirConnect($verif = false){
    $verif===false ? header('Location: connect.php') : false;
}



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

function getVariavleName($var) {
    foreach($GLOBALS as $varName => $value) {
        if ($value === $var) {
            return $varName;
        }
    }
    return;
}

function makeArray(...$variables){
    $Array = [];
    foreach ($variables as $variable) {
        $nom_variable = getVariavleName($variable);
        $Array[$nom_variable] =  $variable;
    }
    return $Array;
}

function defCookies($tableau){

    foreach ($tableau as $element) {
        setcookie(key($element), $element, time() + 31*24*3600, null, null, false, true);
    }

}