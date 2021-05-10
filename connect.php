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
    <script type="text/javascript" src="js/functions.js"></script>
    <title>Connexion GBAF</title>
</head>

<body>
    
    <section class="bloc-page">


        <!--     HEADER       -->
        <?php include("header.php"); ?>

        <section class="container">
                
            
            <div class="onglet">

                <p class="actif">Connexion</p>
                <p class="inactif">Inscription</p>

            </div>
            <div class="box-connexion">
                        <h1>Création d'un compte utilisateur</h1>

                <!-- <div class="formulaire-com"> -->
                
                    <!-- FORMULAIRE DE SAISIE DES COMMENTAIRES -->
                    <form class="connexion" action="connect.php" method="post">
                        
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" name="username" id="username">
                        <label for="mdp">Mot de passe</label>
                        <div class="mdp-box">
                            <input type="password" name="mdp" id="mdp">
                            <svg class="icon unmask"><use xlink:href="svg/sprite.svg#visibility_on"></use></svg>
                        </div>
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name">
                        <label for="first_name">Prénom</label>
                        <input type="text" name="first_name" id="first_name">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                        <label for="question">Question secrète</label>
                        <select name="question" id="question">
                                <option value="" selected="">--- Selectionner une question ---</option>
                                <option value="Quel est le nom de mon premier animal domestique ?">Quel est le nom de mon premier animal domestique ?
                        </option>
                                <option value="Quel est le nom du pays que j’aimerais le plus visiter ?">Quel est le nom du pays que j’aimerais le plus visiter ?
                        </option>
                                <option value="Quel est le nom du personnage historique que j’admire le plus ?">Quel est le nom du personnage historique que j’admire le plus ?
                        </option>
                                <option value="Quelle est la  marque du premier véhicule que j’ai conduit ?">Quelle est la  marque du premier véhicule que j’ai conduit ?
                        </option>
                                <option value="Quelle est votre couleur préférée ?">Quelle est votre couleur préférée ?</option>

                                <option value="Quelle est votre équipe sportive favorite ?">Quelle est votre équipe sportive favorite ?</option>
                                <option value="Quel était le métier de votre grand-père ?">Quel était le métier de votre grand-père ?</option>
                        </select>
                        <label for="answer">Réponse</label>
                        <input type="text" name="answer" id="answer">
                        <p><button class="bouton" type="submit">Inscription</button></p>
                    </form>
                <!-- </div> -->

            </div>

        </section>

    </section>


    <?php include("footer.php"); ?>


    <script>
        $('.unmask').on('click', function(){
        
        if($(this).prev('input').attr('type') == 'password')
            changeType($(this).prev('input'), 'text');
        
        else
            changeType($(this).prev('input'), 'password');
        
        return false;
        });
    </script>
</body>

</html>