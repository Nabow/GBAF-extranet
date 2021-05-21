<?php 
    // include("php/connect.php");
    include_once 'php/id_bdd.php';

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
$db = connectMsqli();
        if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
            $verif_email = $_COOKIE['email'];
            $verif_password = $_COOKIE['password'];
            $sql_e = "SELECT * FROM account WHERE email='$verif_email'";
            $res_e = mysqli_query($db, $sql_e);
            $tableau = mysqli_fetch_assoc($res_e);
            if ($tableau['password'] = $verif_password) {
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
?>