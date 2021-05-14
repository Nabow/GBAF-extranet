<?php 
    include_once "php/functions.php";
    include_once 'php/id_bdd.php';


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
      }
    }
    
    if($page_inscription){

        if (empty($_POST["name"])) {
            $compteErr++;
            $nameErr = " ";
        } else {
        $name = test_input($_POST["name"]);
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
        }
        
        if (empty($_POST["answer"])) {
            $compteErr++;
            $reponseErr = " ";
        } else {
            $reponse = test_input($_POST["answer"]);
        }
    
    }
}


    // try
    // {
    //     $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8;port=3307', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // }
    // catch (Exception $e)
    // {
    //         die('Erreur : ' . $e->getMessage());
    // }
    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    // try
    // {
    //     $db = mysqli_connect('localhost', 'root', 'root', 'gbaf', 3307);
    //     mysqli_set_charset($db, 'utf8mb4');
    // }
    // catch (Exception $e)
    // {
    //         die('Erreur : ' . $e->getMessage());
    // }

    // printf("Success... %s\n", mysqli_get_host_info($db));

// var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $compteErr === 0 && verifCompletion()) {
    // echo 'test';
    if ($page_inscription) {
        $username = $first_name . '.'.substr($name,0,2);


        $sql_u = "SELECT * FROM account WHERE username='$username'";
        $sql_e = "SELECT * FROM account WHERE email='$email'";
        $res_u = mysqli_query($db, $sql_u);
        $res_e = mysqli_query($db, $sql_e);
    
        if (mysqli_num_rows($res_u) > 0) {
            $i = 0;
            while (mysqli_num_rows($res_u) > 0) {
                $i++;
                $new_username = $username . $i;
                $sql_u = "SELECT * FROM account WHERE username='$new_username'";
            }
            $username = $new_username;
        }else if(mysqli_num_rows($res_e) > 0){
          $subErr = "Cet email est déjà utilisé"; 	
        }else{
             $query = "INSERT INTO account (nom, prenom, username, password, question, reponse, email) 
                      VALUES ('$name', '$first_name', '$username', '".md5($password)."', '$question', '$reponse', '$email')";
             $results = mysqli_query($db, $query);
            //  echo 'Saved!';

             $sql_e = "SELECT * FROM account WHERE email='$email'";
             $res_e = mysqli_query($db, $sql_e);
             $tableau = mysqli_fetch_assoc($res_e);
             $id_user = $tableau['id_user'];


             setcookie('user', $username, time() + 31*24*3600, null, null, false, true);
             setcookie('id_user', $id_user, time() + 31*24*3600, null, null, false, true);
             setcookie('email', $email, time() + 31*24*3600, null, null, false, true);
             setcookie('password', md5($password), time() + 31*24*3600, null, null, false, true);
             setcookie('name', $name, time() + 31*24*3600, null, null, false, true);
             setcookie('first_name', $first_name, time() + 31*24*3600, null, null, false, true);
             //  exit();
        }
        
    } else {
        

        $sql_e = "SELECT * FROM account WHERE email='$email'";
        $res_e = mysqli_query($db, $sql_e);


        if (mysqli_num_rows($res_e) === 0) {
            $connectErr = "Cet email n'existe pas dans la base de données"; 	
        } else{
            $tableau = mysqli_fetch_assoc($res_e);
            if($tableau['password'] === md5($password))
            $id_user = $tableau['id_user'];
            $name = $tableau['nom'];
            $first_name = $tableau['prenom'];


            setcookie('user', $username, time() + 31*24*3600, null, null, false, true);
            setcookie('name', $name, time() + 31*24*3600, null, null, false, true);
            setcookie('first_name', $first_name, time() + 31*24*3600, null, null, false, true);
            setcookie('email', $email, time() + 31*24*3600, null, null, false, true);
            setcookie('id_user', $id_user, time() + 31*24*3600, null, null, false, true);
            setcookie('password', md5($password), time() + 31*24*3600, null, null, false, true);
            
        }


    }
    header('Location: index.php');
    exit;
}



?>