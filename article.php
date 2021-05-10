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
        <?php include("header.php"); ?>

        <section class="liste-article container">

            <article>
                
                    <!-- FICHE ARTICLE DE L'ACTEUR BANCAIRE -->
                    <div class="etablissement" href="">
                        <div class="description">
                            <h1>DSA France</h1>
                            <img class="logo" src="img/Dsa_france.png" alt="">
                            <p>Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.
                            Nous accompagnons les entreprises dans les étapes clés de leur évolution.
                            Notre philosophie : s’adapter à chaque entreprise.
                            Nous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises
                            </p>
                        </div>
                    </div>

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
                            <textarea name="commentaire" id="commentaire" >Voici un test</textarea>
                        </label>
                        <p><input class="bouton" type="submit" value="Envoyer"></p>
                    </form>
                </div>

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


    <?php include("footer.php"); ?>

</body>

</html>