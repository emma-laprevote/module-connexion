<?php 
session_start();

  //Connexion à une base 
  $dsn = 'mysql:dbname=moduleconnexion;host=localhost';
  $user = 'root';
  $password = 'root';

    try { //Vérification de la connexion 
  
        $db = new PDO($dsn, $user, $password); // connexion PDO

    } catch (PDOException $e) {

        echo 'Connexion échouée : ' . $e->getMessage();
    }
    //Requête qui va permettre de vérifier si le login existe déjà dans la base de donnée
    $count = $db->prepare("SELECT COUNT(*) AS nbr FROM utilisateurs WHERE login =?");
    $count->execute(array($_POST['login']));
    $req  = $count->fetch(PDO::FETCH_ASSOC);

    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $pass = $_POST['password'];
    $confpass = $_POST['confirm_password'];

    if (isset($_POST['envoyer']) && $req['nbr'] == 0) {

        if($pass == $confpass && !empty($login) && !empty($prenom) && !empty($nom) && !empty($pass) && !empty($confpass)) {

            //Précaution en plus au niveau de la sécurité en plus de PDO
            $loginS = htmlspecialchars(trim($login));
            $prenomS = htmlspecialchars(trim($prenom));
            $nomS = htmlspecialchars(trim($nom));
            $passS = htmlspecialchars(trim($pass));
            $confpassS = htmlspecialchars(trim($confpass));

            $cryptedpass = password_hash($pass, PASSWORD_BCRYPT);//Cryptage du mot de passe 
        
            //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
            $request = $db->prepare('INSERT INTO utilisateurs (login, prenom, nom, password) VALUES(:login, :prenom, :nom, :password)');
            $request->bindValue(':login', $loginS, PDO::PARAM_STR);
            $request->bindValue(':prenom', $prenomS, PDO::PARAM_STR);
            $request->bindValue(':nom', $nomS, PDO::PARAM_STR);
            $request->bindValue(':password', $cryptedpass, PDO::PARAM_STR);
            $request->execute()or die(print_r($request->errorInfo()));


            header('Location: connexion.php');
        }
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
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">   

    
    <title>Inscription</title>
</head>

<body>
    <header>
        
        <img id="logo" src="images/logoslash.png" alt="logomagazine">

        <section class="icones">

            <a href="https://www.facebook.com/emmalaprevote"><img id="icon" src="images/facebook.PNG" alt="iconefacebook"></a>
              
              
            <a href="https://www.linkedin.com/in/emkalaprevote"><img id="icon1" src="images/linkedin.PNG" alt="iconelinkedin"></a>
          
          
            <a href="https://twitter.com"><img id="icon2" src="images/twitter.PNG" alt="iconetwitter"></a>
          
          
            <a href="https://www.instagram.com/emk.a"><img id="icon3" src="images/insta.PNG" alt="iconeistagram"></a>
          
        </section>

        <nav>
            <a href="index.php">Accueil »</a>

            <a class="connex" href="inscription.php">Inscription »</a>

            <a href="connexion.php">Connexion »</a>
            <?php
                if($_SESSION['login'] == "") { ?>
                    
                <?php
                    } else { ?>
                    <a href="profil.php">Mon compte »</a>
                <?php
                    }
                ?>
            <?php
                if($_SESSION['login'] == 'admin') { ?>

                    <a href="admin.php">Espace admin »</a>

                <?php
                }
                ?>
        </nav>

    </header>

    <main id="formulaireconnex">

    <article>

        <section>

            <form class="inscription" action="inscription.php" method="POST">
                
                <legend>INSCRIPTION</legend>
                <br>
                <div class="inputDiv">
                    <label class="ins" for="login">Login<span>*</span> :</label>
                    <input class="place" type="text" name="login" required placeholder="Nom d'utilisateur">
                </div>
                <br>
                <div class="inputDiv">
                <label class="ins" for="prenom">Prénom<span>*</span> :</label>
                    <input class="place" type="text" name="prenom" required placeholder="Votre prénom">
                </div>
                <br>
                <div class="inputDiv">
                <label class="ins" for="nom">Nom<span>*</span> :</label>
                    <input class="place" type="text" name="nom" required placeholder="Votre nom">
                </div>
                <br>
                <div class="inputDiv">
                    <label class="ins" for="passeword">Password<span>*</span> :</label>
                    <input class="place" type="password" name="password" required placeholder="Password">
                </div>
                <br>
                <div class="inputDiv">
                    <label class="ins" for="confirm_passeword">Confirm password<span>*</span> :</label>
                    <input class="place" type="password" name="confirm_password" required placeholder="Password">
                </div>
                <br>
                <input id="button" type="submit" name="envoyer" value="Envoyer" />

                <?php
                   if (isset($_POST['envoyer']) && $req['nbr'] == 1) { ?>

                        <p class="loginexist">*Le login est déjà utilisé</p>

                    <?php  

                    } elseif ($confpass != $pass) { ?>

                        <p class="loginexist">* Les 2 mots de passe sont différents</p>
                    <?php
                    }
                    ?>
            </form>
        </section>
    </article>
    <aside>
          <img id="journalism1" src="images/giphy.gif" alt=" Animation It takes a journalism"> 
          <h1 class="titleaside1">Vivez l'experience Slash magazine, mieux qu'un slasher movie_ </h1>     
    </aside>
    </main>
    
    <footer></footer>
    
</body>
</html>