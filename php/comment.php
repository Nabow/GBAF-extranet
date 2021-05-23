<?php 
    include_once "php/functions.php";
    include_once 'php/id_bdd.php';

    $post = $postErr = "";
    $compteErr = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        
        if (empty($_POST["commentaire"])) {
            $compteErr++;
            $postErr = "Le commentaire est vide";
            echo "<br>". $postErr;
        } else {
            $post = test_input($_POST["commentaire"]);
        }
        
        $Arr_post = array_merge(['post' => $post], $Arr_id_user_id_acteur);
        
        if ($compteErr === 0) {
            if($modif_commentaire === 0){
                requeteBdd($Arr_post ,"INSERT INTO post(id_user, id_acteur, post) VALUES (:id_user, :id_acteur, :post)");
            } else{
                requeteBdd($Arr_post,"UPDATE post SET post= :post, date_add = NOW()  WHERE id_user = :id_user AND id_acteur = :id_acteur");
            }
        }
    }

