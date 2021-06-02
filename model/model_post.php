<?php 
    include_once "../core/functions.php";
    include_once '../core/connect_bdd.php';

    if (isset($_GET['id_acteur']) && isset($_COOKIE['id_user'])) {
        $id_acteur = (int)$_GET['id_acteur'];
        $Arr_id_acteur = array('id_acteur' => $id_acteur);
        $id_user = (int)$_COOKIE['id_user'];
        $Arr_id_user = array('id_user' => $id_user);
        $Arr_id_user_id_acteur = array_merge($Arr_id_user,$Arr_id_acteur);

    } else { 
        reDirConnect(true) ;
    }


   
    if (isset($_GET['vote'])) {

        $vote = (int)$_GET['vote'];

        $Arr_vote = array_merge($Arr_id_user_id_acteur, ['vote' => $vote]);


        if(requeteBdd($Arr_id_user,'SELECT * FROM vote WHERE id_user = :id_user','rowCount') > 0){
            requeteBdd($Arr_vote,"UPDATE vote SET vote= :vote WHERE id_user = :id_user AND id_acteur = :id_acteur");
        } else {
            requeteBdd($Arr_vote,'INSERT INTO vote(id_user, id_acteur, vote) VALUES (:id_user, :id_acteur, :vote) ');
        }
    }
    $modif_commentaire = requeteBdd( $Arr_id_user_id_acteur ,'SELECT * FROM post WHERE id_acteur = :id_acteur AND id_user = :id_user', 'rowCount',);



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

    $modif_commentaire = requeteBdd( $Arr_id_user_id_acteur ,'SELECT * FROM post WHERE id_acteur = :id_acteur AND id_user = :id_user', 'rowCount',);

    $etablissement = requeteBdd($Arr_id_acteur,'SELECT * FROM acteurs WHERE id_acteur = :id_acteur');





    $vote_oui = requeteBdd($Arr_id_acteur,'SELECT * FROM vote WHERE vote = 1 AND id_acteur = :id_acteur','rowcount');

$vote_non = requeteBdd($Arr_id_acteur,'SELECT * FROM vote WHERE vote = 0 AND id_acteur = :id_acteur','rowcount');

$vote_user = requeteBdd($Arr_id_user_id_acteur,'SELECT * FROM vote WHERE id_acteur = :id_acteur AND id_user = :id_user','fetch');




$class_vote_user= "";
if (!empty($vote_user)) {
    if (($vote_user -> vote) === 1) {
        $class_vote_user= "oui";
    } elseif ($vote_user -> vote === 0){
        $class_vote_user= "non";
    }
}



$commentaires = requeteBdd( $Arr_id_acteur ,'SELECT p.post, DATE_FORMAT(p.date_add, "%d-%m-%Y à %kh%i") AS date_post, ac.username, ac.id_user FROM post AS p INNER JOIN account AS ac ON p.id_user = ac.id_user WHERE id_acteur = :id_acteur', 'fetchAll');