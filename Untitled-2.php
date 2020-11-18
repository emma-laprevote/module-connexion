<?php
    session_start();
        if($_SESSION['username'] !== ""){
            $user = $_SESSION['username'];
            // afficher un message
            echo "Bonjour $user, vous êtes connecté";
                }
?>

$count = $base->prepare("SELECT COUNT(*) AS nbr FROM utilisateurs WHERE login =?");
                $count->execute(array($_POST['login']));
                $req  = $count->fetch(PDO::FETCH_ASSOC);