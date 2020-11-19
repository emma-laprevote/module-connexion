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
   
 
    
    <title>ESPACE ADMIN</title>
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

                <?php
                if($_SESSION['login'] == "") { ?>
                    <a href="inscription.php">Inscription »</a>

                    <a href="connexion.php">Connexion »</a>
                    
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
        <main id="compteadherent">

        <article>
            <section id="freshnews3">

                <div id="titlesmodif">
                    <h1 id="titlecompte">Espace admin</h1>
                    <p id="textmodif">Informations membres.</p>
                </div>
            <?php 

                //Connexion à une base 
                $dsn = 'mysql:dbname=moduleconnexion;host=localhost';
                $user = 'root';
                $password = 'root';

                $requete = "SELECT * FROM utilisateurs";

                try { //Vérification de la connexion 
                    //Premier essai avec PDO 
                    $db = new PDO($dsn, $user, $password); // connexion PDO
                    $rep = $db->query($requete);
    
                if($rep === false) {
                    die("Erreur");
                }
    

                } catch (PDOException $e) {

                    echo 'Connexion échouée : ' . $e->getMessage();
    
                }

            ?>

            <table>
                <thead>

                    <th>ID</th>
                    <th>LOGIN</th>
                    <th>PRENOM</th>
                    <th>NOM</th>
                    <th>PASSWORD</th>
        
                </thead>

                    <tbody>

                    <?php

                        while ($row = $rep->fetch(PDO::FETCH_ASSOC)) : 
                        
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['login']); ?></td>
                        <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($row['nom']); ?></td>
                        <td><?php echo htmlspecialchars($row['password']); ?></td>
                    </tr>
                        <?php endwhile; ?>
                    </tbody>

            </table>

            </section>

        </article>

    </main>

        <footer>

        </footer>

    </body>

</html>