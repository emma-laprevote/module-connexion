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
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nova+Flat&family=Shadows+Into+Light&display=swap" rel="stylesheet">

    
    <title>Mon compte</title>
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
                <a href="index.php">Accueil »</a>

                <a href="inscription.php">Inscription »</a>

                <a href="connexion.php">Connexion »</a>

                <a class="connex" href="profil.php">Mon compte »</a>
                
                <a href="admin.php">Espace admin »</a>
            </nav>

        </header>

    <main id="compteadherent">

        <article>

            <section id="freshnews2">

                <div id="titlesmodif">
                <h1 id="titlecompte">Mon compte</h1>
                <p id="textmodif">Modifier les informations de votre compte.</p>
                </div>
    
            <section id="form3">
                <?php 
                //Connexion à une base 
                $dsn = 'mysql:dbname=moduleconnexion;host=localhost';
                $user = 'root';
                $password = 'root';
 
                try { //Vérification de la connexion 
                    //Premier essai avec PDO 
                    $db = new PDO($dsn, $user, $password); // connexion PDO

                } catch (PDOException $e) {

                    echo 'Connexion échouée : ' . $e->getMessage();
                }

                $requete = $db->prepare("SELECT login, prenom, nom FROM utilisateurs where 
                login = '".$_SESSION['login']."' ");
                $requete->execute(array());
                $reponse = $requete->fetch(PDO::FETCH_ASSOC);
            
                ?>
                <form class="inscription2" action="profil.php" method="POST">
                <div>
                    <label class="ins" for="login">Nouveau Login<span>*</span> :</label>
                    <input class="place" type="text" name="login" required placeholder="<?php echo $reponse['login'];?>">
                </div>
                <br>
                <div>
                <label class="ins" for="prenom">Prénom<span>*</span> :</label>
                    <input class="place" type="text" name="prenom" required placeholder="<?php echo $reponse['prenom'];?>">
                </div>
                <br>
                <div>
                <label class="ins" for="nom">Nom<span>*</span> :</label>
                    <input class="place" type="text" name="nom" required placeholder="<?php echo $reponse['nom'];?>">
                </div>
                <br>
                <div>
                    <label class="ins" for="passeword"> Nouveau Password<span>*</span> :</label>
                    <input class="place" type="password" name="password" required placeholder="Password">
                </div>
                <br>
                <div>
                    <label class="ins" for="confirm_passeword">Confirm nouveau password<span>*</span> :</label>
                    <input class="place" type="password" name="confirm_password" required placeholder="Password">
                </div>
                <br>
                <input id="buttonvalid" type="submit" name="envoyer" value="Envoyer" />
                <?php
                    //Connexion à une base 
                    $dsn = 'mysql:dbname=moduleconnexion;host=localhost';
                    $user = 'root';
                    $password = 'root';
 
                try { //Vérification de la connexion 
                    //Premier essai avec PDO 
                    $db = new PDO($dsn, $user, $password); // connexion PDO

                } catch (PDOException $e) {

                    echo 'Connexion échouée : ' . $e->getMessage();
                }

                $count = $db->prepare("SELECT COUNT(*) AS nbr FROM utilisateurs WHERE login =?");
                $count->execute(array($_POST['login']));
                $req  = $count->fetch(PDO::FETCH_ASSOC);


                if (isset($_POST['envoyer']) && $req['nbr'] == 0 && $_POST['confirm_password'] == $_POST['password']) {

                $sth = $db->prepare('UPDATE utilisateurs SET login= ?, prenom= ? , nom= ? , password= ? WHERE login = "'.$_SESSION['login'].'" ');
                $sth->execute(array($_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['password']));
           

                header('Location: connexion.php');
                
                } elseif (isset($_POST['envoyer']) && $req['nbr'] == 1) { ?>
                    <p class="loginexist">*Le login est déjà utilisé</p>
                <?php   
                }elseif ($_POST['confirm_password'] != $_POST['password']) { ?>
                    <p class="loginexist">* Les 2 mots de passe sont différents</p>
                <?php
                }
                ?>
    
                </form>
            </section>

        </article>

    </main>

        <footer>

        </footer>

    </body>

</html>