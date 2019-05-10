<?php

if (isset($_POST['postchange'])) {
    $mdp = $_POST['newpassword'];
    $mail = $_POST['newadress'];
    $login = $_POST['newlogin'];
    if (!empty($_POST['newpassword']) && $_POST['newpassword'] == $_POST['newpassword2']) {
        try {
            $mdp = crypt($mdp, "unebelleteétaitunjourdansunprésquandelleviunchasseurilditdqlsdlkqnsdqnsldknsqkn");
            $DB->insert("UPDATE profil SET mdp = ? WHERE id = ?", array($mdp, $_SESSION['id']));
            echo "<script language='javascript'>alert('Modifications appliqués');
        window.location.href ='login.php';
        </script>";
            session_destroy();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    if (!empty($_POST['newadress'])) {
        try {
            $DB->insert("UPDATE profil SET mail = ? WHERE id = ?", array($mail, $_SESSION['id']));
            echo "<script language='javascript'>alert('Modifications appliqués');
        window.location.href ='login.php';
        </script>";
            session_destroy();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    if (!empty($_POST['newlogin'])) {
        try {
            $DB->insert("UPDATE profil SET login = ? WHERE id = ?", array($login, $_SESSION['id']));
            echo "<script language='javascript'>alert('Modifications appliqués');
        window.location.href ='login.php';
        </script>";
            session_destroy();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    if ($_POST['newpassword'] != $_POST['newpassword2']) {
        echo "<script language='javascript'>alert('Les mots de passe ne correspondent pas');
        window.location.href ='login.php';
        </script>";
    }
    if (empty($_POST['newlogin']) && empty($_POST['newadress']) && empty($_POST['newpassword']) && empty($_POST['newpassword2'])) {
        echo "<script language='javascript'>alert('Entrez les modifications avant d\'envoyer le formulaire');
            window.location.href ='login.php';
            </script>";
    }
}
?>