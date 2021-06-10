<?php 
    include_once "../core/functions.php";
    include_once '../core/connect_bdd.php';



    //Definition des variables
    $emailErr = $new_passwordErr = $questionErr = $reponseErr = "";
    $email = $new_password = $question = $reponse = "";
    $connectErr = $subErr = Null;
    $compteErr = 0;

// Test des valeurs du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
      $emailErr = " ";
      $compteErr++;
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Adresse email invalide";
        $compteErr++;
      }else {
          $Arr_email=['email' => $email];
      }
    }
      
    if (empty($_POST["new_password"])) {
      $new_passwordErr = " ";
      $compteErr++;
    } else {
      $new_password = test_input($_POST["new_password"]);
      // check if password only contains letters and whitespace
      if (!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$new_password)) {
        $compteErr++;
        $new_passwordErr = "Minimum 8 caractères de long avec au moins : un numéro, une majuscule et une minuscule";
      }else {
        $new_password = password_hash($new_password, PASSWORD_DEFAULT, ['cost' => 14]);
        $Arr_new_password = ['new_password' => $new_password];
      }
    }
    
        
    if (empty($_POST["question"])) {
        $compteErr++;
        $questionErr = "Il faut sélectionner une question";
    } else {
    $question = test_input($_POST["question"]);
    $Arr_question = ['question' => $question];
    }
    
    if (empty($_POST["answer"])) {
        $compteErr++;
        $reponseErr = " ";
    } else {
        $reponse = test_input($_POST["answer"]);
        $reponse = strtolower($reponse);
        $Arr_reponse = ['reponse' => $reponse];
    }
    
    
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && $compteErr === 0 && verifCompletion()) {
    // echo 'test';
    
    $user_data=requeteBdd($Arr_email ,'SELECT * FROM account WHERE email= :email','fetch');

    if(empty($user_data)){
        $compteErr = "Cette adresse mail ne correspond à aucun compte";
    }else {
        
        if($user_data -> question === $question && strtolower($user_data -> reponse) === $reponse){
            requeteBdd(array_merge($Arr_email,$Arr_new_password),'UPDATE account SET password = :new_password WHERE email = :email');
            $success = "Votre mot de passe a été modifié avec succès !";
        }
        
    }
    
}



?>