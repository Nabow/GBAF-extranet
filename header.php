<header class="header-main">
                <div class="header__logo">
                    <a href="index.php"><img src="img/GBAF-logo.jpg" alt="logo-gbaf" title="Groupement Banque Assurance Français"></a>
                </div>
        
                <div class="header__connexion">
                    <ul>
                        <?php  
                         if(verifIdConnexion($db)){ ?>
                            <li><?= $_COOKIE['first_name'] . " " . @$_COOKIE['name']; ?></li>
                            <li><a href="disconnect.php"><svg class="icon"><use xlink:href="svg/sprite.svg#deconnecter"></use></svg> Se déconnecter</a></li>
                        <?php } else {?>
                            <li></li>
                            <li><a href="connect.php"><svg class="icon"><use xlink:href="svg/sprite.svg#connecter"></use></svg> Se connecter</a></li>
                        <?php } ?>

                    </ul>
                </div>
        
</header>