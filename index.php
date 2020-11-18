<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="connexion.css">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">   
 
    
    <title>SLASH MAGAZINE</title>
</head>

    <body>

        <header>
            
            <img id="logo" src="images/logoslash.png">

            <section class="icones">

                <a href="https://www.facebook.com/emmalaprevote"><img id="icon" src="images/facebook.PNG" alt="iconefacebook"></a>
                  
                  
                <a href="https://www.linkedin.com/in/emkalaprevote"><img id="icon1" src="images/linkedin.PNG" alt="iconelinkedin"></a>
              
              
                <a href="https://twitter.com"><img id="icon2" src="images/twitter.PNG" alt="iconetwitter"></a>
              
              
                <a href="https://www.instagram.com/emk.a"><img id="icon3" src="images/insta.PNG" alt="iconeistagram"></a>
              
            </section>

            <nav>
                <a class="connex" href="index.php">Accueil »</a>

                <a href="inscription.php">Inscription »</a>

                <a href="connexion.php">Connexion »</a>

                <?php
                if($_SESSION['login'] == "") { ?>
                    
                <?php
                    } else { ?>
                    <a href="profil.php">Mon compte »</a>
                <?php
                    }
                ?>
                <a href="admin.php">Espace admin »</a>
            </nav>
            <section id="deconnexion">
                <?php
                if($_SESSION['login'] == "") { ?>
                
                <?php
                } else { ?>
                    <form class="deconnect" action="index.php" method="POST">
                    <input id="buttondeco" type="submit" name="deconnecter" value="Deconnection" />
                    </form>
                <?php
                }
                if(isset($_POST['deconnecter'])) {
                    session_destroy();
                    header('Location: index.php');
                }
                ?>
                
            </section>
        </header>

    <main id="accueil">

        <article>

            <section id="freshnews">

                <section id="presentadherent">

                    <div id="adherent">
                    <div>
                    <img id="retro" src="images/giphy3.gif" alt="gif retro">
                    </div>
                    <section class="buttons">
                    <?php
                        if($_SESSION['login'] == "") {
                            $user = $_SESSION['login'];
                                // afficher un message
                            echo "<h3 id='identity2'>HELLO WORLD !</h3>
                            <a class='button2' href='connexion.php'>Connexion</a>
                            <a class='button1' href='inscription.php'>Inscription</a>";

                        } elseif ($_SESSION['login'] != "") { 
                            $user = $_SESSION['login'];

                            echo "<h3 id='identity'>HELLO $user !</h3>
                            <a class='button2' href='profil.php'>Mon profil</a>
                            <a class='button1' href='#'>Ecrire un article</a>";
                        
                        }
                        ?>
                    </section>
                    </div>

                    <div class="presentslash">
                        <h1 id="titleslash">SLASH/</h1>
                        <p id="textslash"><strong>Slash magazine</strong>, le magazine numérique dédié au journalisme libre et indépendant<br>
                    Mettez vos talents de rédacteur au profil du savoir et de l'information en adhérent à la communauté Slasher, in order to slash the world!<br>
                    Une plateforme 100% gratuite où règne la liberté d'expression.</p>
                    </div>

                </section>

                <section id="press1">

                    <div class="articleprothese">
                        <h6>Tech</h6>
                        <a id="lienarticle" href="#" target="_blank"><h1 id="titleprothese">Des amputés fabriquent leurs propres prothèses pour changer le monde</h1></a>
                        <p class="p1">Après des décennies de statu quo, des activistes bardés d'imprimantes 3D font 
                        souffler un vent de changement sur l'industrie des prothèses.</p>
                        <p class="p2">Sébastien Morelli</p>
                        <p class="p2">16.11.20</p>
                    </div>
                    <div class="photo1">
                        <img id="prothese" src="images/prothese.webp" alt="photo prohtese jambe">
                    </div>
                </section>

            <section class="articlerow">

                <section id="press2">
                    <div class="articleculture">
                        <div class="photo2">
                            <img id="conchita" src="images/conchita.webp" alt="photo portrait madame pipi">
                        </div>
                        <h6>Culture</h6>
                        <a id="lienarticle2" href="#" target="_blank"><h3>On a tapé la discute à la madame pipi du Fuse, club légendaire bruxellois</h3></a>
                        <p class="p3">« Avec moi, si on n’a pas 50 centimes, on ne va pas aux toilettes, et si on est 
                            désagréable, on se prend un coup de raclette. »</p>
                        <p class="p4">Hanna Pallot</p>
                        <p class="p4">il y a 3 jours</p>
                    </div>
                </section>

                <section id="press3">
                    <div class="articlefood">
                        <div class="photo3">
                            <img id="vino" src="images/vino.webp" alt="photo domaine américain">
                        </div>
                        <h6>Food</h6>
                        <a id="lienarticle3" href="#" target="_blank"><h3>Bleu, blanc, rouge : tout ce que le pinard américain doit à la France </h3></a>
                        <p class="p3">Dans les pas des vignerons de l’Hexagone à l’origine des premières bouteilles de pif du Nouveau Monde.</p>
                        <p class="p4">Alexis Ferenczi</p>
                        <p class="p4">il y a 3 jours</p>
                    </div>
                </section>

                <section id="press4">
                    <div class="articlegame">
                        <div class="photo4">
                            <img id="console" src="images/xbox.webp" alt="photo nouvelle xbox">
                        </div>
                        <h6>Gaming</h6>
                        <a id="lienarticle4" href="#" target="_blank"><h3>Les nouvelles Xbox ont été conçues pour éliminer les petits tracas du gamer</h3></a>
                        <p class="p3">Les Series X et S de Microsoft n’ont pas encore de nouveaux jeux, 
                        mais ça ne les empêchera pas de vous faire de l'œil avec le catalogue existant.</p>
                        <p class="p4">Rob Zacny</p>
                        <p class="p4">16.11.20</p>
                    </div>
                </section>
               
            </section>

            </section>

        </article>

    </main>

        <footer>

        </footer>

    </body>

</html>