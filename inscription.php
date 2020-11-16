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

            <a href="connexion.php">Connexion »</a>
        
            <a class="connex" href="inscription.php">Inscription »</a>

            <a href="profil.php">Mon compte »</a>
                
            <a href="admin.php">Espace admin »</a>
        </nav>

    </header>

    <main class="formulaireconnex">

        <article>

        <section class="form">

            <form class="inscription" action="inscription.php" method="POST">
                
                <legend>INSCRIPTION</legend>
                <br>
                <div>
                    <label class="ins" for="login">Login<span>*</span> :</label>
                    <input class="place" type="text" name="login" required placeholder="Nom d'utilisateur">
                </div>
                <br>
                <div>
                <label class="ins" for="prenom">Prénom<span>*</span> :</label>
                    <input class="place" type="text" name="prenom" placeholder="Votre prénom">
                </div>
                <br>
                <div>
                <label class="ins" for="nom">Nom<span>*</span> :</label>
                    <input class="place" type="text" name="nom" required placeholder="Votre nom">
                </div>
                <br>
                <div>
                    <label class="ins" for="passeword">Password<span>*</span> :</label>
                    <input class="place" type="password" name="password" required placeholder="Password">
                </div>
                <br>
                <div>
                    <label class="ins" for="passeword">Confirm password<span>*</span> :</label>
                    <input class="place" type="password" name="password" required placeholder="Password">
                </div>
                <br>
                <input id="button" type="submit" name="envoyer" value="Envoyer" /> 
            </form>

            <?php
            //Connexion à une base 
            $dsn = 'mysql:dbname=moduleconnexion;host=localhost';
            $user = 'root';
            $password = '';
 
                try { //Vérification de la connexion 

                    $dbh = new PDO($dsn, $user, $password); // connexion PDO

                } catch (PDOException $e) {

                    echo 'Connexion échouée : ' . $e->getMessage();
                }

                if (isset($_POST['envoyer'])) {
                $sth = $dbh->prepare("INSERT INTO utilisateurs (login, prenom, nom, password) VALUES(?, ?, ?, ?)");
                $sth->execute(array($_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['password']));
           

                header('Location: connexion.php');
                
                }
            ?>

        </section>
    </article>
    <aside>
          <img id="journalism" src="images/giphy.gif" alt=" Animation It takes a journalism"> 
          <h1>Vivez l'experience Slash magazine, mieux qu'un slasher movie_ </h1>     
    </aside>
    </main>
    
    <footer></footer>
    
</body>
</html>