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