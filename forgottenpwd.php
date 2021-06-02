<?php 

include_once "core/functions.php";

if(verifIdConnexion()){header('Location: index.php');}
$titre = 'Mot de passe oublié - GBAF';

include "model/model_forgot_password.php";
?>

<!--     HEADER       -->
<?php include "template/header.php"; ?>

<section class="bloc-page">



<section class="container">
        

    


<!-- TITRE -->
    <div class="box-connexion">
        <h1>Mot de passe oublié</h1>
       <?php 

       if(verifCompletion()===false) { ?> <p class="warning">* Merci de compléter tous les champs</p> <?php } 

       
       if(!empty($connectErr) || !empty($subtErr)) { ?> <p class="warning"><?= $compteErr . $subErr ?></p> <?php } ?> 
       

<!-- FORMULAIRE DE SAISIE -->
            
        <?php if(!empty($success)): ?>

            <p><?= $success ?></p>

        <?php else: ?>
            <form class="connexion" action="forgottenpwd.php" method="post">
                
                <!-- Champ email -->
                <label for="email">Email 
                    <?php if(!empty($emailErr)) { ?> <span class="warning"> * <?= $emailErr ?> </span> <?php ; }  ?>
                </label>
                <input type="email" name="email" id="email" value="<?= $email ?>">
                
                <!-- Champ password -->
                <label for="new_password">Nouveau mot de passe
                    <?php if(!empty($new_passwordErr)) { ?> <span class="warning"> * <?= $new_passwordErr ?> </span> <?php ; }  ?>
                </label>
                <div class="password-box">
                    <input type="password" name="new_password" id="new_password" value="<?= $new_password ?>">
                    <svg class="icon unmask" onclick="Afficher()"><use xlink:href="public/svg/sprite.svg#visibility_on"></use></svg>
                </div>
                

                <!-- Sélecteur question -->
                <label for="question">Question secrète
                    <?php if(!empty($questionErr)) { ?> <span class="warning"> * <?= $questionErr ?> </span> <?php ; }  ?>
                </label>
                <select name="question" id="question">
                        <option value="" selected="<?= $question ?>">--- Selectionnez une question ---</option>
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

                <!-- Champ réponse -->
                <label for="answer">Réponse
                    <?php if(!empty($reponseErr)) { ?> <span class="warning"> * <?= $reponseErr ?> </span> <?php ; }  ?>
                </label>
                <input type="text" name="answer" id="answer" value="<?= $reponse ?>" >

                <p><button class="bouton" name="ok" type="submit">Changer le mot de passe</button></p>



            </form>

            <?php endif ; ?>

    </div>

</section>

</section>

<!-- FOOTER -->
<?php include "template/footer.php"; ?>


<script>
    function Afficher()
    { 
    var input = document.getElementById("new_password"); 
    if (input.type === "password")
    { 
    input.type = "text"; 
    } 
    else
    { 
    input.type = "password"; 
    } 
    } 
</script>