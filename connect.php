<?php session_start(); 
    include_once "model/functions.php";
    
    //    reDir(verifConnexion()) ;

    // isset($_GET['type'])?$page_inscription = true:$page_inscription=false;

    
    include_once "controller/controller_connect.php";

if(verifIdConnexion()){header('Location: index.php');}
$titre = 'Connexion GBAF';
?>


        <!--     HEADER       -->
        <?php include "template/header.php"; ?>

    
    <section class="bloc-page">



        <section class="container">
                

            
<!-- ONGLETS -->
            <div class="onglet">
                <?php if($page_inscription){ ?> 
                    <a href="connect.php" class="inactif">Connexion</a>
                    <a href="connect.php?type=1" class="actif">Inscription</a>
                <?php }else{ ?>
                    <a href="connect.php" class="actif">Connexion</a>
                    <a href="connect.php?type=1" class="inactif">Inscription</a>
                <?php } ?>


            </div>

<!-- TITRE -->
            <div class="box-connexion">
               <?php if($page_inscription){ ?> <h1>Création d'un compte utilisateur</h1> <?php }else{ ?><h1>Connexion à votre compte</h1><?php } 

               if(verifCompletion()===false) { ?> <p class="warning">* Merci de compléter tous les champs</p> <?php } 

               
               if(!empty($connectErr) || !empty($subtErr)) { ?> <p class="warning"><?= $compteErr . $subErr ?></p> <?php } ?> 
               

<!-- FORMULAIRE DE SAISIE DES COMMENTAIRES -->
                    
                    <form class="connexion" action="#<?php if ($page_inscription){ echo '?type=1'; } ?>" method="post">
                        
                        <!-- Champ email -->
                        <label for="email">Email 
                            <?php if(!empty($emailErr)) { ?> <span class="warning"> * <?= $emailErr ?> </span> <?php ; }  ?>
                        </label>
                        <input type="email" name="email" id="email" value="<?= $email ?>">
                        
                        <!-- Champ password -->
                        <label for="password">Mot de passe
                            <?php if(!empty($passwordErr)) { ?> <span class="warning"> * <?= $passwordErr ?> </span> <?php ; }  ?>
                        </label>
                        <div class="password-box">
                            <input type="password" name="password" id="password" value="<?= $password ?>">
                            <svg class="icon unmask" onclick="Afficher()"><use xlink:href="public/svg/sprite.svg#visibility_on"></use></svg>
                        </div>

                        <?php if ($page_inscription){
                            ?>

                                <!-- Champ nom -->
                                <label for="name">Nom
                                    <?php if(!empty($nameErr)) { ?> <span class="warning"> * <?= $nameErr ?> </span> <?php ; }  ?>
                                </label>
                                <input type="text" name="name" id="name" value="<?= $name ?>">

                                <!-- Champ prénom -->
                                <label for="first_name">Prénom
                                    <?php if(!empty($first_nameErr)) { ?> <span class="warning"> * <?= $first_nameErr ?> </span> <?php ; }  ?>
                                </label>
                                <input type="text" name="first_name" id="first_name" value="<?= $first_name ?>">

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

                                <!-- Bouton Inscription -->
                                <p><button class="bouton" name="ok" type="submit">Inscription</button></p>
                                
                                <?php
                        }else{?>
                            <!-- Bouton Connexion -->
                            <a href="forgottenpwd.php">Mot de passe oublié</a>
                            <p><button class="bouton" name="ok" type="submit">Connexion</button></p>
                        <?php } ?>
                    </form>

            </div>

        </section>

    </section>

<!-- FOOTER -->
    <?php include "template/footer.php"; ?>


<script>
    function Afficher()
    { 
    var input = document.getElementById("password"); 
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
