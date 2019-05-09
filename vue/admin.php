<?php
session_start();
?>
<!doctype html>
<html lang="fr">
    <body class="text-center">
    <?php
    include ('../modele/connectDB.php');
    include "header.inc.php";
    if (isset($_SESSION['id']))
    {
        $rang = $_SESSION['rang'];
        if ($rang != 3)
        {
            echo "<script language='javascript'>alert('Seul les administrateurs ont accés à cette page.');</script>";
            header('index.html');
            exit;
        }
    }
    ?>
    <h2>Profil en attente de validation</h2><br>

    <?php
    $array_profil = $DB->query("SELECT * FROM profil WHERE rang = 0",
        array($_SESSION['id']));
    $array_profil = $array_profil->fetchAll();
    ?>

    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse mail</th>
            <th>Statut</th>
            <th>Confirmer</th>
        </tr>
        <?php
        foreach($array_profil as $ap){
            ?>
            <tr>
                <td><?= $ap['nom'] ?></td>
                <td><?= $ap['prenom'] ?></td>
                <td><?= $ap['mail']?></td>
                <td>En attente de confirmation</td>
                <td style="padding-top: 0px">
                    <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ; ?>"> <input name="profil" value="<?=$ap['id']?>" type="submit" class="btn-admin btn-success btn"></form></td>
            </tr>
            <?php
        }
        ?>
    </table>

    <?php
    if (isset($_POST['profil'])){
        $DB->insert("UPDATE profil SET rang = '2'WHERE id = ?",
            array($_POST['profil']));
        echo'<script type="text/javascript">
        alert("Le compte a bien été validé");
        </script>
        ';
    }
    ?>

    <h2>Accorder à un utilisateur le rang d'admin</h2><br>

    <?php
    $array_all_profil = $DB->query("SELECT * FROM profil where rang != 3");
    $array_all_profil = $array_all_profil->fetchAll();
    ?>

    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse mail</th>
            <th>Rang</th>
            <th>Confirmer</th>
        </tr>
        <?php
        foreach($array_all_profil as $aap){
            ?>
            <tr>
                <td><?= $aap['nom'] ?></td>
                <td><?= $aap['prenom'] ?></td>
                <?php
                switch ($aap['rang']){
                    case(1):
                        $aap['rang'] = "Eleve";
                        break;
                    case(0):
                        $aap['rang'] = "Professeur en attende de validation";
                        break;
                    case(3):
                        $aap['rang'] = "Admin";
                        break;
                    case(2):
                        $aap['rang'] = "Professeur";
                        break;
                }

                ?>
                <td><?= $aap['mail']?></td>
                <td><?= $aap['rang']?></td>
                <td style="padding-top: 0px">
                    <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ; ?>"> <input name="admin" value="<?=$aap['id']?>" type="submit" class="btn-admin btn-success btn"></form></td>
            </tr>
            <?php
        }
        ?>
    </table>

    <?php
    if (isset($_POST['admin'])){
        $DB->insert("UPDATE profil SET rang = '3'WHERE id = ?",
            array($_POST['admin']));
        echo'<script type="text/javascript">
        alert("Le compte a bien été promu au rang de Admin");
        </script>
        ';
    }
    ?>




    <?php
    include "footer.inc.php"
    ?>
    </body>
</html>
