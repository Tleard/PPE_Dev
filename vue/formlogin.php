<h2>Connectez-vous</h2>
<hr>
<form method = "post" action ="index.php">
    <div class="input-icon col-xs-12">
        <div class="icon-form col-xs-2">
            <i class="fas fa-user"></i>
        </div>
        <div class="col-xs-10">
            <input type="text" name="ndc" id="ndc" maxlength=20 placeholder="Votre pseudo(max20caract.)"/>
        </div>
    </div>

    <i class="fas fa-key"></i><input type="password" name="mdp" id="mdp" maxlength=15 placeholder="*****"/>
    <input type="submit" value="connexion"/>
</form>
<a href="account.php"><p>Créez un compte</p></a>


<?php

if(!isset($_SESSION["logged"]))
{
    //recherche du joueur dans la liste
    try
    {
        $search = false;
        $bdd = new PDO("mysql:host=localhost;charset=utf8;dbname=ppe;", "PPE_dev", "operations");
        $req = $bdd->query('SELECT login, mdp FROM profil');
        while ($donnees = $req->fetch())
        {
            if($donnees['login'] == $_POST['user'] && $donnees['mdp'] == $_POST['mdp'])
            {
                $search = true;
                $_SESSION["logged"] = $_POST['user'];
            }
        }
        /*if($search = true)
        {
            header("Location:connect.php");
        }*/



    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}?>