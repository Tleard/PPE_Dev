<?php
$options = array(
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password2'])) {
    if (empty($_POST['pseudo'])) {
        echo "<p class='red'>Faut mettre un pseudo maggle !</p>";
    } elseif (empty($_POST['password'])) {
        echo "<p class='red'>Faut mettre un mot de passe maggle !</p>";
    } elseif (empty($_POST['password2'])) {
        echo "<p class='red'>Faut confirmer ton mot de passe maggle !</p>";
    } elseif (!isset($_POST['gcu'])) {
        echo "<p class=red>Bon, now faut cliquer sur la petite case, maggle</p>";
    } else {
        try {
            $bdd = new PDO("mysql:host=localhost;charset=utf8;dbname=PPE;", "Belette", "Incorrect");
            $bdd->exec("insert into connexion (user, mdp, nom, prenom) values ('" . $_POST['user'] . "','" . $_POST['$mdp'] . "','" . $_POST['$nom'] . "','" . $_POST['$prenom'] . "')");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        echo "<p class='green'>Votre compte à bien été crée </p>";
    }
}
?>