<?php 

include_once "../core/functions.php";

include "../model/model_usersettings.php";
reDirConnect(verifIdConnexion());
$titre = 'Paramètres de compte - GBAF';

?>

<!--     HEADER       -->
<?php include "template/header.php"; ?>

<section class="bloc-page">



    <section class="container">




        <!-- TITRE -->
        <div class="box-connexion">
            <h1>Changer les paramètres du compte</h1>
       
            <!-- FORMULAIRE DE SAISIE -->

            <form class="connexion" action="usersettings.php" method="post">

                <!-- Champ email -->
                <label for="email">Email
                    <?php if(!empty($emailErr)) { ?> <span class="warning"> * <?= $emailErr ?> </span> <?php ; }  ?>
                    <?php if(!empty($emailSucc)) { ?> <span class="success"> * <?= $emailSucc ?> </span> <?php ; }  ?>
                </label>
                <input type="email" name="email" id="email" value="<?= $email ?>">

                <!-- Champ password -->
                <label for="password">Nouveau mot de passe
                    <?php if(!empty($passwordErr)) { ?> <span class="warning"> * <?= $passwordErr ?> </span>
                    <?php ; }  ?>
                    <?php if(!empty($passwordSucc)) { ?> <span class="success"> * <?= $passwordSucc ?> </span> <?php ; }  ?>

                </label>
                <div class="password-box">
                    <input type="password" name="password" id="password" value="<?= $password ?>">
                    <svg class="icon unmask" onclick="Afficher()">
                        <use xlink:href="svg/sprite.svg#visibility_on"></use>
                    </svg>
                </div>


                <!-- Champ nom -->
                <label for="name">Nom
                    <?php if(!empty($nameErr)) { ?> <span class="warning"> * <?= $nameErr ?> </span> <?php ; }  ?>
                    <?php if(!empty($nameSucc)) { ?> <span class="success"> * <?= $nameSucc ?> </span> <?php ; }  ?>

                </label>
                <input type="text" name="name" id="name" value="<?= $name ?>">

                <!-- Champ prénom -->
                <label for="first_name">Prénom
                    <?php if(!empty($first_nameErr)) { ?> <span class="warning"> * <?= $first_nameErr ?> </span>
                    <?php ; }  ?>
                    <?php if(!empty($first_nameSucc)) { ?> <span class="success"> * <?= $first_nameSucc ?> </span> <?php ; }  ?>

                </label>
                <input type="text" name="first_name" id="first_name" value="<?= $first_name ?>">

                <!-- Sélecteur question -->
                <label for="question">Question secrète
                    <?php if(!empty($questionErr)) { ?> <span class="warning"> * <?= $questionErr ?> </span>
                    <?php ; }  ?>
                    <?php if(!empty($questionSucc)) { ?> <span class="success"> * <?= $questionSucc ?> </span> <?php ; }  ?>
                </label>
                <select name="question" id="question">
                    <option value="" selected="<?= $question ?>">--- Selectionnez une question ---</option>
                    <option value="Quel est le nom de mon premier animal domestique ?">Quel est le nom de mon premier
                        animal domestique ?
                    </option>
                    <option value="Quel est le nom du pays que j’aimerais le plus visiter ?">Quel est le nom du pays que
                        j’aimerais le plus visiter ?
                    </option>
                    <option value="Quel est le nom du personnage historique que j’admire le plus ?">Quel est le nom du
                        personnage historique que j’admire le plus ?
                    </option>
                    <option value="Quelle est la  marque du premier véhicule que j’ai conduit ?">Quelle est la marque du
                        premier véhicule que j’ai conduit ?
                    </option>
                    <option value="Quelle est votre couleur préférée ?">Quelle est votre couleur préférée ?</option>

                    <option value="Quelle est votre équipe sportive favorite ?">Quelle est votre équipe sportive
                        favorite ?</option>
                    <option value="Quel était le métier de votre grand-père ?">Quel était le métier de votre grand-père
                        ?</option>
                </select>

                <!-- Champ réponse -->
                <label for="answer">Réponse
                    <?php if(!empty($reponseErr)) { ?> <span class="warning"> * <?= $reponseErr ?> </span> <?php ; }  ?>
                    <?php if(!empty($reponseSucc)) { ?> <span class="success"> * <?= $reponseSucc ?> </span> <?php ; }  ?>
                </label>
                <input type="text" name="answer" id="answer" value="<?= $reponse ?>">

                <p><button class="bouton" name="ok" type="submit">Mettre à jour</button></p>



            </form>


        </div>

    </section>

</section>

<script>
    function Afficher() {
        var input = document.getElementById("password");
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
</script>
    
    <!-- FOOTER -->
    <?php include "template/footer.php"; ?>