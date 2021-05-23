<?php session_start(); 
     include_once "php/functions.php";
     include_once "php/bdd.php";
    
     reDirConnect(verifIdConnexion());

     $titre = 'GBAF';
?>

        <!--     HEADER       -->
        <?php include "header.php" ; ?>


    
    <section class="bloc-page">




        <!--    HERO      -->
        <div class="hero container box">



            <div class="text-hero ">
                <h1>Extranet du Groupement Banque Assurance Français</h1>
                <p>La Fédération bancaire française est l’organisation professionnelle qui représente toutes les banques
                    installées en France, et un lobby. Elle compte 340 entreprises bancaires adhérentes de toutes tailles
                    françaises ou étrangères dont 115 banques étrangères.</p>
                    <p>Nous avons créé cet extranet afin de vous renseigner au mieux sur des produits bancaires et des financeurs, entre autres.</p>
                    <p>Aujourd’hui, c’est la première base de données pour chercher ces informations de manière fiable et rapide ou pour donner son avis sur les partenaires et acteurs du secteur bancaire, tels que les associations ou les financeurs solidaires.</p>
                    <p>Ainsi le GBAF donne accès aux salariés des grands groupes français à un point d’entrée unique, répertoriant un grand nombre d’informations sur les partenaires, les acteurs du groupe, les produits et les services bancaires et financiers.</p>
                    <p>Chaque salarié pourra ainsi poster un commentaire et donner son avis.</p>
            </div>

            <!-- <img class src="https://images.unsplash.com/photo-1462206092226-f46025ffe607?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1953&q=80" alt="fédération-bancaire-francaise"> -->
        </div>


        <section class="liste-article container">
            <h2>Liste des établissements</h2>

            <form  method="post" action="index.php" class="formulaire">
                <label for="recherche_nom">Rechercher : <input type="text" name="recherche_nom" id="recherche_nom"></label>
                
                <label for="trier">Trier : 
                    <select name="trie">
                            <!-- <option value="bonne-note">Mieux noté</option>
                            <option value="mauvaise-note">Moins bien noté</option> -->
                            <option value="acteur ASC" selected="selected">Croissant</option>
                            <option value="acteur DESC">Décroissant</option>
                    </select>
                </label>
                <input class="bouton" type="submit" value="Ok">
            </form>

            <?php //echo ($_POST['trie']); ?>

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
                if (isset($_POST['trie'])) {
                    $ordre_tri = $_POST['trie'];
                } else { 
                    // switch ($ordre_tri) {
                    //     case 'acteur DESC':
                    //             $ordre_tri = 'acteur DESC'
                    //         break;
                    //     case 'acteur ASC':
                    //             $ordre_tri = 'acteur ASC'
                    //             break;
                                
                    //     default:
                    //             $ordre_tri = 'acteur ASC'
                    //         break;
                    // }
                    $ordre_tri = 'acteur ASC' ;}

                if (isset($_POST['recherche_nom'])) {
                    $nom_recherche = "%" . $_POST['recherche_nom'] . "%";
                } else { $nom_recherche = '%' ;}

                    $etablissement = $bdd->prepare("SELECT *, SUBSTRING(description, 1 , 200) AS extrait FROM acteurs WHERE acteur LIKE :recherche ORDER BY $ordre_tri ; ");
                    
                    $etablissement->execute(
                        [ 'recherche' => $nom_recherche 
                        ,
                        //   'tri' => $ordre_tri
                          ]
                    
                    );


                    while($donnees = $etablissement->fetch())
                    { 
                ?>

                    <a class="etablissement" href="article.php?id_acteur=<?=$donnees['id_acteur']?>">
                        <img class="logo" src="img/<?=$donnees['logo']?>" alt="">
                        <div class="description">
                            <h3><?=$donnees['acteur']?></h3>
                            <p><?= nl2br($donnees['extrait'])?>...
                            </p>
                            <div class="bouton">
                                <p >Lire la suite</p>
                            </div>
                        </div>
                    </a>
                <?php }
                $etablissement->closeCursor();
                ?>
            </article>

        </section>

    </section>
    <div class="pagination">
        <p>Page 1</p>
    </div>

    <?php include "footer.php" ; ?>