<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../img/GBAF-favicon.png" type="image/x-icon">

    <!-- Import de la police d'écriture -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <!-- <script src="../../core/showpassword.js"></script> -->
    <!-- <script type="text/javascript" src="js/functions.js"></script> -->
    <title><?= $titre ?></title>
</head>

<body>

    <header class="header-main">
        <div class="header__logo">
            <a href="index.php"><img src="../img/GBAF-logo.jpg" alt="logo-gbaf"
                    title="Groupement Banque Assurance Français"></a>
        </div>

        <div class="header__connexion">
            <ul>
                <?php  
                            if(verifIdConnexion()){ ?>
                <li><?= $_COOKIE['first_name'] . " " . $_COOKIE['name'] ?></li>
                <li><a href="../disconnect.php"><svg class="icon">
                            <use xlink:href="../svg/sprite.svg#deconnecter"></use>
                        </svg> Se déconnecter</a></li>
                <?php } else {?>
                <li></li>
                <li><a href="connect.php"><svg class="icon">
                            <use xlink:href="../svg/sprite.svg#connecter"></use>
                        </svg> Se connecter</a></li>
                <?php } ?>

            </ul>
        </div>

    </header>