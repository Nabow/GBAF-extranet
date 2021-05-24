<?php session_start(); 
     include_once "model/functions.php";
    
     reDirConnect(verifIdConnexion());
     $titre = 'GBAF - établissement';


    include "controller\controller_post.php";


?>

        <!--     HEADER       -->
        <?php include "template/header.php" ; ?>


    <section class="bloc-page">


        <section class="liste-article container">

            <article>
                
                    <!-- FICHE ARTICLE DE L'ACTEUR BANCAIRE -->
                    <div class="etablissement" >
                        <div class="description">
                            <h1><?= $etablissement -> acteur ?></h1>
                            <img class="logo" src="public/img/<?= $etablissement -> logo ?>" alt="">
                            <p><?= $etablissement -> description ?></p>
                        </div>
                    </div>





            </article>

            <!-- BOITE DES COMMENTAIRES -->
            <div class="commentaires box">
                <h2>Commentaires</h2>
                <p class="italic">(1 commentaire et 1 vote par personne)</p>



                <div class="formulaire-com">
               

                <!-- BOITE DE VOTE -->
                    <div class="vote" choix="<?= $class_vote_user ?>">
                            <a href="article.php?vote=1&id_acteur=<?= $id_acteur ?>" class="vote-oui">
                                <svg class="icon"><use xlink:href="public/svg/sprite.svg#vote-oui"></use></svg><?= $vote_oui ?>
                            </a>
                            <a href="article.php?vote=0&id_acteur=<?= $id_acteur ?>" class="vote-non">
                                <svg class="icon"><use xlink:href="public/svg/sprite.svg#vote-non"></use></svg><?= $vote_non ?>
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


    <?php include "template/footer.php" ; ?>

