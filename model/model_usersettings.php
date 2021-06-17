<?php 
    include_once "../core/functions.php";
    include_once '../core/connect_bdd.php';



    //Definition des variables
    $emailErr = $passwordErr = $nameErr = $first_nameErr = $questionErr = $reponseErr = "";
    $emailSucc = $passwordSucc = $nameSucc = $first_nameSucc = $questionSucc = $reponseSucc = "";
    $email = $password = $name = $first_name = $question = $reponse = "";
    $compteErr = 0;

$id_user = $_COOKIE['id_user'];
$Arr_id_user=['id_user' => $id_user];

// Test des valeurs du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
      // $emailErr = "";
      // $compteErr++;
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Adresse email invalide";
        $compteErr++;
      }else {
          $Arr_email=['email' => $email];
          if(requeteBdd($Arr_email,"SELECT * FROM account WHERE email= :email","rowCount")===0){
            requeteBdd(array_merge($Arr_email,$Arr_id_user),'UPDATE account SET email = :email WHERE id_user = :id_user');
            $emailSucc = "Votre email a été modifié avec succès !";

          }else {
            $emailErr="Cette adresse mail est déja utilisée";
          }

      }
    }
      
    if (empty($_POST["password"])) {
      // $passwordErr = " ";
      // $compteErr++;
    } else {
      $password = test_input($_POST["password"]);
      // check if password only contains letters and whitespace
      if (!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$password)) {
        $compteErr++;
        $passwordErr = "Minimum 8 caractères de long avec au moins : un numéro, une majuscule et une minuscule";
      }else {
        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 14]);
        $Arr_password = ['password' => $password];

        requeteBdd(array_merge($Arr_password,$Arr_id_user),'UPDATE account SET password = :password WHERE id_user = :id_user');
        $passwordSucc = "Votre mot de passe a été modifié avec succès !";

      }
    }
    
    if (empty($_POST["name"])) {
        // $compteErr++;
        // $nameErr = " ";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $compteErr++;
          $nameErr = "Seul les caractères alphabétiques sont acceptés";
        }else {
        $Arr_name = ['name' => $name];

        requeteBdd(array_merge($Arr_name,$Arr_id_user),'UPDATE account SET nom = :name WHERE id_user = :id_user');
        $nameSucc = "Votre nom a été modifié avec succès !";

    }
  }
  
  if (empty($_POST["first_name"])) {
      // $compteErr++;
      // $first_nameErr = " ";
  } else {
  $first_name = test_input($_POST["first_name"]);
  
  // check if first_name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
    $compteErr++;
    $first_nameErr = "Seul les caractères alphabétiques sont acceptés";
  }else {
    $Arr_first_name = ['first_name' => $first_name];
    requeteBdd(array_merge($Arr_first_name,$Arr_id_user),'UPDATE account SET prenom = :first_name WHERE id_user = :id_user');
    $first_nameSucc = "Votre prénom a été modifié avec succès !";
}
  }
        
    if (empty($_POST["question"])) {
        // $compteErr++;
        // $questionErr = "Il faut sélectionner une question";
    } else {
    $question = test_input($_POST["question"]);
    $Arr_question = ['question' => $question];
    requeteBdd(array_merge($Arr_question,$Arr_id_user),'UPDATE account SET question = :question WHERE id_user = :id_user');
    $questionSucc = "Votre question secrète a été modifiée avec succès !";

    }
    
    if (empty($_POST["answer"])) {
        // $compteErr++;
        // $reponseErr = " ";
    } else {
        $reponse = test_input($_POST["answer"]);
        $reponse = strtolower($reponse);
        $Arr_reponse = ['reponse' => $reponse];
        requeteBdd(array_merge($Arr_reponse,$Arr_id_user),'UPDATE account SET reponse = :reponse WHERE id_user = :id_user');
        $reponseSucc = "Votre reponse secrète a été modifiée avec succès !";
    
    }
    
    $query = requeteBdd($Arr_id_user,'SELECT * FROM account WHERE id_user = :id_user');
    
    setcookie('user', $query -> username, time() + 31*24*3600, null, null, false, true);
    setcookie('name', $query -> nom, time() + 31*24*3600, null, null, false, true);
    setcookie('first_name', $query -> prenom, time() + 31*24*3600, null, null, false, true);
    setcookie('email', $query -> email, time() + 31*24*3600, null, null, false, true);
    setcookie('id_user', $id_user, time() + 31*24*3600, null, null, false, true);
    setcookie('password', $query -> password, time() + 31*24*3600, null, null, false, true);

}


// if ($_SERVER["REQUEST_METHOD"] == "POST" && $compteErr === 0 && verifCompletion()) {
//     // echo 'test';
    
//     $user_data=requeteBdd($Arr_email ,'SELECT * FROM account WHERE email= :email','fetch');

//     if(empty($user_data)){
//         $compteErr = "Cette adresse mail ne correspond à aucun compte";
//     }else {
        
//         if($user_data -> question === $question && strtolower($user_data -> reponse) === $reponse){
//             requeteBdd(array_merge($Arr_email,$Arr_password),'UPDATE account SET password = :password WHERE email = :email');
//             $success = "Votre mot de passe a été modifié avec succès !";
//         }else {
//           $compteErr = "Le réponse est incorrecte";
//         }

        
//     }
    
// }


