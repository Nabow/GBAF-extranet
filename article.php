<?php session_start(); 
     include_once "php/functions.php";
     include_once "php/bdd.php";
    
     reDirConnect(verifIdConnexion($db));
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <!--     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 -->
    <link rel="shortcut icon" href="img/GBAF-favicon.png" type="image/x-icon">
    
    <!-- Import de la police d'écriture -->
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
    <title>GBAF - établissement</title>
</head>

<body>
    
    <section class="bloc-page">


        <!--     HEADER       -->
        <?php include "header.php" ; ?>

        <section class="liste-article container">

            <article>
                
            <?php 
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8;port=3307', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }
                catch (Exception $e)
                {
                        die('Erreur : ' . $e->getMessage());
                }    
                
                
                if (isset($_GET['id_acteur'])) {
                    $acteur = (int)$_GET['id_acteur'];
                } else { 
                    reDirConnect(true) ;
                }

                    $etablissement = $bdd->prepare('SELECT * FROM acteurs WHERE id_acteur = ?');
                    // var_dump($acteur, $nom_recherche ) ;
                    
                    $etablissement->execute(array( $acteur ));


                    while($donnees = $etablissement->fetch())
                    { 
                ?>

                    <!-- FICHE ARTICLE DE L'ACTEUR BANCAIRE -->
                    <div class="etablissement" >
                        <div class="description">
                            <h1><?= $donnees['acteur'] ?></h1>
                            <img class="logo" src="img/<?= $donnees['logo'] ?>" alt="">
                            <p><?= $donnees['description'] ?></p>
                        </div>
                    </div>
                <?php }
                $etablissement->closeCursor();
                ?>



            </article>

            <!-- BOITE DES COMMENTAIRES -->
            <div class="commentaires box">
                <h2>Commentaires</h2>
                <p class="italic">(1 commentaire et 1 vote par personne)</p>

                <div class="formulaire-com">
                
                <!-- BOITE DE VOTE -->
                    <div class="vote" choix="oui">
                            <a href="article.php?vote=1" class="vote-oui">
                                <svg class="icon"><use xlink:href="svg/sprite.svg#vote-oui"></use></svg>0
                            </a>
                            <a href="article.php?vote=0" class="vote-non">
                                <svg class="icon"><use xlink:href="svg/sprite.svg#vote-non"></use></svg>0
                            </a>
                    </div>

                <!-- FORMULAIRE DE SAISIE DES COMMENTAIRES -->
                    <form action="article.php" method="post">
                        <label for="commentaire">Saisir un commentaire<br>
                            <textarea name="commentaire" id="commentaire" ></textarea>
                        </label>
                        <p><input class="bouton" type="submit" value="Envoyer"></p>
                    </form>
                </div>

<?php 

requeteBdd($_GET['id_acteur'],'id_acteur','SELECT * FROM acteurs WHERE id_acteur = :id_acteur');

    // $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8;port=3307', 'root', 'root', [
    //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    // ]);
    // $error = null;
    // $success = null; 

    // try {
    //     if (isset($_GET['id_acteur'])) {
    //         $query = $bdd->prepare('SELECT * FROM acteurs WHERE id_acteur = :id_acteur');
    //         $query->execute([
    //             'id_acteur' => $_GET['id_acteur']
    //         ]);
    //         $success = 'Votre article a bien été modifié';
    //     }

    //     $post = $query->fetch();
    // } catch (PDOException $e) {
    //     $error = $e->getMessage();
    // }

    // echo $success;
    // print_r($post)
?>

            <!-- LISTE DES COMMENTAIRES DEJA ECRITS -->
                <div class="liste-com">

                    <div class="commentaire-n">
                        <p class="auteur"><strong>Emmanuel</strong> le 18-12-2019 à 16h20</p>
                        <p class="message">bonjour</p>
                    </div>
                    <div class="commentaire-auteur commentaire-n">
                        <p class="auteur"><strong>Raphael</strong> le 04-05-2021 à 18:33</p>
                        <p class="message">Bravo pour le site, il bien fait !</p>
                    </div>
                </div>

            </div>

        </section>

    </section>


    <?php include "footer.php" ; ?>

</body>

</html>