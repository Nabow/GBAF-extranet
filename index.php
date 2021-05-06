<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <!--     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 -->
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/GBAF-favicon.png" type="image/x-icon">

    <!-- Import de la police d'écriture -->
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <title>GBAF</title>
</head>
<header class="main-header">
        <a href="#"><img src="img/GBAF-logo-paysage.png" alt="logo-gbaf" title="Groupement Banque Assurance Français"></a>

        <div class="connexion">
            <img src="https://github.com/google/material-design-icons/blob/master/android/action/perm_identity/materialicons/black/res/drawable-hdpi/baseline_perm_identity_black_36.png?raw=true"
                alt="connect">

            <div>
                <p>Jean Claude Dus<br>
                <a href="#">Se déconnecter</a></p>
            </div>
        </div>

</header>

<body>
    <div class="bloc-page">

        <div class="hero">
            
            <div class="text-hero">
                <h1>Extranet du Groupement Banque Assurance Français</h1>
                <p>La Fédération bancaire française est l’organisation professionnelle qui représente toutes les banques
                    installées en France, et un lobby. Elle compte 340 entreprises bancaires adhérentes de toutes tailles
                    françaises ou étrangères dont 115 banques étrangères.</p>
                    <p>Nous avons créé cet extranet afin de vous renseigner au mieux sur des produits bancaires et des financeurs, entre autres.</p>
                    <p>Aujourd’hui, c’est la première base de données pour chercher ces informations de manière fiable et rapide ou pour donner son avis sur les partenaires et acteurs du secteur bancaire, tels que les associations ou les financeurs solidaires.</p>
                    <p>Ainsi le GBAF donne accès aux salariés des grands groupes français à un point d’entrée unique, répertoriant un grand nombre d’informations sur les partenaires, les acteurs du groupe, les produits et les services bancaires et financiers.</p>
                    <p>Chaque salarié pourra ainsi poster un commentaire et donner son avis.</p>
                    <a href="#">En savoir plus</a>
            </div>

            <!-- <img class src="https://images.unsplash.com/photo-1462206092226-f46025ffe607?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1953&q=80" alt="fédération-bancaire-francaise"> -->
        </div>

        <div class="liste-article">
            <h2>Liste des établissements</h2>

            <form action="post">
                <label for="recherche_nom">Rechercher :</label>
                <input type="text" name="recherche_nom" id="recherche_nom">
                <input type="submit" value="Ok">
            </form>
            <article>
                

                    <a class="etablissement" href="">
                        <img class="logo" src="img/Dsa_france.png" alt="">
                        <div class="description">
                            <h3>DSA France</h3>
                            <p>Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.
                            Nous accompagnons les entreprises dans les étapes clés de leur évolution.
                            Notre philosophie : s’adapter à chaque entreprise.
                            Nous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises
                            </p>
                            <div class="bouton">
                                <p >Lire la suite</p>
                            </div>
                        </div>
                    </a>

                    <a class="etablissement" href="">
                        <img class="logo" src="img/CDE.png" alt="">
                        <div class="description">
                            <h3>DSA France</h3>
                            <p>Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.
                            Nous accompagnons les entreprises dans les étapes clés de leur évolution.
                            Notre philosophie : s’adapter à chaque entreprise.
                            Nous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises
                            </p>
                            <div class="bouton">
                                <p >Lire la suite</p>
                            </div>
                        </div>
                    </a>

                    <a class="etablissement" href="">
                        <img class="logo" src="img/Dsa_france.png" alt="">
                        <div class="description">
                            <h3>DSA France</h3>
                            <p>Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.
                            Nous accompagnons les entreprises dans les étapes clés de leur évolution.
                            Notre philosophie : s’adapter à chaque entreprise.
                            Nous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises
                            </p>
                            <div class="bouton">
                                <p >Lire la suite</p>
                            </div>
                        </div>
                    </a>

            </article>

        </div>

    </div>
    <div class="pagination">
        <p>Page </p>
    </div>


</body>

</html>