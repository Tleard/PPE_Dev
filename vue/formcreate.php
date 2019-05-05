<?php
session_start();
include('../modele/connectDB.php');

if (isset($_SESSION['id'])){
    echo "<script language='javascript'>alert('Vous posséder déja un compte');</script>";
    header('Location: index.php');
    exit;
}

if(!empty($_POST)){
    extract($_POST);
    $valid = true;

    if (isset($_POST['inscription'])){
        $login = htmlentities(trim($login));
        $nom  = htmlentities(trim($nom));
        $prenom = htmlentities(trim($prenom));
        $mail = htmlentities(strtolower(trim($mail)));
        $mdp = trim($mdp);
        $confmdp = trim($confmdp);


        if(empty($login)){
            $valid = false;
            $error_login = ("Le nom d'utilisateur ne peut pas être vide");
        }
        elseif($login == "XxXDarkSasuke420XxX" || $login == "XxXDarkknightXxX")
        {
            echo "<script language='javascript'>alert('Bravo tu est officiellement un génie.');
        window.location.href ='https://giphy.com/gifs/date-kennedy-bookshelf-iee0AS1H9Le7u';
        </script>";
        }
        else
        {
        $req_login = $DB->query("SELECT login FROM profil WHERE mail = ?",
            array($login));

        $req_login = $req_login->fetch();

        if ($req_login['login'] <> ""){
            $valid = false;
            $error_login = "Ce nom d'utilisateur existe déjà";
        }
    }

        if(empty($nom)){
            $valid = false;
            $error_nom = ("Le nom ne peut pas être vide");
        }

        if(empty($prenom)){
            $valid = false;
            $error_prenom = ("Le prenom d' utilisateur ne peut pas être vide");
        }

        if(empty($mail)){
            $valid = false;
            $error_mail = "Le mail ne peut pas être vide";
        }else{
            $req_mail = $DB->query("SELECT mail FROM profil WHERE mail = ?",
                array($mail));

            $req_mail = $req_mail->fetch();

            if ($req_mail['mail'] <> ""){
                $valid = false;
                $error_mail = "Ce mail existe déjà";
            }
        }

        if(empty($mdp)) {
            $valid = false;
            $error_mdp = "Le mot de passe ne peut pas être vide";

        }elseif($mdp != $confmdp){
            $valid = false;
            $error_mdp = "Les deux mot de passe doivent être identiques";
        }

        if($valid){

            $mdp = crypt($mdp, "unebelleteétaitunjourdansunprésquandelleviunchasseurilditdqlsdlkqnsdqnsldknsqkn");
            $date_creation = date('Y-m-d H:i:s');
            $DB->insert("INSERT INTO profil (login, nom, prenom, mail, mdp, date_creation) VALUES (?,?, ?, ?, ?, ?)",
                array($login,$nom, $prenom, $mail, $mdp, $date_creation));
            echo "<script language='javascript'>alert('Votre compte a été créer avec succés');
            window.location.href ='login.php';
            </script>";
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
</head>
<body>
<form method="post">
    <?php
    if (isset($error_login)){
        ?>
        <div><?= $error_login ?></div>
        <?php
    }
    ?>
    <input type="text" placeholder="Pseudo" name="login" value="<?php if(isset($login)){ echo $login; }?>" required>
    <?php
    if (isset($error_nom)){
        ?>
        <div><?= $error_nom ?></div>
        <?php
    }
    ?>
    <input type="text" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }?>" required>
    <?php
    if (isset($error_prenom)){
        ?>
        <div><?= $error_prenom ?></div>
        <?php
    }
    ?>
    <input type="text" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }?>" required>
    <?php
    if (isset($error_mail)){
        ?>
        <div><?= $error_mail ?></div>
        <?php
    }
    ?>
    <input type="email" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required>
    <?php
    if (isset($error_mdp)){
        ?>
        <div><?= $error_mdp ?></div>
        <?php
    }
    ?>
    <input type="password" placeholder="Mot de passe" name="mdp" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>
    <input type="password" placeholder="Confirmer le mot de passe" name="confmdp" required>
    <button type="submit" name="inscription">Envoyer</button>
</form>
</body>
</html>