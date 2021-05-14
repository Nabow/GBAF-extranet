<?php 
    // include("php/connect.php");
    include_once 'php/id_bdd.php';



function verifIdConnexion($db){
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

// Vérifie si tous les champs sont complétés


// function verifValidite ($tableau, $type_page = false){
//     $message_erreur = '';
//     if (!filter_var($tableau['email'], FILTER_VALIDATE_EMAIL)) {
//         $message_erreur = $message_erreur . "Merci de saisir un email valide.\n";
//       }

//     if ($type_page){
        
//         if (!preg_match("/^[a-zA-Z-' ]*$/",$tableau['name'])) {
//             $message_erreur = $message_erreur . "Seul les caractères alphabétiques sont acceptés dans le nom.\n";
//             }
//         if (!preg_match("/^[a-zA-Z-' ]*$/",$tableau['first_name'])) {
//             $message_erreur = $message_erreur . "Seul les caractères alphabétiques sont acceptés dans le prénom.\n";
//             }
//         if ($tableau['question']==='') {
//             $message_erreur = $message_erreur . "Il faut sélectionner une question.\n";
//             }
//     }
//     if ($message_erreur!=''){
//         return true;
//     } else {
//         return $message_erreur;
//     }
// }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>