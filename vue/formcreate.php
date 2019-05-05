<?php
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );

    session_start();
    include('../modele/connectDB.php');

    // Transporte l'utilisateur sur une autre page car il posséde déja un compte.
    if (isset($_SESSION['id']))
    {
        echo "<script language='javascript'>alert('Vous êtes déja connecter et ne pouver pas créer de compte.');
        window.location.href ='index.php';
        </script>";
        exit;
    }

if(!empty($_POST)){
    extract($_POST);
    $valid = true;

    if (isset($_POST['connexion'])){
        $mail = htmlentities(strtolower(trim($user)));
        $mdp = trim($mdp);

        if (empty($user)){
            $valid = false;
            $error_user = "Veuillez entrer un pseudo";
        }
        //Petit easter egg
        if ($user == "XxXDarkSasuke420XxX" || $user =="XxXDarkWarriorXxX")
        {
            echo "<script language='javascript'>alert('Bravo tu est officiellement un génie.');
        window.location.href ='https://giphy.com/gifs/date-kennedy-bookshelf-iee0AS1H9Le7u';
        </script>";
        }

        else
        {
            //Verifie si le login existe déja.
            $req_user = $DB->query("SELECT login FROM profil WHERE login = ?", array($user));
            $req_user = $req_user->fetch();
            if ($req_user['user'] <> ""){
                $valid = false;
                $error_user ="Ce pseudo existe déja, souhaiter vous vous connecter?";
            }
        }

        if (empty($prenom)){
            $valid = false;
            $error_prenom = "Veuillez entrer votre prénom";
        }

        if (empty($nom)){
            $valid = false;
            $error_nom = "Veuillez entrer votre nom";
        }
        /**Todo:
         Verification Format Mail Dylan
         *
         */
        if(empty($mail)){
            $valid = false;
            $error_mail = "Veuillez entrer une adresse mail";
        }
        else
        {
            $req_mail = $DB->query("SELECT mail FROM profil WHERE mail ?", array($mail));
            $req_mail = $req_mail->fetch();
            if ($req_mail['mail'] <> ""){
                $valid = false;
                $error_mail ="Ce mail existe déja, souhaiter vous vous connecter?";
            }
        }


        if(empty($mdp)){ // Vérification qu'il y est bien un mot de passe de renseigné
            $valid = false;
            $error_mdp = "Veuillez entrer un mot de passe";
        }



        if ($valid)
        {
            $mdp = crypt($mdp, "unebelleteétaitunjourdansunprésquandelleviunchasseurilditdqlsdlkqnsdqnsldknsqkn");
            var_dump($mdp);
            var_dump([$mail, $mdp, $nom, $prenom]);
            $DB->insert("INSERT INTO profil (mail, mdp, nom, prenom) VALUES (?, ?, ?, ?, ?)",
            array($mail, $mdp, $nom, $prenom));
//            header('Location:  index.php');
            exit;
        }
    }
}

/** Old code **/
/*
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
}*/
?>

<form class="formulairecreate" method="post">
    <h2>Informations de compte</h2>
    <table>
        <tr>
            <td>Votre pseudo :</td>
            <td><input type="text" name="user" id="user" maxlength=20 placeholder="Votre pseudo(max20caract.)" value="<?php if (isset($user)){echo $user;} ?>" required></td>
            <?php
            if (isset($error_user)){
                ?>
                <div><?= $error_user ?></div>
                <?php
            }
            ?>
        </tr>
        <tr>
            <td>Votre addresse mail:</td>
            <td><input type="email" name="mail" id="mail" maxlength="45" placeholder="adressemail@domaine.com" value="<?php if (isset($mail)){echo $mail;} ?>" required></td>
            <?php
            if (isset($error_mail)){
                ?>
                <div><?= $error_mail ?></div>
                <?php
            }
            ?>
        </tr>
        <tr>
            <td>Votre mot de passe :</td>
            <td><input type="password" name="mdp" id="mdp" maxlength=15 placeholder="*****" required></td>
        </tr>
        <tr>
            <td>Vérifiez votre mot de passe :</td>
            <td><input type="password" name="mdp2" id="mdp2" maxlength=15 placeholder="*****" required></td>
            <?php
            if (isset($error_mdp))
            {
                ?>
                <div><?= $error_mdp ?></div>
                <?php
            }
            if ($_POST['mdp'] != $_POST['mdp2'])
            {
                echo "<p class=red>-Les mots de passe de correspondent pas.</p>";
            }

            ?>
        </tr>
        <tr>
            <td>Votre nom :</td>
            <td><input type="text" name="nom" id="nom" maxlength=20 placeholder="Votre nom" required value="<?php if (isset($nom)){echo $nom;} ?>"></td>
            <?php
            if (isset($error_nom)){
                ?>
                <div><?= $error_nom ?></div>
                <?php
            }
            ?>
        </tr>
        <tr>
            <td>Votre prénom:</td>
            <td><input type="text" name="prenom" id="prenom" maxlength=20 placeholder="Votre prenom"required value="<?php if (isset($prenom)){echo $prenom;} ?>"></td>
            <?php
            if (isset($error_prenom)){
                ?>
                <div><?= $error_prenom ?></div>
                <?php
            }
            ?>
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
    <input type="submit" value="Connexion" name="connexion"/>
    <br/>
</form>
