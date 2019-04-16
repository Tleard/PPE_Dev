<?php
session_start();

if(!isset($_SESSION["logged"]))
{
    //recherche du joueur dans la liste
    try
    {
        $search = false;
        $bdd = new PDO("mysql:host=localhost;charset=utf8;dbname=ppe;", "Belette", "Incorrect");
        $req = $bdd->query('SELECT * FROM connexion');
        while ($donnees = $req->fetch())
        {
            if($donnees['user'] == $_POST['ndc'] && $donnees['mdp'] == $_POST['mdp'])
            {
                $search = true;
                $_SESSION["logged"] = $_POST['ndc'];
            }
        }

        if(!$search)
        {
            header("Location:index.php");
        }
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}
echo "Bienvenue ".$_SESSION["logged"].", vous êtes connecté !";
?>
<form action="index.php" method="post">
    <input id="logout" name="logout" type="hidden" value="logout">
    <input type="submit" value="Logout" />
</form>