<form class="formulairecreate" method="post" action="">
    <h2>Informations de compte</h2>
    <table>
        <tr>
            <td>Votre pseudo :</td>
            <td><input type="text" name="user" id="user" maxlength=20 placeholder="Votre pseudo(max20caract.)"/></td>
        </tr>
        <tr>
            <td>Votre mot de passe :</td>
            <td><input type="password" name="mdp" id="mdp" maxlength=15 placeholder="*****"/></td>
        </tr>
        <tr>
            <td>Vérifiez votre mot de passe :</td>
            <td><input type="password" name="mdp2" id="mdp2" maxlength=15 placeholder="*****"/></td>
        </tr>
        <tr>
            <td>Votre nom :</td>
            <td><input type="text" name="nom" id="nom" maxlength=20 placeholder="Votre nom"/></td>
        </tr>
        <tr>
            <td>Votre prénom:</td>
            <td><input type="text" name="prenom" id="prenom" maxlength=20 placeholder="Votre prenom"/></td>
        </tr>
        <tr>
            <td>Votre classe:</td>
            <td>
                <select name="section" id="section">
                    <option value="SIO">SIO</option>
                    <option value="GPME">GPME</option>
                    <option value="MUC">MUC</option>
                </select>
            </td>
        </tr>
    </table>
    <br/>
    <input type="submit" value="Connexion"/>
    <br/>
</form>
<?php
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );

    session_start();
    include('../modele/connectDB.php');






if (isset($_POST['user']) && isset($_POST['mdp']) && isset($_POST['nom'])&& isset($_POST['prenom'])) {
    if (empty($_POST['user']) && empty($_POST['mdp']) && empty($_POST['nom']) && empty($_POST['prenom'])) {
        echo "<p class='red'>-Merci d'entrer vos informations.</p>";
    }
    elseif (empty($_POST['user']) && empty($_POST['mdp']) && empty($_POST['nom'])) {
        echo "<p class='red'>-Entrez un pseudo,un mot de passe et votre nom.</p>";
    }
    elseif (empty($_POST['user']) && empty($_POST['mdp']) && empty($_POST['prenom'])) {
        echo "<p class='red'>-Entrez un pseudo,un mot de passe et votre prénom.</p>";
    }
    elseif (empty($_POST['user']) && empty($_POST['prenom']) && empty($_POST['nom'])) {
        echo "<p class='red'>-Entrez un pseudo, votre nom et votre prénom.</p>";
    }
    elseif (empty($_POST['prénom']) && empty($_POST['mdp']) && empty($_POST['nom'])) {
        echo "<p class='red'>-Entrez un mot de passe votre nom et votre prénom.</p>";
    }
    elseif (empty($_POST['prénom']) && empty($_POST['nom'])) {
        echo "<p class='red'>-Entrez votre nom et votre prénom.</p>";
    }
    elseif (empty($_POST['prénom']) && empty($_POST['user'])) {
        echo "<p class='red'>-Entrez votre prénom et votre pseudo.</p>";
    }
    elseif (empty($_POST['prénom']) && empty($_POST['mdp'])) {
        echo "<p class='red'>-Entrez votre prénom et votre mot de passe.</p>";
    }
    elseif (empty($_POST['nom']) && empty($_POST['mdp'])) {
        echo "<p class='red'>-Entrez votre nom et votre mot de passe.</p>";
    }
    elseif (empty($_POST['nom']) && empty($_POST['user'])) {
        echo "<p class='red'>-Entrez votre nom et votre pseudo.</p>";
    }
    elseif (empty($_POST['user']) && empty($_POST['mdp'])) {
        echo "<p class='red'>-Entrez votre pseudo et votre mot de passe.</p>";
    }
    elseif (empty($_POST['user'])) {
        echo "<p class='red'>-Entrez un pseudo.</p>";
    }
    elseif (empty($_POST['mdp'])) {
        echo "<p class='red'>-Entrez un mot de passe.</p>";
    }
    elseif (empty($_POST['nom'])) {
        echo "<p class='red'>-Entrez votre nom.</p>";
    }
    elseif (!isset($_POST['prenom'])) {
        echo "<p class=red>-Entrez votre prénom</p>";
    }
    elseif ($_POST['mdp'] != $_POST['mdp2']){
        echo "<p class=red>-Les mots de passe de correspondent pas.</p>";
    }
    else {
        try {
            $bdd = new PDO("mysql:host=localhost;charset=utf8;dbname=ppe;", "PPE_dev", "operations");
            $bdd->exec("insert into profil (login, mdp, nom, prenom, section) values ('" . $_POST['user'] . "','" . $_POST['mdp'] . "','" . $_POST['nom'] . "','" . $_POST['prenom'] . "','" . $_POST['section'] . "')");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        echo "<script language='javascript'>alert('Votre compte à été créer avec succés');
        window.location.href ='index.php';
        </script>";

    }
}
?>