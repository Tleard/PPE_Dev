<?php
session_start();
include('../modele/connectDB.php');

if (isset($_SESSION['id'])){
    echo "<script language='javascript'>alert('Vous posséder déja un compte');</script>";
    header('Location: ../vue/index.php');
    exit;
}

if(!empty($_POST)){
    extract($_POST);
    $valid = true;

    if (isset($_POST['connexion'])){
        $login = htmlentities(strtolower(trim($login)));
        $mdp = trim($mdp);

        if(empty($login)){
            $valid = false;
            $er_login = "Il faut mettre un login";
        }

        if(empty($mdp)){
            $valid = false;
            $er_mdp = "Il faut mettre un mot de passe";
        }

        $req = $DB->query("SELECT * 
                FROM profil 
                WHERE login = ? AND mdp = ?",
            array($login, crypt($mdp, "unebelleteétaitunjourdansunprésquandelleviunchasseurilditdqlsdlkqnsdqnsldknsqkn")));
        $req = $req->fetch();

        if ($req['id'] == ""){
            $valid = false;
            $er_login = "Le login ou le mot de passe est incorrecte";
        }

        if ($valid){
            $_SESSION['id'] = $req['id'];
            $_SESSION['nom'] = $req['nom'];
            $_SESSION['prenom'] = $req['prenom'];
            $_SESSION['login'] = $req['login'];
            $_SESSION['rang'] = $req['rang'];
            $_SESSION['classe'] = $req['classe'];
            $_SESSION['mail'] = $req['mail'];
            $_SESSION['date_creation'] = $req['date_creation'];

            header('Location:  index.php');
            exit;
        }
    }
}
?>

<h2>Connectez-vous</h2>
<hr>
<form method="post" class="text-center border border-light p-5 col-md-4 col-md-offset-4" style="margin-left: 33%">
    <p class="h4 mb-4">Connexion</p>
    <?php
    if (isset($er_login)){
        ?>
        <div><?= $er_login ?></div>
        <?php
    }
    ?>
    <input type="text" placeholder="Pseudo" name="login" class="form-control mb-4" value="<?php if(isset($login)){ echo $login; }?>" required>
    <?php
    if (isset($er_mdp)){
        ?>
        <div><?= $er_mdp ?></div>
        <?php
    }
    ?>
    <input type="password" placeholder="Mot de passe" name="mdp" class="form-control mb-4" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>
    <button class="btn btn-info btn-block my-4" name="connexion" type="submit" style="margin: 0">Sign in</button>

</form>

<a href="account.php"><p>Créez un compte</p></a>
