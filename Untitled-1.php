<?php
            //Connexion à une base 
            $dsn = 'mysql:dbname=moduleconnexion;host=localhost';
            $user = 'root';
            $password = 'root';
 
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

$db_username = 'root';
                $db_password = 'root';
                $db_name     = 'moduleconnexion';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
                or die('could not connect to database');

                $requete = "SELECT login, prenom, nom FROM utilisateurs where 
                login = '".$_SESSION['login']."' ";

                $exec_requete = mysqli_query($db,$requete);

                $reponse = mysqli_fetch_array($exec_requete);


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