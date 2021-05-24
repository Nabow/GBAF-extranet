<?php 
    include_once "model/functions.php";
    include_once 'model/connect_bdd.php';


isset($_GET['type'])?$page_inscription = true:$page_inscription=false;


    //Definition des variables
    $emailErr = $passwordErr = $nameErr = $first_nameErr = $questionErr = $reponseErr = "";
    $email = $password = $name = $first_name = $question = $reponse = $username = "";
    $connectErr = $subErr = Null;
    $compteErr = 0;

// Test des valeurs du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST" && verifCompletion()) {
    if (empty($_POST["email"])) {
      $emailErr = " ";
      $compteErr++;
    } else {
      $email = test_input($_POST["email"]);
      $Arr_email = ['email' => $email];
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Adresse email invalide";
        $compteErr++;
      }
    }
      
    if (empty($_POST["password"])) {
      $passwordErr = " ";
      $compteErr++;
    } else {
      $password = test_input($_POST["password"]);
      // check if password only contains letters and whitespace
      if (!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$password)) {
          $compteErr++;
          $passwordErr = "Minimum 8 caractères de long avec au moins : un numéro, une majuscule et une minuscule";
        }else {
            $password = md5($password);
            $Arr_password = ['password' => $password];
      }
    }
    
    if($page_inscription){

        if (empty($_POST["name"])) {
            $compteErr++;
            $nameErr = " ";
        } else {
        $name = test_input($_POST["name"]);
        $Arr_name = ['name' => $name];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $compteErr++;
            $nameErr = "Seul les caractères alphabétiques sont acceptés";
        }
        }
        
        if (empty($_POST["first_name"])) {
            $compteErr++;
            $first_nameErr = " ";
        } else {
        $first_name = test_input($_POST["first_name"]);
        $Arr_first_name = ['first_name' => $first_name];

        // check if first_name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
            $compteErr++;
            $first_nameErr = "Seul les caractères alphabétiques sont acceptés";
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
            $Arr_reponse = ['reponse' => $reponse];
        }
    
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && $compteErr === 0 ) {


    if ($page_inscription) {
        $username = $first_name . '.'.substr($name,0,2);
        $Arr_username = ['username' => $username];
        
        echo "<br>test 1";
        
        $nb_email = requeteBdd($Arr_email,"SELECT * FROM account WHERE email= :email","rowCount");
        $nb_user = requeteBdd($Arr_username,"SELECT * FROM account WHERE username= :username","rowCount");
    
        if ($nb_user > 0) {
            echo "<br>test 2";

            $i = 0;
            while ($nb_user > 0) {
                $i++;
                $username = $username . $i;
                $Arr_username = ['username' => $username];
                $nb_user = requeteBdd($Arr_username,"SELECT * FROM account WHERE username= :username","rowCount");
            }
            echo $username;
        }
        if($nb_email > 0){
            echo "<br>test 3";

          $subErr = "Cet email est déjà utilisé"; 	
        }else{
            echo "<br>test 4";

            $query_bdd = requeteBdd(array_merge($Arr_name,$Arr_first_name,$Arr_username,$Arr_password,$Arr_question,$Arr_reponse,$Arr_email),
                        'INSERT INTO account (nom, prenom, username, password, question, reponse, email) 
                        VALUES (:name, :first_name, :username, :password, :question, :reponse, :email)');


            $query_email = requeteBdd($Arr_email,"SELECT * FROM account WHERE email= :email","fetch");
            $id_user = $query_email -> id_user;


             setcookie('user', $username, time() + 31*24*3600, null, null, false, true);
             setcookie('id_user', $id_user, time() + 31*24*3600, null, null, false, true);
             setcookie('email', $email, time() + 31*24*3600, null, null, false, true);
             setcookie('password', $password, time() + 31*24*3600, null, null, false, true);
             setcookie('name', $name, time() + 31*24*3600, null, null, false, true);
             setcookie('first_name', $first_name, time() + 31*24*3600, null, null, false, true);
        }
        
    } else {
        

        $nb_email = requeteBdd($Arr_email,"SELECT * FROM account WHERE email= :email","rowCount");

        if ($nb_email === 0) {
            $connectErr = "Cet email n'existe pas dans la base de données"; 	
        } else{
            $query_email = requeteBdd($Arr_email,"SELECT * FROM account WHERE email= :email","fetch");

            if($query_email -> password === $password){

                $id_user = $query_email -> id_user;
                $name = $query_email -> nom;
                $first_name = $query_email -> prenom;
    
    
                setcookie('user', $username, time() + 31*24*3600, null, null, false, true);
                setcookie('name', $name, time() + 31*24*3600, null, null, false, true);
                setcookie('first_name', $first_name, time() + 31*24*3600, null, null, false, true);
                setcookie('email', $email, time() + 31*24*3600, null, null, false, true);
                setcookie('id_user', $id_user, time() + 31*24*3600, null, null, false, true);
                setcookie('password', md5($password), time() + 31*24*3600, null, null, false, true);
            }else {
                $connectErr = "Mot de passe eronné";
            }
            
        }


    }
    header('Location: index.php');
    exit;
}



?>