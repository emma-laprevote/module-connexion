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
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Nova+Flat&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">   
  
    
    <title>Connexion</title>
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

                <a class="connex" href="connexion.php">Connexion »</a>

                <a href="profil.php">Mon compte »</a>
                
                <a href="admin.php">Espace admin »</a>
            </nav>

        </header>

        <main class="formulaireconnex">

        <article>

        <section class="form">

            <form class="inscription" action="connexion.php" method="POST">
                
                    <legend>CONNEXION ...</legend>
                    <br>
                <div>
                    <label class="ins" for="login">Login <span>*</span> :</label>
                    <input class="place" type="text" name="login" required placeholder="Nom d'utilisateur">
                </div>
                <br>
                <div>
                    <label class="ins" for="passeword">Password <span>*</span> :</label>
                    <input class="place" type="password" name="password" required placeholder="Password">
                </div>
                <br>
                <input id="button" type="submit" name="envoyer" value="Envoyer" /> 
            </form>

            </section>

        </article>
            <aside>
                <img id="journalism2" src="images/giphy2.gif" alt=" Animation ordinateur loading">
                <h1 class='titleaside4'>connect<br>and change the world!</h1>
            <?php
                if(isset($_POST['login']) && isset($_POST['password']))
                {
                    // connexion à la base de données
                    $db_username = 'root';
                    $db_password = 'root';
                    $db_name     = 'moduleconnexion';
                    $db_host     = 'localhost';
                    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
                    or die('could not connect to database');
                    
                    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
                    // pour éliminer toute attaque de type injection SQL et XSS
                    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['login'])); 
                    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
                    
                    if (isset($_POST['envoyer'])) {

                        if($username !== "" && $password !== ""){

                            $requete = "SELECT count(*) FROM utilisateurs where 
                            login = '".$username."' and password = '".$password."' ";

                            $exec_requete = mysqli_query($db,$requete);

                            $reponse = mysqli_fetch_array($exec_requete);

                            $count = $reponse['count(*)'];

                                if($count!=0) // nom d'utilisateur et mot de passe correctes
                                {
                                    $_SESSION['login'] = $username; 
                                    header('Location: index.php');
                                } 
                                else
                                { ?>
                         
            <h1 class="titleaside2">OUP'S!</h1>
            <h1 class="titleaside3">Ton login ou ton mot de passe est incorrect...</h1>  
    <?php
    }
                        }  
                    }
                }

                    mysqli_close($db); // fermer la connexion

            ?>
        </aside>
        </main>

        <footer></footer>

    </body>

</html>