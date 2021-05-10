<?php 

function verifConnexion(){
    if (isset($_SESSION['id']) || isset($_COOKIE['id'])){
        return true;
    }else{
        return false;
    }
}

function reDir($verif){
    $verif===true ? header('Location: connect.php') : false;
}

?>