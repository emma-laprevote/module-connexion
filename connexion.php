<?php
session_start();

    //Connexion à une base 
    $dsn = 'mysql:dbname=moduleconnexion;host=localhost';
    $user = 'root';
    $password = '';

    try { //Vérification de la connexion 
    
        $db = new PDO($dsn, $user, $password); // connexion PDO

    } catch (PDOException $e) {

        echo 'Connexion échouée : ' . $e->getMessage();
    }


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

                <?php
                if(isset($_SESSION['login']) == "") { ?>
                    
                <?php
                    } else { ?>
                    <a href="profil.php">Mon compte »</a>
                <?php
                    }
                ?>
                <?php
                if($_SESSION['login'] === 'admin') { ?>

                    <a href="admin.php">Espace admin »</a>

                <?php
                }
                ?>
            </nav>

        </header>

        <main class="formulaireconnex">

        <article>

        <section class="form">

            <form class="connexion" action="connexion.php" method="POST">
                
                    <legend>CONNEXION ...</legend>
                    <br>
                <div class="inputDiv">
                    <label class="ins" for="login">Login <span>*</span> :</label>
                    <input class="place" type="text" name="login" required placeholder="Nom d'utilisateur">
                </div>
                <br>
                <div class="inputDiv">
                    <label class="ins" for="passeword">Password <span>*</span> :</label>
                    <input class="place" type="password" name="password" required placeholder="Password">
                </div>
                <br>
                <input id="button" type="submit" name="envoyer" value="Envoyer" /> 
                <?php
               
                    if (isset($_POST['envoyer'])) {

                        $login = $_POST['login']; 
                        $pass = $_POST['password'];

                        if(!empty($login) && !empty($pass)) {

                        $loginS = htmlspecialchars(trim($login));
                        $passS = htmlspecialchars(trim($pass));

                        $sql = "SELECT login, password FROM utilisateurs WHERE login = :login";
                        $req = $db->prepare($sql);

                        $req->bindParam(':login', $login);
                        $req->execute();

                        $username = $req->fetch(PDO::FETCH_OBJ);
                        

                            if(!$username) { ?>

                                <p class="loginexist">Ce nom d'utilisateur est incorrect...</p> 

                            <?php
                            } else {

                                $mdp = $username->password;
                                $validPassword = password_verify($passS, $mdp);

                                if($validPassword) {

                                    $_SESSION['login'] = $username->login; 
                                    header('Location: index.php');
                                    
                                } else { ?>

                                    <p class="loginexist">Mot de passe incorrect...</p> 
                                
                                <?php
                                }
                     
                            }    
                        
                        }
                    
                    }
                     ?>
            </form>

            </section>
            

        </article>
        </main>
        <aside>
            <img id="journalism2" src="images/giphy2.gif" alt=" Animation ordinateur loading">
            <h1 class='titleaside'>connect<br>and change the world!</h1>
        </aside>
        <footer></footer>

    </body>

</html>