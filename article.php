<?php session_start(); 
     include_once "php/functions.php";
    //  include_once "php/bdd.php";
    
     reDirConnect(verifIdConnexion());
     $titre = 'GBAF - établissement';

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
    include "php/comment.php";
    $modif_commentaire = requeteBdd( $Arr_id_user_id_acteur ,'SELECT * FROM post WHERE id_acteur = :id_acteur AND id_user = :id_user', 'rowCount',);


?>

        <!--     HEADER       -->
        <?php include "header.php" ; ?>


    <section class="bloc-page">


        <section class="liste-article container">

            <article>
                
            <?php 
                    $etablissement = requeteBdd($Arr_id_acteur,'SELECT * FROM acteurs WHERE id_acteur = :id_acteur');
                ?>

                    <!-- FICHE ARTICLE DE L'ACTEUR BANCAIRE -->
                    <div class="etablissement" >
                        <div class="description">
                            <h1><?= $etablissement -> acteur ?></h1>
                            <img class="logo" src="img/<?= $etablissement -> logo ?>" alt="">
                            <p><?= $etablissement -> description ?></p>
                        </div>
                    </div>





            </article>

            <!-- BOITE DES COMMENTAIRES -->
            <div class="commentaires box">
                <h2>Commentaires</h2>
                <p class="italic">(1 commentaire et 1 vote par personne)</p>


<?php 

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


?>
                <div class="formulaire-com">
               

                <!-- BOITE DE VOTE -->
                    <div class="vote" choix="<?= $class_vote_user ?>">
                            <a href="article.php?vote=1&id_acteur=<?= $id_acteur ?>" class="vote-oui">
                                <svg class="icon"><use xlink:href="svg/sprite.svg#vote-oui"></use></svg><?= $vote_oui ?>
                            </a>
                            <a href="article.php?vote=0&id_acteur=<?= $id_acteur ?>" class="vote-non">
                                <svg class="icon"><use xlink:href="svg/sprite.svg#vote-non"></use></svg><?= $vote_non ?>
                            </a>
                    </div>

                <!-- FORMULAIRE DE SAISIE DES COMMENTAIRES -->

                    <form action="article.php?id_acteur=<?= $id_acteur ?>" method="post">
                        <label for="commentaire">Saisir un commentaire<br>
                            <textarea name="commentaire" id="commentaire" ></textarea>
                        </label>
                        <p><input class="bouton" name="ok" type="submit" value="<?= (empty($modif_commentaire)) ? 'Envoyer' : 'Modifier' ; ?>"></p>
                    </form>
                </div>

<?php 

$commentaires = requeteBdd( $Arr_id_acteur ,'SELECT p.post, DATE_FORMAT(p.date_add, "%d-%m-%Y à %kh%i") AS date_post, ac.username, ac.id_user FROM post AS p INNER JOIN account AS ac ON p.id_user = ac.id_user WHERE id_acteur = :id_acteur', 'fetchAll');

?>

            <!-- LISTE DES COMMENTAIRES DEJA ECRITS -->
                <div class="liste-com">

                   
                    <?php foreach($commentaires as $commentaire): ?>
                        <div class="commentaire-n<?php if($commentaire -> id_user === $id_user){echo " commentaire-auteur";} ?>">
                            <p class="auteur"><strong><?= $commentaire -> username ?></strong> le <?= $commentaire -> date_post ?></p>
                            <p class="message"><?= nl2br($commentaire -> post) ?></p>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    </section>


    <?php include "footer.php" ; ?>

