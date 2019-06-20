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
        $section = trim($section);
        $rang = 1;
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

        if (empty($section)){
            if (empty($teacher))
            {
                $valid = false;
                $error_section = "Veuillez selectionner une section, ou dire si vous êtes professeur.";
            } else {
                $section= NULL;
                $rang = 0;
            }
        } elseif (!empty($teacher)) {
            $section = NULL;
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
            $DB->insert("INSERT INTO profil (login, nom, prenom, mail, mdp, date_creation, classe, rang) VALUES (? ,?, ?, ?, ?, ?, ?, ?)",
                array($login,$nom, $prenom, $mail, $mdp, $date_creation, $section, $rang));
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

<!-- Default form register -->
<div class="container">
    <form class="text-center border border-light p-5" method="post">

        <p class="h4 mb-4">Créer un compte</p>

        <div class="form-row mb-4">
            <div class="col">
                <?php
                if (isset($error_prenom)){
                    ?>
                    <div><?= $error_prenom ?></div>
                    <?php
                }
                ?>
                <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }?>" required>
            </div>
            <div class="col">
                <!-- Last name -->
                <?php
                if (isset($error_nom)){
                    ?>
                    <div><?= $error_nom ?></div>
                    <?php
                }
                ?>
                <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }?>" required>
            </div>
        </div>

        <?php
        if (isset($error_login)){
            ?>
            <div><?= $error_login ?></div>
            <?php
        }
        ?>
        <input type="text" placeholder="Pseudo" id="defaultRegisterFormPseudo" class="form-control mb-4" name="login" value="<?php if(isset($login)){ echo $login; }?>" required>

        <?php
        if (isset($error_mail)){
            ?>
            <div><?= $error_mail ?></div>
            <?php
        }
        ?>
        <input type="email" placeholder="Adresse mail" id="defaultRegisterFormEmail" class="form-control mb-4" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required>

        <!-- Password -->

        <div class="form-row mb-4">
            <div class="col">
                <?php
                if (isset($error_mdp)){
                    ?>
                    <div><?= $error_mdp ?></div>
                    <?php
                }
                ?>
                <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Mot de passe" name="mdp" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>
            </div>
            <div class="col">
                <!-- Last name -->
                <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Confirmer le mot de passe" name="confmdp" required>
            </div>
        </div>

        <?php
        if (isset($error_section)){
            ?>
            <div><?= $error_section ?></div>
            <?php
        }
        ?>
        <label for="section-select">Entrer votre section:</label>
        <select id="section-select" class="form-control" name="section">
            <option value="">--Section--</option>
            <option value="SIO">SIO</option>
            <option value="GMPE">GMPE</option>
            <option value="MUC">MUC</option>
        </select>
        <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
            Optionnelle
        </small>



        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="teacher" id="teacher">
            <label class="custom-control-label" for="teacher">Je suis un Professeur :</label>
        </div>


        <button class="btn btn-info my-4 btn-block" type="submit" name="inscription">Envoyer</button>

    </form>
</div>


<!--<form method="post">
    <?php
/*    if (isset($error_login)){
        */?>
        <div><?/*= $error_login */?></div>
        <?php
/*    }
    */?>
    <input type="text" placeholder="Pseudo" name="login" value="<?php /*if(isset($login)){ echo $login; }*/?>" required>
    <?php
/*    if (isset($error_nom)){
        */?>
        <div><?/*= $error_nom */?></div>
        <?php
/*    }
    */?>
    <input type="text" placeholder="Votre nom" name="nom" value="<?php /*if(isset($nom)){ echo $nom; }*/?>" required>
    <?php
/*    if (isset($error_prenom)){
        */?>
        <div><?/*= $error_prenom */?></div>
        <?php
/*    }
    */?>
    <input type="text" placeholder="Votre prénom" name="prenom" value="<?php /*if(isset($prenom)){ echo $prenom; }*/?>" required>
    <?php
/*    if (isset($error_mail)){
        */?>
        <div><?/*= $error_mail */?></div>
        <?php
/*    }
    */?>
    <input type="email" placeholder="Adresse mail" name="mail" value="<?php /*if(isset($mail)){ echo $mail; }*/?>" required>
    <?php
/*    if (isset($error_mdp)){
        */?>
        <div><?/*= $error_mdp */?></div>
        <?php
/*    }
    */?>
    <input type="password" placeholder="Mot de passe" name="mdp" value="<?php /*if(isset($mdp)){ echo $mdp; }*/?>" required>
    <input type="password" placeholder="Confirmer le mot de passe" name="confmdp" required>

    <?php
/*    if (isset($error_section)){
        */?>
        <div><?/*= $error_section */?></div>
        <?php
/*    }
    */?>
    <label for="section-select">Entrer votre section:</label>
    <select id="section-select" name="section">
        <option value="">--Section--</option>
        <option value="SIO">SIO</option>
        <option value="GMPE">GMPE</option>
        <option value="MUC">MUC</option>
    </select>

    <label for="teacher">Je suis un Professeur :</label>
    <input type="checkbox" name="teacher" id="teacher">
    
    <button type="submit" name="inscription">Envoyer</button>
</form>-->
</body>
</html>